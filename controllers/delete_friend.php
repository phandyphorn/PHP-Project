<?php
/**
 * Your code here
 */
require_once('../models/post.php');
$id =$_GET['id'];
// call funtion delete friends
$deleteSucess= deleteFriend($id);

header('location: ../friends_view.php');//go to friends page
