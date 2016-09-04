<?php

session_start();

if(isset($_SESSION['user']))
  {
  	header("Location:userpage.php?id=".$_SESSION['userid']."");
  }
else{
	
}
	?>


<!doctype HTML>
<html>
	<head>
	<script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="loginstyle.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
					<img src="logo2.png" style="width:525px; height:150px;object-fit:cover; margin-left:-40px;">
					<h3>The social network for students, by students</h3>
					</div>
				</div>
				<div class="row">
					<div id="loginForm" class="col-md-5">
						<div class="form-top log">
						<div id="text">
						<h3>Login now</h3>
						<h5>Enter your username and password to log in</h5>
						</div>
						<div id="icon">
						<span class="glyphicon glyphicon-lock"></span>
						</div>
						</div>
						<div class="form-top reg">
						<div id="text">
						<h3>Register now</h3>
						<h5>Pleas enter your personal details</h5>
						</div>
						<div id="icon">
						<span class="glyphicon glyphicon-pencil"></span>
						</div>
						</div>

						<div class="form-bottom log">
						<form action="logreg.php" method="POST">

						<input  required type="text" name="email" placeholder="E-mail...">
						<input  required type="password" name="password" placeholder="Password...">
						<button type="submit" name="login">Submit</button>

						</form>
						<a href="#">
						<span id="register"> Don't have an account? Sign up now!</span>
						</a>
						</div>

						<div class="form-bottom reg">
						<form action="logreg.php" method="POST">
						<input type="text" name="firstname" placeholder="Firstname" required>
						<input type="text" name="lastname" placeholder="Lastname" required>
						<input type="text" name="email" placeholder="E-mail adress" required>
						<input type="text" name="email2" placeholder="Re-enter E-mail" required>
						<input type="password" name="password" placeholder="Password"  required>
						<input type="password" name="password2" placeholder="Re-enter password" required>
						<button type="submit" name="register">Submit</button>
						</form>
						<a href="#">
						<span id="login"> Already have an account? Log in now!</span>
						</a>
					</div>
				
				</div>






			</div>






		</div>
	
	</body>
	<script type="text/javascript">
	$(document).ready(function(){
		$(".container").fadeIn("slow");

		$("#register").click(function(){
			$(".log").slideUp("slow");
			$(".reg").slideDown("slow");


		});
		$("#login").click(function(){
			$(".reg").slideUp("slow");
			$(".log").slideDown("slow");




		});
	});
	</script>
</html>
