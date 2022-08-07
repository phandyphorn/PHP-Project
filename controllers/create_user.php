
<?php
    require_once("../models/post.php");
    // call information from users
    $user_name=$_POST['usernames'];
    $user_gender=$_POST['gender'];
    $user_birth=$_POST['birthday'];
    $user_email=$_POST['emails'];
    $user_password=$_POST['psws'];
    // call funtion to get information from user
    adduser($user_name,$user_gender,$user_birth,$user_email,$user_password);
    header('location: /../index.php');//go to index page