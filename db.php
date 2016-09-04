<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "social";
global $conn;
$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){

  echo "fail";
}

?>
