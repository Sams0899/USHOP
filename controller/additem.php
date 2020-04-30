<?php
    include '../Model/db_conn.php';
    include '../Model/item.php';

    
    session_start();
    $user = $_SESSION['user'];

    $db = new Database();
    $item = new Item();
    $itemname = $_POST['itemname'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $desc = $_POST['desc'];
    if(isset($_POST['stock'])&&isset($_POST['price'])){
        $db->additem($itemname, $stock,$price, $desc);
        echo "<script> alert('Successfully add an item'); location='../view/Show2.php';</script>";
    }
    else{
        echo "<script> alert('Failed to add item')</script>";
    }
    

?>