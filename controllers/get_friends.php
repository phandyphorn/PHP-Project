<?php
session_start();
require_once('models/post.php');
   $friends = getFriend();
?>
<?php
   foreach ($friends as $friend){
      // session name of friends and id
      $_SESSION['name_friend']=$friend['name_fri'];
      $_SESSION['id_friend']=$friend['id_fri'];
   }
?>
