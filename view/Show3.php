<?php
    include '../Model/db_conn.php';
    include '../Model/user.php';
    session_start();
    $user = $_SESSION['user'];
    if($user->getroleid()!="3"){
      echo "<script> alert('Nice Try'); location='../view/index.php';</script>";
    }
  
?>
<!DOCTYPE html>
<html>
<head>
<title>Product Data</title>
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
  <p>Your role is a Cashier</p>
  <p>ID : <?php echo $user->getuserid(); ?>

	<table id="dat" class="table table-hover">
		<thead>
			<th>Product Id</th>
			<th>Product Name</th>
			<th>Price</th>
			<th>Stock</th>
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
      $query = "SELECT * FROM item";
          $result = $db->query($query);

      while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['item_id'] . "</td>";
          echo "<td>" . $row['item_name'] . "</td>";
          echo "<td>" . $row['item_price'] . "</td>";
          echo "<td>" . $row['item_stock'] . "</td>";
          echo "<td>";
          echo "<div class='col-sm-3'>";
          echo "<form method='post' action='edititem.php'>";
          echo "<input type='hidden' name='item_id' value='".$row['item_id']."'>";
          echo "<input type='hidden' name='loc'
          value='edit_item.php'>";
          echo "<button type='submit' name='submit'><span
          class='glyphicon glyphicon-edit'></span></button>";
          echo "</form>";
          echo "</div>";
          echo "</td>";
          echo "</div>";
          echo "</tr>";
      }

      mysqli_free_result($result);
      mysqli_close($db);
      ?>
    </tbody>
	</table>
</body>
</html> 
