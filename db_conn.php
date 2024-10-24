<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employees_db";

// creating a connection 
$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection
if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
// else echo "Connected successfully"
?>