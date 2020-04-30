<?php
    include '../Model/db_conn.php';
    include '../Model/item.php';


    session_start();
    $user = $_SESSION['user'];

    $db = new Database();
    $item = new Item();
    $itemid = $_POST['itemid'];
    if(isset($_POST['itemid'])){
        $db->deleteitem($itemid);
        echo "<script> alert('Successfully edit an item'); location='../view/Show2.php';</script>";
    }
    else{
        echo "<script> alert('Failed to edit item')</script>";
    }
    

?>