<?php
/**
 * Your code here
 */
require_once('../models/post.php');
$id =$_GET['id'];
// call funtion delete post
$deleteSucess= deletePost($id);
header('location: /../views/profile_view.php');//when we remove it have don't show the wirte bg
