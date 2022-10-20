<?php

//entity class that interacts with the database
include "dbh.classes.php";

class User
{

        public function checkUser($uid, $pwd)
        {
            $dbtable = 'Users';
            
            //create database ojbect to connect to the database
            $database = new Dbh();
            $conn = $database->connectDB($dbtable);

            $valid = $this->validUser($uid, $pwd, $conn, $dbtable);

            if($valid == false)
            {   
                //return to login page
                header("Location: index.php");
            }

            if($valid == true)
            {
                $role = $this->getRole($uid, $pwd,$conn, $dbtable);
                return $role;
            }
            
        }

        private function validUser($uid, $pwd, $conn, $dbtable)
        {
            $sql = "SELECT u_id, u_password FROM $dbtable WHERE u_id='$uid' and u_password='$pwd'";
            $QueryResult = mysqli_query($conn, $sql);

            $loginValid = false;
            
            if(mysqli_num_rows($QueryResult) == 1)
            {
                $loginValid = true;
            }
            
            return $loginValid;

        }

        private function getRole($uid, $pwd, $conn, $dbtable)
        {
            $sql2 = "SELECT u_role FROM $dbtable WHERE u_id='$uid' and u_password='$pwd'";
            $QueryResult2 = mysqli_query($conn, $sql2);
            $Row2 = mysqli_fetch_row($QueryResult2);

            echo $Row2[0];

            return $Row2[0];
        }

}


?>