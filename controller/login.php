<?php
    include '../Model/db_conn.php';
    include '../Model/user.php';

    session_start();

    $user = new User();
    $db = new Database();

    $userid=$_POST['userid'];
    $password=$_POST['password'];

    // $salt = "25003";
    // $salted = $password . $salt;
    //$hashed = hash('sha256', $salted); //hash menggunakan sha256
    $hashed = hash('md5',$password);

    $res =  $db->login($userid, $hashed);
    if(mysqli_num_rows($res)>0)
    {  
        $data = $db->assigndata($userid, $hashed);
        while($dataobj = $data ->fetch_object()) 
        {
            $user->setfirstname($dataobj->first_name);
            $user->setlastname($dataobj->last_name);
            $user->setroleid($dataobj->role_id);
            $user->setuserid($dataobj->user_id);
            $user->setaddress($dataobj->address);
        }
        //echo "<script> window.location.href = '';
        $_SESSION['user'] = $user;
        echo "<script> alert('Login Sukses');</script>";
        if($user->getroleid()=="1"){
            echo "<script> window.location.href = '../View/show.php'; </script>" ;
        }
        else if($user->getroleid()=="2"){
            echo "<script> window.location.href = '../View/show2.php'; </script>" ;
        }
        else if($user->getroleid()=="3"){
            echo "<script> window.location.href = '../View/show3.php'; </script>" ;
        }
        else if($user->getroleid()=="4"){
            echo "<script> window.location.href = '../View/show4.php'; </script>" ;
        }

    }
    else
    {
        echo "<script> alert('Login Gagal');location = '../index.php';</script>";
    } 
?>