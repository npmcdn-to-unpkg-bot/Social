<?php
session_start();
include_once('db.php');

$postid = $_POST['likeid'];
$userid = $_SESSION['userid'];
$query = "INSERT INTO likes (userid, likedpostid) VALUES ($userid,$postid)";

mysqli_query($conn,$query);

?>