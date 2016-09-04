<?php
session_start();
include_once('db.php');
if ($_POST["label"]) {
    $label = $_POST["label"];
    function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}


}
$allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 20000000000)
&& in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {
        $filename = 'neta'.random_string(30).".jpg";;
        

        if (file_exists("upload/" . $filename)) {
            echo $filename . " already exists. ";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"],
            "upload/" . $filename);
            
            echo "<img src='upload/". $filename ."' id='people'>";
        }
    }
} else {
    echo "Invalid file";
}
?>