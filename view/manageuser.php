<?php
    include '../Model/db_conn.php';
    include '../Model/user.php';
    include '../Model/user.php';
    $user = new User();
    $db = new Database();

    session_start();
    $user = $_SESSION['user'];
    if($user->getroleid()!="1"){
      echo "<script> alert('Only Admin Allowed'); location='../view/index.php';</script>";
    }

    $username=$_POST['username'];

    $res =  $db->cekusername($username);
    if(mysqli_num_rows($res)>0)
    {  
        $data = $db->assigndataadmin($username);
        while($dataobj = $data ->fetch_object()) 
        {
            $user->setfirstname($dataobj->first_name);
            $user->setlastname($dataobj->last_name);
            $user->setroleid($dataobj->role_id);
            $user->setuserid($dataobj->user_id);
            $user->setaddress($dataobj->address);
        }
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
<form action="../controller/updateuser.php" method="POST">
  <div class="container">
    <h1>Edit User <?php echo $user->getfirstname(); ?></h1>
    <p>Note: ID can't be edited</p>
    <hr>


    <label><b>ID</b></label>
    <input type="text" placeholder="Item ID" name="userid" value='<?php echo $user->getuserid();?>' readonly>

    <label><b>First Name</b></label>
    <input type="text" placeholder="Item Name" name="firstname" value='<?php echo $user->getfirstname();?>' required>

    <label><b>Last Name</b></label>
    <input type="text" placeholder="Item Name" name="lastname" value='<?php echo $user->getlastname();?>' required>
    
    <label ><b>Address</b></label>
    <input type="text" maxlength="100" placeholder="Address(100 characters max)" name="address" required>
   
    <label ><b>Password</b></label>
    <input type="password" placeholder="Password" name="password" required>
    <label><b>Role</b></label>
    <select type="role" id="Role" name="role">
        <option value="2">Manager</option>
        <option value="3">Cashier</option>
        <option value="4">Buyer</option>
    </select><br><br>
    <hr>

    <button type="submit" class="submitbtn">Update</button>
  </div>
  
  <div class="container goback">
    <button class="submitbtn" onclick="goBack()">Go Back</button>
  </div>
</form>

</body>
</html>
