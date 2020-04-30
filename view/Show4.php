<?php
  include '../Model/db_conn.php';
  include '../Model/user.php';
  session_start();
  $user = $_SESSION['user'];
  if($user->getroleid()!="4"){
    echo "<script> alert('Nice Try'); location='../view/index.php';</script>";
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    /* Float four columns side by side */
    .column {
      float: left;
      width: 25%;
      padding: 0 10px;
    }

    /* Remove extra left and right margins, due to padding */
    .row {margin: 0 -5px;}

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Responsive columns */
    @media screen and (max-width: 600px) {
      .column {
        width: 100%;
        display: block;
        margin-bottom: 20px;
      }
    }

    /* Style the counter cards */
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      padding: 16px;
      text-align: center;
      background-color: #f1f1f1;
    }
  </style>
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
  <p>Your role is Buyer</p>
  <p>ID : <?php echo $user->getuserid(); ?>
  <div class="row">
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
              echo "<div class='column'>";
              echo "<div class='card'>";
              echo "<h4><b>".$row['item_name']. "</b></h4>";
              echo "<p>Harga  :".$row['item_price']."</p>";
              if($row['item_stock']>15){
                  echo "<p>Status : Tersedia</p>";
              }
              else if($row['item_stock']>5&&$row['item_stock']<15){
                  echo "<p>Status : Terbatas</p>";
              }
              else if($row['item_stock']>0 && $row['item_stock']<5){
                  echo "<p>Status : Hampir Habis</p>";
              }
              else{
                  echo "<p>Habis</p>";
              }
              echo "<form method='POST' action='../view/iteminfo.php'>";
              echo "<input type='hidden' name='itemid' value='".$row['item_id']."'>";
              echo "<input type='submit' value='View More'>";
              echo "</form>";
              echo "</div>";
              echo "</div>";
      }

      mysqli_free_result($result);
      mysqli_close($db);
    ?>
    
</div>
</body>
</html> 
