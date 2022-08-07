<?php
/**
 * Your code here
 */
require_once('../models/post.php');
$com_id =$_POST['comments_id'];
$post_id =$_POST['posts_id'];
// call funtion delete comments
$deleteSucess= deleteComment($com_id,$post_id);

if($deleteSucess){
    header('location: /home.php');//go to home page

}