<?php
session_start();
require_once("db.php");


	$senderid = $_SESSION['userid'];
	$recieverid = $_POST['id'];
$query = ("INSERT into friendreq (requesting, receiving) VALUES ('".$senderid."','".$recieverid."')");

mysqli_query($conn,$query);



?>