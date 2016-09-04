<?php
include_once('functions.php');
include_once('db.php');
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=social', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
 
$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT * FROM users WHERE firstname LIKE (:keyword) OR lastname LIKE (:keyword) OR wholename LIKE (:keyword)";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
if (empty($list)){echo "Nothing was found :/";}
foreach ($list as $rs) {
	$name = $rs['firstname']." ".$rs['lastname'];
	$id = $rs["id"];
	getProfileFromId($id);
	$profilepic = $GLOBALS['profilepic'];
	if(!$profilepic){$profilepic=('images/noimage.jpg');}
	$name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $name);
	// add new option
    echo '<a href="userpage.php?id='.$id.'"><li onclick="set_item(\''.str_replace("'", "\'", $name).'\')"><img src="'.$profilepic.'">'.$name.$id.'</li></a>';
}
?>