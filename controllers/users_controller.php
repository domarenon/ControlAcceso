<?php
    include dirname(__file__,2).'/models/users.php';

    $users = new Users();

    if(isset($_POST['create']))
    {
        if($users->newUser($_POST)){
            header('location: ../index.php?page=new&success=true');
        }else{
            header('location: ../index.php?page=new&error=true');
        }
    }

    if(isset($_POST['edit']))
    {
        if($users->setEditUser($_POST)){
            header('location: ../index.php?page=edit&id='.$_POST['id'].'&success=true');
        }else{
            header('location: ../index.php?page=edit&id='.$_POST['id'].'&error=true');
        }
    }

    if(isset($_GET['delete']))
    {
        if($users->deleteUser($_GET['id'])){
            echo json_encode(["success"=>true]);
        }else{
            echo json_encode(["error"=>true]);
        }
    }

?>