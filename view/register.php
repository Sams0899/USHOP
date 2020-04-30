<?php
    include '../Model/db_conn.php';
    include '../Model/user.php';
    session_start();
    $user = $_SESSION['user'];
    if($user->getroleid()!="1"){
      echo "<script> alert('Only Admin Allowed'); location='../view/index.php';</script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
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
.registerbtn {
  background-color: #82aef5;
  color: white;
  font-size: 20px;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
<script>
  function goBack() {
    window.history.back()
  }
</script>
</head>
<body>

<form action="../controller/signup.php" method="POST">
  <div class="container">
    <h1>Add another user</h1>
    <p>Please fill in this form to create an account.</p>
    <p>ID auto generated</p>
    <hr>

    <label><b>User ID</b></label>
    <input type="text" placeholder="User ID" id="first_name" name="userid" readonly>

    <label><b>Firstname</b></label>
    <input type="text" placeholder="Enter firstname" id="first_name" name="first_name" required>
    <label><b>Lastname</b></label>
    <input type="text" placeholder="Enter lastname" name="last_name" id="last_name" required>
    <label for="email"><b>Address</b></label>
    <input type="text" placeholder="address" name="address" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>   <br>
    <label><b>Role</b></label>
    <select type="role" id="Role" name="roleid">
        <option value="2">Manager</option>
        <option value="3">Cashier</option>
        <option value="4">Buyer</option>
    </select>

    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <div class="container goback">
    <button type="submit" class="registerbtn">Add User</button></div>
    <div class="container goback">
      <button class="registerbtn" onclick="goBack()">Go Back</button>
  </div>
  </div>
  
  <div class="container signin">
    <p>Log in to another account? <a href="../index.php">Log in</a>.</p>
  </div>
</form>

</body>
</html>
