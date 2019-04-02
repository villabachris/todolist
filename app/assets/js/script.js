document.getElementById('btn').onclick= () => {
    let node = document.createElement("LI");
    let type = document.getElementById('input').value;
    let list = document.createTextNode(type);
    node.appendChild(list);
    if(type == ""){
        alert('please type');
    }else{
        document.getElementById('display').appendChild(node);
        document.getElementById('input').value = " ";
    }
}