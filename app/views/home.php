<?php require_once '../partials/template.php'?>
<?php require_once '../controllers/connect.php'?>
<?php function get_content_page(){
    global $conn?>
<div class="container">
    <div id="title"> 
        <h1>TO DO LIST APP</h1>
    </div>

    <div id="inputBox"> 
            <form action="../controllers/addTask.php" method="POST"> 
            <input type="text" name="task" id="task">
            <button type="submit" id="btn"><h2>+ Add</h2></button>
        </form>
    </div>
    
            <?php
                    $sql = "SELECT * FROM tasks";
                    $results = mysqli_query($conn, $sql);
                    $rows = mysqli_fetch_array($results);
                    if(!empty($rows)){;?>
                        <table id="table">
                            <thead>
                                <tr>
                                    <th><h1>Task</h1></th>
                                    <th><h1>Action</h1></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($results as $result){?>
                                        <tr> 
                                        <?php
                                            $editForm=""; 
                                            if(!isset($_GET['id'])){
                                                    echo '<td>'.$result['task'].'</td>';
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
                                            <a id="delete" href="/todo_app/app/controllers/deleteTask.php?id=<?php echo $result['id']?>">DELETE</a>
                                            <a id ="edit" href="/todo_app/app/views/home.php?id=edit">EDIT</a>
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
