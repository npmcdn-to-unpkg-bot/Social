<?php
session_start();
include_once('db.php');
$original_image = $_POST['original'];
$changed_image_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $original_image);
$new_image = $changed_image_name."_thumb".'.jpg';
$image_quality = '95';

// Get dimensions of the original image
list( $current_width, $current_height ) = getimagesize( $original_image );
$current_width/=2;
$current_height/=2;

// Get coordinates x and y on the original image from where we
// will start cropping the image, the data is taken from the hidden fields of form.
$x1 = $_POST['x1'];
$y1 = $_POST['y1'];
$width = $_POST['width'];
$ratio = $_POST['ratio'];
$height = $_POST['height'];
$height*=$ratio;
$width*=$ratio;
$x1*=$ratio;
$y1*=$ratio;

$crop_width = 500;
$crop_height = 500;
// Create our small image
$new = imagecreatetruecolor( $crop_width, $crop_height );
// Create original image
$current_image = imagecreatefromjpeg( $original_image );
// resampling ( actual cropping )
imagecopyresampled( $new, $current_image, 0, 0, $x1, $y1, $crop_width, $crop_height, $width, $height );
// this method is used to create our new image
imagejpeg( $new, $new_image, $image_quality );

$id = $_SESSION['userid'];
 $query = ("UPDATE users SET profilepic = '$new_image' where id = $id");

  mysqli_query($conn,$query);
  header( "Location: userpage.php?id=$id" );
  
?>

