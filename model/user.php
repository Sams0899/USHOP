<?php

    class User {

        private $userid;
        private $firstname;
        private $lastname;
        private $password;
        private $address;
        private $roleid;

        function setuserid($userid){
            $this->userid = $userid;
        }
        function setfirstname($firstname){
            $this->firstname = $firstname;
        }
        function setlastname($lastname){
            $this->lastname = $lastname;
        }
        function setpassword($password){
            $this->password = $password;
        }
        function setroleid($roleid){
            $this->roleid = $roleid;
        }
        function setaddress($address){
            $this->address = $address;
        }

        function getuserid(){
            return $this->userid;
        }
        function getfirstname(){
            return $this->firstname;
        }
        function getlastname(){
            return $this->lastname;
        }
       
        function getpassword(){
            return $this->password;
        }
        function getroleid(){
            return $this->roleid;
        }
        function getaddress(){
            return $this->address;
        }
    }
?>