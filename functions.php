<?php

function displayPosts() {
    global $conn;
	  
   
 	$query= ("SELECT * FROM posts WHERE toid = ". $_GET['id']." ORDER BY id DESC");
	$result = mysqli_query($conn, $query);

 if (mysqli_num_rows($result) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}
while ($row = mysqli_fetch_assoc($result)) {
    $userid = $row["user"];
    $comment = $row["comment"];
    $pictureurl = $row["pictureurl"];
    $postid = $row["id"];
    
    $res2 = mysqli_query($conn, ("SELECT * FROM users WHERE id = $userid"));
    while($row = mysqli_fetch_assoc($res2))
        {  $firstname = $row['firstname'];
            $lastname= $row['lastname'];
            $profilepic = $row['profilepic'];
            if($profilepic==null)
                {
                    $profilepic="images/noimage.jpg";
            }
         }
   if ($pictureurl=="0"  || $pictureurl==null){

    echo '<div class="grid-item ">
                 <div class="restOfBlock">
                 <div class="additionalInfo"><p>'.$comment.'if</p>
                    </div><span class="likescount"><span class="'.$postid.'">'.countLikes($postid)."</span> likes".'</span>
                    <form class="likeform" method="POST">';

                    if(!doiLikeIt($postid)){
                   echo ' <span class="like" id="'.$postid.'">Like</span>';
}   
                    else{echo ' <span class="dislike" id="'.$postid.'">Dislike</span>';}


             echo      '  </form>
                 <div class="postFrom"><img src="'.$profilepic.'"><span>'.$firstname.' '.$lastname.$userid.'</span></div>
                 <div class="comments">
                    <div class="comment"><img src="https://placekitten.com/g/50/50"><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span> </div>
                    <div class="comment"><img src="https://placekitten.com/g/50/50"><span>enean urna augue, pharetra vel suscipit sit amet, pharetra in velit.</span></div> </div>
                 </div>
                 </div>';
                 

                        }
    else{
        echo '<div class="grid-item ">
            <img src="'.$pictureurl.'">
                 <div class="restOfBlock">

                 <div class="additionalInfo"><p>'.$comment.'else</p>
                    </div>

                 <div class="postFrom"><img src="'.$profilepic.'"><span>'.$firstname .' '.$lastname.'</span></div>
                 <div class="comments">
                    <div class="comment"><img src="https://placekitten.com/g/50/50"><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span> </div>
                    <div class="comment"><img src="https://placekitten.com/g/50/50"><span>enean urna augue, pharetra vel suscipit sit amet, pharetra in velit.</span></div> </div>
                 </div>
                 </div>';

    }
}
}


function getProfileFromPage(){
global $conn;
$id = $_GET["id"];

$query = ("SELECT * FROM users WHERE id = ".$id."");
$result = mysqli_query($conn, $query);


while ($row = mysqli_fetch_assoc($result)) {
 $GLOBALS['fn']  = $row['firstname'];
 $GLOBALS['ln'] = $row['lastname'];
 $GLOBALS['profilepic'] = $row['profilepic'];
 $GLOBALS['oldprofilepic'] = $row['oldprofilepic'];
}
}
function getProfileFromId($id){
global $conn;

$query = ("SELECT * FROM users WHERE id = $id");
$result = mysqli_query($conn, $query);


while ($row = mysqli_fetch_assoc($result)) {
 $GLOBALS['fn']  = $row['firstname'];
 $GLOBALS['ln'] = $row['lastname'];
 $GLOBALS['profilepic'] = $row['profilepic'];
 $GLOBALS['oldprofilepic'] = $row['oldprofilepic'];
}
}


function isitme(){

$id = $_GET["id"];
if($id == $_SESSION["userid"])
{
return true;
	
}
else{
	return false;	
}

}



function getFriends()
{

global $conn;
$id = $_GET["id"];

$query=("SELECT  friend1id
FROM    friends
WHERE   friend2id = '1'
UNION ALL
SELECT  friend2id
FROM    friends
WHERE   friend1id = '1'");


$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
	echo $row['friend1id'];
}
}

function icons(){
if(!isitme()){

    if(checks()=="sent")
    {
        echo "Friend request already sent";
            echo '<div class="usericons">
                    <img src="styles/icons/mesl.png">
                    
                    
                    </div>';

    }
    else{
         echo '<div class="usericons">
                    <img src="styles/icons/mesl.png">
                    <img id="addfriend" src="styles/icons/lovel.png">
                    <form class = "addfriendform" name="addfriend" action="addfriend.php" method="post">
                    <input type="hidden" name="id" class="id" value="'.$_GET['id'].'">
                    </form>
                    </div>';

    }
}
   

    else
    {      


    echo "This is my profile!";}

}
function checks(){
    global $conn;
    $getid = $_GET['id'];
    $sessionid = $_SESSION['userid'];
    $query=("SELECT * FROM friendreq  WHERE requesting = $sessionid AND receiving = $getid");
    
    $result = mysqli_query($conn,$query);

 if (mysqli_fetch_row($result)) {
    return "sent";
} 
else {
    return "notsent";
}
}
function profilePic(){
   $profilepic = $GLOBALS['profilepic'];
if(isitme()==true){
   
    echo '<a href="#"><div class="myprofilepicture">
                    <img src=';
                    if(!$profilepic){
                        echo 'images/noimage.jpg';

                    }

                    else{
                     echo $profilepic;
                     } 

                     echo '>
                     <div class="changepic">
                     <span>Change profile picture</span>
                     </div>
                     </div>
                     </a>
                     ';
}
else{
    echo "false";
    echo '<div class="profilepicture">
                    <img src=';
                    if(!$profilepic){
                        echo 'images/noimage.jpg';
                    }

                    else{
                     echo $profilepic;
                     } 

                     echo'>
                     
                     </div>';
}

}

function friendRequests(){
global $conn;
$id = $_SESSION['userid'];

$query = ("SELECT * FROM friendreq where receiving = $id");
$result = mysqli_query($conn,$query);

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['requesting'];
    getProfileFromId($id);
    $firstname = $GLOBALS['fn'];
    $lastname = $GLOBALS['ln'];
    $profilepic = $GLOBALS['profilepic'];
    if(!$profilepic){$profilepic='images/noimage.jpg';}
    echo "<div class = 'friendrequser'><img src='$profilepic'>$firstname $lastname
    <a href='acceptuser.php?id=$id'>accept</a></div>";
}

}
function countLikes($postid){
global $conn;
$query = "SELECT COUNT(1) FROM likes WHERE likedpostid = $postid";
$result = mysqli_query($conn,$query);

$row = mysqli_fetch_array($result);
return $row['0'];
}

function doiLikeIt($postid){
global $conn;
$userid = $_SESSION['userid'];
$query = "SELECT * FROM likes WHERE likedpostid = $postid AND userid = $userid";
$result = mysqli_query($conn,$query);

if (mysqli_num_rows($result) == 0)
    {return false;}
else {
    return true;
}



}











?>