<?php session_start()?>
<?php require_once '../partials/template.php'?>
<?php require_once '../controllers/connect.php'?>
<?php function get_content_page(){
    global $conn?>
    <div class="container">
        <div id="title"> 
            <h1>TO DO LIST APP</h1>
        </div>
        <div id="sample">
            <ol id="display">
                
            </ol>
            <input type="text" id="input">
            <button type="button" id="btn">try</button>
        </div>
        <div id="alert">
            <?php 
            if(isset($_SESSION['alert'])){
                echo "<h3>".$_SESSION['alert']."</h3>";
            }else{
                // unset($_SESSION['alert']);
                session_destroy();
            }
            ?>
        </div>
        <div id="inputBox"> 
            <form action="../controllers/addTask.php" method="POST"> 
                <input type="text" name="task" id="task">
                <button type="submit" id="btn"><h2>+ Add</h2></button>
            </form>
        </div>
        
        <?php
        $sql = "SELECT * FROM tasks ORDER BY stat_id ASC";
        $results = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_array($results);
        if(!empty($rows)){;?>
            <table id="table">
                <thead>
                    <tr>
                        <th><h1>Task</h1></th>
                        <th><h1>Status</h1></th>
                        <th><h1>Action</h1></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($results as $result){?>
                        <tr> 
                            <?php
                            
                            if(!isset($_GET['id'])){
                                echo '<td><h2>'.$result['task'].'</h2></td>';
                            }else if(isset($_GET['id'])){ ;?>
                            <td>
                                <form action="../controllers/editTask.php" method="POST">
                                    <input type="text" name="task" placeholder="<?php echo $result['task']?>">
                                    <input type="hidden" name="id" value="<?php echo $result['id']?>">
                                    <button type="submit" id="save">SAVE</button>
                                    <a href="home.php" id="cancel">CANCEL</a>
                                </form>
                            </td>  
                        <?php }?>
                        <td>
                            <?php 
                            $sql = "SELECT tasks.stat_id, statuses.stat FROM tasks INNER JOIN statuses ON tasks.stat_id=statuses.id WHERE tasks.id=".$result['id'];
                            $query = mysqli_query($conn, $sql);
                            $status = mysqli_fetch_array($query);
                            $pending = "pending";
                            $complete = "complete";
                            if($status['stat_id']=="1"){
                                echo "<span id='$pending'>".$status['stat']."</span>";
                            }else{
                                echo "<span id='$complete'>".$status['stat']."</span>";
                            }
                            
                            
                            ?>
                        </td>
                        <td>
                            <a id="delete" href="/todo_app/app/controllers/deleteTask.php?id=<?php echo $result['id']?>">REMOVE</a>
                            <?php 
                            if($result['stat_id'] == 1){
                                ?>
                                <a id ="edit" href="/todo_app/app/views/home.php?id=edit">EDIT</a>
                                <form action="../controllers/processTask.php" method="POST" id="doneForm">
                                    <input type="hidden" name="done" id="done" value="2">
                                    <input type="hidden" name="id" id="id" value="<?php echo $result['id']?>">
                                    <button type="submit">DONE</button>
                                </form>
                            <?php }?>
                            
                        </td>
                        
                        
                    </tr>
                <?php }?>
                <tbody>
                </table>
            <?php }else if(empty($rows)){ 
                echo 'theres no task input';
            }
            ?>
        </div>    
        <?php mysqli_close($conn)?>
    <?php }?>
    
