<?php


class Dbh
{

    public function connectDB($table)
    {
            //store user in database
            $servername="localhost";
            $username="root";
            $password="";
            $dbname="ManagementDB";
            $dbtable = $table;

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) { die("connection failed"); }

            return $conn;
    }



}

?>