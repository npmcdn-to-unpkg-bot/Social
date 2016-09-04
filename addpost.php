<?php 
session_start();
include("db.php");

$comment=$_POST['comment'];
$userid=$_SESSION['userid'];
$toid = $_POST['toid'];
$pictureurl = $POST['pictureurl'];


$sql=("INSERT INTO posts (comment,user,toid) VALUES ('".$comment."','".$userid."','".$toid."')");
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}





?>