<?php
    include '../Model/db_conn.php';
    include '../Model/user.php';


    $db = new Database();
    $user = new User();
    $id = $_POST['userid'];
    if(isset($_POST['userid'])){
        $db->deleteuser($id);
        echo "<script> alert('Successfully delete the user'); location='../view/Show.php';</script>";
    }
    else{
        echo "<script> alert('Failed to delete user')</script>";
    }
    

?>