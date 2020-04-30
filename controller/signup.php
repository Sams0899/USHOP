<?php   
    include '../Model/db_conn.php';
    include '../Model/user.php';

    $user = new User();
    $db = new Database();
    if(isset($_POST['first_name'])){
        $user->setroleid($_POST['roleid']);
        $user->setfirstname($_POST['first_name']);
        $user->setlastname($_POST['last_name']);
        $user->setaddress($_POST['address']);
        // Tidak perlu salt dan sha256
        // $salt = "25003";
        // $salted = $_POST['password'] . $salt;
        // $hashed = hash('sha256',$salted);
        $salted = $_POST['password'];
        $hashed = hash('md5', $salted);
        $user->setpassword($hashed);

        // $cek = $db->cekusername($user->getfirstname());
      
        // if(mysqli_num_rows($cek)>0)
        // {
        //     echo "<script> alert('Failed to Register, Try Again with valid data'); location='../view/register.php';</script>";
        // }
        // else
        // {
        //     $db->adduser($user->getfirstname(),$user->getlastname(),$user->getroleid(),$user->getpassword(),$user->getaddress());
        //     echo "<script> alert('Register Successfull'); location='../view/login.php';</script>";
        // }
        $db->adduser($user->getfirstname(),$user->getlastname(),$user->getroleid(),$user->getpassword(),$user->getaddress());
        echo "<script> alert('Register Successfull'); location='../view/Show.php';</script>";
    }
    $db->closedb();

    
    
?>
