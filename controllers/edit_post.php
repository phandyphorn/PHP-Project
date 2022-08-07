<?php
require_once('../models/post.php');

// get information from post
$id_post= $_POST['postID'];
$description_post= $_POST['descripe'];
$image=$_POST['myfile'];

if (empty($image) or !empty($description_post)){
    editPosts($id_post, $description_post);
}
if(!empty($image)){
    editPost($id_post, $description_post,$image);
};

header('location: /home.php');

