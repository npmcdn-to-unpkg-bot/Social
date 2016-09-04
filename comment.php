<?php 

include("db.php");

$comment=$_POST['comment'];
$userid=$_SESSION['userid'];

$sql=("INSERT INTO posts (comment,user) VALUES ('".$comment."','".$userid."')");
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}





?>