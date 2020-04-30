<?php
    include '../Model/db_conn.php';
    include '../Model/user.php';
    session_start();
    $user = $_SESSION['user'];
    if($user->getroleid()!="2"){
      echo "<script> alert('Only Manager Allowed'); location='../view/index.php';</script>";
    }
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body {
    font-family: Arial, Helvetica, sans-serif;
   
    }

    * {
    box-sizing: border-box;
    }

    /* Add padding to containers */
    .container {
    padding: 16px;
    width: 50%;
    margin-left:auto;
    margin-right:auto;
    background-color: white;
    }

    /* Full-width input fields */
    input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
    }

    /* Set a style for the submit button */
    .submitbtn {
    background-color: #82aef5;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    }

    .submitbtn:hover {
    opacity: 1;
    }

    /* Add a blue text color to links */
    a {
    color: dodgerblue;
    }

   
    </style>
    <script>
        function goBack() {
            window.history.back()
        }
    </script>
</head>
<body>
<form action="../controller/additem.php" method="POST">
  <div class="container">
    <h1>Add Item</h1>
    <p>Note: Price and Stock can't be negative value</p>
    <p>Note: Can't input ID</p>
    <hr>

    <label><b>Item Name</b></label>
    <input type="text" placeholder="Item Name" name="itemname" required>

    <label><b>Item ID</b></label>
    <input type="text" placeholder="Item ID" name="itemid" value='Item ID' readonly>

    <label ><b>Stock</b></label>
    <input pattern="^[1-9]\d*$" type="text" placeholder="Stock" name="stock" required>
    <label ><b>Price</b></label>
    <input pattern="^[1-9]\d*$" type="text" placeholder="Price" name="price" required>
    
    <label><b>Item Description</b></label>
    <input type="text" placeholder="Max Length 50 Characters" name="desc" maxlength="50" required>
    <hr>

    <button type="submit" class="submitbtn">Add Item</button>
  </div>
  
  <div class="container goback">
    <button class="submitbtn" onclick="goBack()">Cancel</button>
  </div>
</form>

</body>
</html>
