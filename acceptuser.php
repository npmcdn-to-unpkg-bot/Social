<?php
session_start();
include_once("db.php");
$senderid=$_GET['id'];
$loggedid=$_SESSION['userid'];

$query = "DELETE FROM friendreq WHERE requesting = $senderid AND receiving = $loggedid";
mysqli_query($conn, $query);
$query = "INSERT INTO friends (user_id,friend_id) VALUES ('$senderid','$loggedid')";
mysqli_query($conn, $query);
$query = "INSERT INTO friends (user_id,friend_id) VALUES ('$loggedid','$senderid')";
mysqli_query($conn, $query);
echo "<script>history.go(-1)</script>"
?>