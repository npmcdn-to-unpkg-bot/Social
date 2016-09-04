<?php



if(!isset($_SESSION['user']))
  {
  	header("Location:index.php");
  }
else{
	$token = $_SESSION["userid"];

	$query = ("SELECT * FROM users WHERE id=$token");
 	$result = mysqli_query($conn, $query);

 	while ($row = mysqli_fetch_assoc($result)) {
    $logged_firstname = $row["firstname"];
    $logged_lastname = $row["lastname"];
    $logged_email = $row["email"];
    $logged_profilepic = $row["profilepic"];
    $logged_oldprofilepic = $row["oldprofilepic"];
}














}
	?>
