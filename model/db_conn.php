<?php

    class Database{

        var $host = "localhost";
        var $username = "root";
        var $dbname = "ushop";
        var $password = "";
        var $db;
        
        function __construct()
        {   
            $this->db = mysqli_connect($this->host, $this->username, $this->password);
            mysqli_select_db($this->db ,$this->dbname);
        }

        function adduser($firstname, $lastname, $roleid, $password,$address)
        {
            mysqli_query($this->db, "INSERT INTO user (password, first_name, last_name, role_id, address) VALUES('$password', '$firstname', '$lastname', '$roleid', '$address');");
        }
        
        function login($userid, $hashed)
        {
            $userid=mysqli_real_escape_string($this->db, strip_tags($userid));
            $res = mysqli_query($this->db, "SELECT first_name FROM user WHERE user_id = '$userid' AND password = '$hashed'"); //masih pake username, bukan email
            return $res;
        }

        function assigndata($userid, $hashed)
        {
            $res = mysqli_query($this->db, "SELECT * FROM user WHERE user_id = '$userid' AND password = '$hashed'");
            return $res;
        }
        function assigndataadmin($username)
        {
            $res = mysqli_query($this->db, "SELECT * FROM user WHERE first_name = '$username'");
            return $res;
        }
        function updateuser($userid,$firstname, $lastname, $role, $password, $address){
            mysqli_query($this->db, "UPDATE user set first_name='$firstname', last_name='$lastname', role_id='$role',address='$address',password='$password' WHERE user_id='$userid'");
        }

        function deleteuser($userid)
        {
            $res = mysqli_query($this->db, "DELETE FROM user WHERE user_id = '$userid'");
        }

        function cekitem($itemid){
            $res = mysqli_query($this->db, "SELECT item_name FROM item where item_id='$itemid'");
            return $res;
        }
        function cekuserid($userid){
            $res = mysqli_query($this->db, "SELECT first_name FROM user where user_id='$userid'");
            return $res;
        }

        function cekusername($username)
        {
            $res = mysqli_query($this->db, "SELECT first_name FROM user WHERE first_name = '$username'"); 
            return $res;
        }

        function assignitems($itemid)
        {
            $res = mysqli_query($this->db, "SELECT * FROM item where item_id='$itemid'");
            return $res;
        }
        function additem($itemname, $itemstock, $itemprice, $itemdesc)
        {
            mysqli_query($this->db, "INSERT INTO item (item_name, item_stock, item_price, item_desc) VALUES('$itemname', '$itemstock', '$itemprice', '$itemdesc');");
        }
        function deleteitem($itemid)
        {
            $res = mysqli_query($this->db, "DELETE FROM item WHERE item_id = '$itemid'");
        }

        function edititem($itemname, $itemname2, $price, $stock){
            mysqli_query($this->db, "UPDATE item set item_name='$itemname2', item_price='$price', item_stock='$stock' WHERE item_name='$itemname'");
        }
        
        // function showdata()
        // {
        //     $data = mysqli_query($this->db, "SELECT * FROM student");
        //     while($d = mysqli_fetch_array($data)){
        //         $hasil[] = $d;
        //     }
        //     return $hasil;
        // }

        // function adddata($StudentID, $FirstName, $LastName, $Description)
        // {
        //     mysqli_query($this->db, "INSERT INTO student (StudentID, FirstName, LastName, Description) VALUES('$StudentID', '$FirstName', '$LastName', '$Description');");
        // }

        // function updatedata($StudentID, $FirstName, $LastName, $Description)
        // {
        //     mysqli_query($this->db, "UPDATE student SET StudentID='$StudentID' WHERE StudentID='$StudentID';");
        //     mysqli_query($this->db, "UPDATE student SET FirstName='$FirstName' WHERE StudentID='$StudentID';");
        //     mysqli_query($this->db, "UPDATE student SET LastName='$LastName' WHERE StudentID='$StudentID';");
        //     mysqli_query($this->db, "UPDATE student SET Description='$Description' WHERE StudentID='$StudentID';");
        // }

        // function deletedata($id)
        // {
        //     mysqli_query($this->db, "DELETE FROM student WHERE StudentID='$id'");
        // }
        function closedb(){
            $this->db->close();
        }
        
    }

    

?>