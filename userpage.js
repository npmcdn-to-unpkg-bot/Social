
		$(document).ready(function(){

			$(".myprofilepicture").click(function(){
			console.log("Cancer");
			$('.modal').fadeIn("slow");
			$('.modal-content').load("profilepic.php");

			});

		$(".myprofilepicture").hover(
			function(){$(".changepic").addClass("show");},
			function(){$(".changepic").removeClass("show");}
			);


		


	});
		

		$(window).resize(function(){ $('.grid').masonry("reloadItems");});
	


		
			$(document).ready(function(){
			var screenxs = 960;
			$(".scale").css("height", $(".personal").height());
			$(".groups").css("height", $(".secondscale").height());
			$(".note").css("height", $(".pictures").height());
			$("postForm").css("height", $(".scale").height());


			    if (window.innerWidth <= screenxs) {
			    	$(".topbar").hide();
			    	$(".mobile-topbar").show();
			}
				$(window).resize(function(){
            $(".scale").css("height", $(".personal").height());
            $(".groups").css("height", $(".secondscale").height());
 			 	});
			 jQuery('.burger').on('click', function(event) {        
             jQuery('.holder').slideToggle("fast");

        });
			 $('.ico').on("click",function (event) {
			 	$(".notificationCont").fadeOut();
			 	var thing = (event.target.id);
			 	$('.'+thing).fadeIn("slow");
			 	return false;
				
			 });
			 $(".page").click(function()
{
$(".notificationCont").fadeOut();
});
			 
			});
		