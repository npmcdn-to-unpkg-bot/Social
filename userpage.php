<?php
session_start();
include_once("db.php");
include_once("sessiondetails.php");
include_once("functions.php");

if(!isset($_SESSION['user'])){
	
  }
else{
	getProfileFromPage();

}
checks();
				
	?>
<!DOCTYPE html>
<html>
	<head>


       <meta name="viewport" content="width=device-width">
		<meta charset="UTF-8">
		<title>title</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="https://unpkg.com/imagesloaded@4.1/imagesloaded.pkgd.js"></script>
		<script type="text/javascript" src="masonry.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<link href="styles/userpage.css" rel="stylesheet">
		<script type="text/javascript" src="userpage.js"></script>
		
			<script type="text/javascript">
   $(document).ready(function(){
	var form = $(".addfriendform");
	console.log($('.id').val());
			$("#addfriend").one('click',function(form) {
        	console.log("clicked");
			var id = $(".id").val(); 
			console.log(id);
			$.ajax({
            type: 'POST',
            url: 'addfriend.php',
            data: {"id": id},
            success: function(data) {

           	 $('.usericons').html("<img src='styles/icons/mesl.png'> <img src='styles/icons/loved.png'>");

           }
        }); 
        });
		});
</script>

<script type="text/javascript">
		console.log('hi');
		$(document).ready(function(){
				var form = $(".postForm");

			$(".postbutton").click(function() {
        	console.log("Pressed");
        	console.log(form);
			var comment = $(".postbox").val();
			var toid = $(".toid").val(); 
			console.log(comment);
			$.ajax({
            type: 'POST',
            url: 'addpost.php',
            data: {"comment": comment,
        			"toid": toid },
            success: function(data) {
            	 location.reload(true);
            	//$('.posts').load("userpage.php?id=<?php echo $_SESSION['userid'];?> .grid")
            	
	;
		
           
           }
        }); 
        });
		});

				</script>
				<script type="text/javascript">
				$(document).ready(function() {
					
		$('.search').keyup(function () {
			console.log("hi");

			var min_length = 1; // min caracters to display the autocomplete
	var keyword = $('.search').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'ajax_refresh.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#suggestions').show();
				$('#suggestions').html(data);
			}
		});
	} else {
		$('#suggestions').hide();
	}

 
// set_item : this function will be executed when we select an item

});
	});
 
// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#suggestions').val(item);
	// hide proposition list
	$('#suggestions').hide();
}
				</script>

	<script type="text/javascript">
		$(document).ready(function(){
		$('.like').click(function(){
		var likeid = this.id;
		console.log(likeid);
		$.ajax({
            type: 'POST',
            url: 'likepost.php',
            data: {"likeid": likeid
			},
            success: function(data) {
            	 console.log(data);
            	var value = parseInt($("."+likeid).text(), 10) + 1;
		$("."+likeid).text(value);
		$(".like#"+likeid).text('liked');
		$(".like#"+likeid).removeAttr('id');
            	
	;
		
           
           }
        }); 
		});


		});
	</script>
	</head>
	<body>
		<div class="wrapper">
		<div class="topbar">
		<div class="inner col-md-4">
			<img class="logo" src="logof.png">
		</div>
		<div class="inner col-md-3">
			<form class="searchform" method="post">
				<input type="text" class="search" autocomplete="off" name="search">
				<button type="submit"></button>
				  <ul id="suggestions"></ul>
				</input>
			</form>
		</div>
		<div class="inner userdet col-md-4 col-lg-3 pull-md-right">
			<div class="helpme">
				<div class="icons">
					<a><img class="ico" id="friend" src="styles/icons/friend.png"></a>
					<div class="notificationCont friend">
						<?php friendRequests();?>

						</div>
					<a><img class="ico" id="messages" src="styles/icons/mesl.png"></a>
					<div class="notificationCont messages">

						</div>
					<a><img class="ico" id="notific" src="styles/icons/notif.png"></a>
					<div class="notificationCont notific">

						</div>
					<div class="clear"></div>
				</div>
			</div>
			<a href="userpage.php?id=<?php echo $_SESSION['userid']?>">
			<div class="bothThings" >
			<div class="profilePicture">
				<img src="<?php

					if(!$logged_profilepic){
						echo 'images/noimage.jpg';
					}

					else{


					 echo $logged_profilepic;
					 } 

					 ?>">
			</div>
			<div class="name">
				<h5>Simeon</h5>
				
			</div>
			<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		</a>
		</div>


		<div class="mobile-topbar">
			<div class=" inner col-xs-3 logo col-sm-2">
				<img src="logom.png">
			</div>
				<div class="inner col-xs-6 col-sm-8">
			<form method="post">
				<input type="text" class="search" name="search">
				<button type="submit"></button>
				  <ul id="suggestions"></ul>
				</input>
			</form>
				</div>
			<div class="inner burger col-xs-2 col-sm-2">
			<img src="styles/icons/menu.png">

			</div>

		</div>
		<div class="holder">
		<div class="mobile_menu">
			<img src="styles/icons/friend.png"> 
			<img src="styles/icons/mesl.png"> 
			<img src="styles/icons/notif.png"> 
		</div>
		</div>

		<div class="page">
			<div class=" personal col-md-2 col-xs-3">
				<?php 
				getProfileFromPage();
				profilepic(); ?>

					<span class="profileName"><?php
						 echo $fn." ".$ln; 
						 	
						 ?></span>
					<span class="profileSchool">Dauntsey's school</span><br>
					<span class="profileClass">Class of 2016</span><br><br>
					<?php 
					icons();
					
					?>
			</div>	
			<div class="row scale">
				<div class="note col-md-3 col-xs-9">
						
						<form class="postForm">
								<textarea class="postbox">  </textarea>
								<input type="hidden" class="toid" value="<?php echo $_GET['id']?>"></input>
								<button type="button" class="postbutton btn btn-success">Post</button>
								<span class="clear"></span>
								</form>
				</div>
				<div class="polaroid col-md-3 col-xs-6">
						<div class="topPart"><img src="images/noimage.jpg"></div>
						<div class="bottomPart"><span>This was me</span></div>
				</div>
				<div class="pictures col-md-4 col-xs-6">
					<img src="https://placekitten.com/g/300/300">
					<img src="https://placekitten.com/g/300/300">
					<img src="https://placekitten.com/g/300/300">
					<img src="https://placekitten.com/g/300/300">
				</div>

			</div>
			<div class="row secondscale">
			<div class="groups col-md-2 col-xs-12">
				<h3> Groups </h3>
				<div class="group"><img src="images/noimage.jpg"><span>Group 1</span></div>
				<div class="group"><img src="images/noimage.jpg"><span>Group 1</span></div>	
				<div class="group"><img src="images/noimage.jpg"><span>Group 1</span></div>
			</div>
			<div class="posts col-md-10 col-xs-12">
				
					 <div class="grid">
  				
  				<?php displayPosts(); ?>;

  				 	<div class="clear"></div>
  				 </div>


				</div>

								 
			</div>
		</div>
	<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">×</span>
    <p>Some text in the Modal..</p>
  </div>

</div>

	
	</body>
</html>
<script type="text/javascript">
	$(window).on('load', function()  {

		$('.grid').masonry({
 				
  			itemSelector: '.grid-item',
  			gutter: 10,
  			fitWidth: false
			});
	
		$('.grid').masonry('bindResize');
		
	});
</script>

