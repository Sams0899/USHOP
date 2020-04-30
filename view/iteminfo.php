<?php
    include '../Model/db_conn.php';
    include '../Model/item.php';
    include '../Model/user.php';

    $item = new Item();
    $db = new Database();
    
    session_start();
    $user = $_SESSION['user'];
    if($user->getroleid()!="4"){
      echo "<script> alert('Use a buyer account'); location='../view/index.php';</script>";
    }

    $itemid = $_POST['itemid'];  
    $res =  $db->cekitem($itemid);
    if(mysqli_num_rows($res)>0)
    {
        $data = $db->assignitems($itemid);
        while($dataobj = $data ->fetch_object()) 
        {
            $item->setitemid($dataobj->item_id);
            $item->setitemname($dataobj->item_name);
            $item->setprice($dataobj->item_price);
            $item->setitemstock($dataobj->item_stock);
            $item->setitemdesc($dataobj->item_desc);
        }
    }
    else{
        echo "<script> alert('Login Gagal')</script>";
    }
    $db->closedb();
?>


<!DOCTYPE html>
<head>
    <title>Item info</title>
    <script>
        function goBack() {
            window.history.back()
        }
    </script>
</head>
<body>
    <?php
        echo "<h2> ID BARANG    : ".$item->getitemid()."</h2>";
        echo "<h2> NAMA BARANG    : ".$item->getitemname()."</h2>";
        echo "<h2> STOCK BARANG    : ".$item->getitemstock()."</h2>";
        echo "<h2> HARGA BARANG    : ".$item->getitemprice()."</h2>";
        echo "<h2> DESKRIPSI BARANG    : ".$item->getitemdesc()."</h2>";
    ?>
    <button onclick="goBack()">Go Back</button>
</body>
</html>