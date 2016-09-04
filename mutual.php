<?php
session_start();
include_once('db.php');

$query = "SELECT u.*, count(f1.user_id) as num_mutual_friends
from friends f1 
join friends f2 on f2.user_id = f1.friend_id 
join users u on u.id = f2.friend_id
where f1.user_id = 3
  
  and u.id <> 3
group by u.id
order by num_mutual_friends desc;
";


$res = mysqli_query($conn,$query);

var_dump($res);
echo "<br>";
while ($row = mysqli_fetch_assoc($res)) {
	echo "id".$row['id']."</br>";
  echo "mutualfr".$row['num_mutual_friends'].'</br>';
  
}

?>