<?php

//include(__DIR__."/../Restaurant/dbs.classes.php")
include "../user.classes.php";

class Admin Extends User
{

    //view info on all users
    public function getAll()
    {   
        //store output to return
        $output = '';

        //create database object
        $database = new Dbh();

        //connect to database
        $dbtable = "Users";
        $conn = $database->connectDB($dbtable);

        //query
        $sql = "SELECT * from $dbtable";
        $result = $conn->query($sql);

        //if the query returned any rows
        if ($result->num_rows > 0)
        {
            while ($row=$result->fetch_assoc())
            {
                //format output
                $output .= "<div class='AccountInfo'>";
                $output .= "<div class='AccountTextHolder'>";
                $output .= "User ID : " . $row["u_id"] . "<br>";
                $output .= "Role : " . $row["u_role"] . "<br>";
                $output .= "</div>";
                $output .= "</div>";
            }
        }
        //if query returned 0 rows
        else
        { 
            $output = "No record"; 
        }

        return $output;
    }


    public function createUser($uid, $pwd, $role)
    {
        //create database object
        $database = new Dbh();

        //connect to database
        $dbtable = "Users";
        $conn = $database->connectDB($dbtable);

        
        //try to insert user into database
        try
        {
            //query
            $sql = "INSERT INTO $dbtable (u_id, u_password, u_role)
            VALUES ('$uid', '$pwd', '$role')";

            $result = $conn->query($sql);
        }
        //catch errors(failed to insert etc.)
        catch(Exception $e)
        {
            return false;
        }

        return true;
    }


    public function deleteUser($uid)
    {
        //create database object
        $database = new Dbh();

        //connect to database
        $dbtable = "Users";
        $conn = $database->connectDB($dbtable);

        //query
        $sql = "DELETE FROM $dbtable WHERE u_id='$uid'";
        $result = $conn->query($sql);

        if($conn->affected_rows < 1)
        {
            return false;
        }

        return true;
    }


    public function searchUser($uid)
    {
        //store output to return
        $output = '';

        //create database object
        $database = new Dbh();

        //connect to database
        $dbtable = "Users";
        $conn = $database->connectDB($dbtable);

        //query
        $sql = "SELECT * FROM $dbtable WHERE u_id='$uid'";
        $result = $conn->query($sql);

        //if query returns 1 or more rows
        if ($result->num_rows > 0)
        {
            $row=$result->fetch_assoc();
            $output .= "<div class='AccountInfo'>";
            $output .= "<div class='AccountTextHolder'>";
            $output .= "User ID : " . $row["u_id"] . "<br>";
            $output .= "Role : " . $row["u_role"] . "<br>";
            $output .= "</div>";
            $output .= "</div>";
        }
        //if query returns 0 rows
        else
        {
            $output = "Account does not exists.";
        }

        return $output;

    }

    public function updateUser($uid, $pwd, $role)
    {

        $result1 = true;
        $result2 = true;
        $result3 = true;


        //create database object
        $database = new Dbh();

        //connect to database
        $dbtable = "Users";
        $conn = $database->connectDB($dbtable);

        //check if uid exists
        $sql = "SELECT * FROM $dbtable WHERE u_id='$uid'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0)
        {
            return false;
        }

        if($pwd != null)
        {
            $sql = "UPDATE $dbtable SET u_password='$pwd'
                    WHERE u_id='$uid'";
            $result1 = $conn->query($sql);
        }
        

        if($role != null)
        {
            $sql = "UPDATE $dbtable SET u_role='$role'
                    WHERE u_id='$uid'";
            $result3 = $conn->query($sql);
        }


        if($result1 === TRUE && $result2 === TRUE && $result3 === TRUE)
        {
            $result = true;
        }
        else
        {
            $result = false;
        }
        
        return $result;

    }

}


?>