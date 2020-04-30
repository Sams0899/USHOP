<?php
    include '../Model/db_conn.php';
    include '../Model/item.php';


    session_start();
    $user = $_SESSION['user'];

    $db = new Database();
    $item = new Item();
    $itemname = $_POST['itemname'];
    $itemname2 = $_POST['itemname'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    if(isset($_POST['stock'])&&isset($_POST['price'])){
        $db->edititem($itemname, $itemname2, $price, $stock);
        echo "<script> alert('Successfully edit an item'); location='../view/Show3.php';</script>";
    }
    else{
        echo "<script> alert('Failed to edit item')</script>";
    }
    

?>