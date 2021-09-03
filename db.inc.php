<?php
session_start();

//DB Variables
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "leave_management-system_1";

//Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//Check connection
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

?>