<?php
    include '../Model/db_conn.php';
    include '../Model/user.php';
    session_start();
    $user = $_SESSION['user'];
    if($user->getroleid()!="1"){
      echo "<script> alert('Nice Try'); location='../view/index.php';</script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}

        /* The Modal (background) */
        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 40%;
        }

        /* The Close Button */
        .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        }

        .close:hover,
        .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
        }
    </style>
    <title>User Data</title>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">


		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class='container'>
			<nav class='navbar navbar-default' role='navigation'>
				<div class='container-fluid'>
					<div class='navbar-header'><a class='navbar-brand' href='#'>[IF635] Web Programming</a></div>
						<ul class='nav navbar-nav navbar-right'>
                            <li><a href='about.php'>Developer Profile</a></li>
							<li class='active'><a onclick="return confirm('are you sure you want to log out?')" href='../index.php'>LogOut</a></li>
						</ul>
				</div>
			</nav>
  <h2>Welcome <?php echo $user->getfirstname(); ?></h2>
  <p>Your role is an Admin</p>
  <p>ID : <?php echo $user->getuserid(); ?>
    <form method='post' action='register.php'>
			<button type='submit' name='submit' class='btn btn-primary pullright'><span class='glyphicon glyphicon-plus'>
			</span>&nbsp;&nbsp;Add User</button>
    </form>
	<table id="dat" class="table table-hover">
		<thead>
			<th>ID</th>
			<th>Name</th>
			<th>Role</th>
			<th>Action</th>
		</thead>
		<tbody>
		<tbody>
      <?php 
      //Ini adalah lokasi dari mysql berada
      $host = "localhost";

      //Ini adalah user yang digunakan untuk login ke dalam module mysql / mariadb
      $username = "root";

      //Ini adalah nama database yang digunakan dalam praktikum ini 
      $dbname = "ushop";

      //Ini adalah password yang untuk autentikasi user
      $password = "";
      //Object database
      $db = new mysqli($host, $username, $password, $dbname);
      $query = "SELECT * FROM user";
          $result = $db->query($query);

      while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['user_id'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            if($row['role_id']==1){
                echo "<td>Admin</td>";     
            }
            else if($row['role_id']==2){
                echo "<td>Manager</td>";     
            }
            else if($row['role_id']==3){
                echo "<td>Kasir</td>";     
            }
            else{
                echo "<td>Pembeli</td>";
            }
            echo "<td>";
            echo "<div class='col-sm-3'>";
            echo "<form method='post' action='manageuser.php'>";
            echo "<input type='hidden' name='username' value='".$row['first_name']."'>";
            echo "<button type='submit' name='submit'><span
            class='glyphicon glyphicon-edit'></span></button>";
            echo "</form>";
            echo "</div>";
            echo "<div class='col-sm-3'>";
		    echo "<form method='post' onsubmit='return show_alert()' action='../controller/deleteuser.php'>";
			echo "<input type='hidden' name='userid' value='".$row['user_id']."'>";
			echo "<button type='submit' class='pack detail' id='detail'><span class='glyphicon glyphicon-remove'></span></button>";
			echo "</form>";
            echo "</td>";
            echo "</div>";
            echo "</tr>";
      }

      mysqli_free_result($result);
      mysqli_close($db);
      ?>
    </tbody>
    </table>
    <!-- <div id="modal" class="modal"> -->
        <!-- Modal content -->
        <!-- <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Are you sure to delete this product?</h2>
            <br><br>
            <button type="submit" style="margin: 8px 0;padding: 12px 20px;background-color: #82aef5;color:white;" >Yes</button>
            <button type="button" class="cancel" style="float:right;margin: 8px 0;padding: 12px 20px;background-color: #82aef5;color:white;">No</button>
      </div>
    </div> -->

</div>
<script>
    function show_alert() {
    if ( confirm("Are you sure you wish to delete?") == false ) {
       return false;
    } else {
        return true;
    }
}
// var modal = document.getElementById('modal');
// var btns = document.querySelectorAll('.pack.detail'); 
// var span = document.getElementsByClassName("close")[0];
// var cancel = document.getElementsByClassName("cancel")[0];
// [].forEach.call(btns, function(el) {
//   el.onclick = function() {
//       modal.style.display = "block";
//   }
// })
// span.onclick = function() {
//     modal.style.display = "none";
// }
// cancel.onclick = function(){
//     modal.style.display = "none";
// }
// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// }
</script>

</body>
</html> 
