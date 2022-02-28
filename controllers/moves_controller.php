<?php
    include dirname(__file__,2).'/models/moves.php';

    $moves = new Moves();

    if(isset($_POST['create']))
    {
        if($moves->newMove($_POST)){
            header('location: ../index.php?page=new_move&success=true');
        }else{
            header('location: ../index.php?page=new_move&error=true');
        }
    }

?>