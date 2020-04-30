<?php
    include '../Model/db_conn.php';
    include '../Model/user.php';


    session_start();
    $user = $_SESSION['user'];

    $db = new Database();
    $user = new User();
    $id = $_POST['userid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if(isset($_POST['firstname'])){
        $user->setuserid($id);
        $user->setroleid($role);
        $user->setfirstname($firstname);
        $user->setlastname($lastname);
        $user->setaddress($address);
        $salt = "25003";
        $salted = $_POST['password'] . $salt;
        $hashed = hash('sha256',$salted);
        $user->setpassword($hashed);
        $cek = $db->cekuserid($user->getuserid());
        if(mysqli_num_rows($cek)>0)
        {
            $db->updateuser($user->getuserid(),$user->getfirstname(),$user->getlastname(),$user->getroleid(),$user->getpassword(),$user->getaddress());
            echo "<script> alert('Update Successfull'); location='../view/Show.php';</script>";
            echo "<script> alert('Failed to Update User, Try Again with valid data or other username!'); location='../view/Show.php';</script>";
        }
        else
        {
            echo "<script> alert('Failed to Update User, Try Again with valid data!'); location='../view/Show.php';</script>";
        }
    }
    $db->closedb();

    

?>