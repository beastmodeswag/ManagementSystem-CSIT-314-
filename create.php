<?php
//connection details
$servername="localhost";
$username="root";
$password="";
$dbname="ManagementDB";

//connect to backend
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) { die("connection failed"); }

//create database(restaurantDB) if not created already
$sql = "create database if not exists $dbname";
if ($conn->query($sql)===TRUE)
{ echo ""; }
else
{ echo "err create db","<br>"; }

$conn->close();

//connect to database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("connection failed"); }

//create Users table in ManagementDB if not created already
$dbtable = "Users";

$checktable = $conn->query("show tables like '$dbtable'");
$table_exists = $checktable->num_rows >= 1;

if (!$table_exists) 
{
	$sql = "create table $dbtable (
			u_id varchar(30) primary key,
			u_name varchar(30),
			u_password varchar(30),
			u_role varchar(30)
			)";
	if ($conn->query($sql)===TRUE)
	{ echo ""; }
	else
	{ echo "err creating table", "<br>"; }
}

//create other tables



$conn->close();

?>