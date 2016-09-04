<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 />
	<title></title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
  <script type="text/javascript" src="scripts/jquery.imgareaselect.pack.js"></script>
  <link rel="stylesheet" type="text/css" href="css/imgareaselect-deprecated.css" />

	<style>
	#people{
		width: 1000px;
		height: auto;

	}

	</style>
<body>
<img id="people" src="trump.jpg">
<p></p>
<form action="img.php" method="post" >
       <input type="hidden" name="x1" value="" />
       <input type="hidden" name="y1" value="" />
       <input type="hidden" name="ratio" value="" />
       <input type="hidden" name="y2" value="" />
       <input type="hidden" name="width" value="" />
       <input type="hidden" name="height" value="" />
       <input type="submit" value="Crop" />
   </form>
</body>
</html>

<script type="text/javascript">

$(document).ready(function () {

	function preview(img, selection) {
	    var scaleX = 500 / (selection.width || 1);
	    var scaleY = 500 / (selection.height || 1);
	$('p').text(selection.width + " " +selection.height  + " " + selection.x1  + " " + selection.x2);
	    $('#people + div > img').css({
	        width: Math.round(scaleX * 1000) + 'px',
	        height: Math.round(scaleY * 500) + 'px',
	        marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px',
	        marginTop: '-' + Math.round(scaleY * selection.y1) + 'px'
	    });

	}

 $('#people').imgAreaSelect({
	x1 : 300,
	y1 : 300,
	x2 : 600,
	y2: 600,
	minHeight:200,
	minWidth:200,
	persistent: true,
	aspectRatio: '1:1',
  onSelectChange: preview,
	fadeSpeed: "1",
	handles: true,
	onSelectEnd: function ( image, selection) {
		var img = document.getElementById('people');
		var width = img.naturalWidth;
		var height = img.naturalHeight;
		var ratio = height/$("#people").height();
		alert(ratio);
            jQuery('input[name=x1]').val(selection.x1);
            jQuery('input[name=y1]').val(selection.y1);
            jQuery('input[name=ratio]').val(ratio);
            jQuery('input[name=y2]').val(selection.y1 + selection.height);
            jQuery('input[name=width]').val(selection.width);
            jQuery('input[name=height]').val(selection.height);
        }
});

});
</script>
