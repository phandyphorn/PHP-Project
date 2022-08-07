<?php 
 
    session_start();
    require_once("../templates/header.php");
    require_once("../models/post.php");

// -----------
    $description_post = $_POST['description'];
 
     // UPLOAD IMAGE
    $target = "../images/" .$_FILES['myfile']['name'];
    move_uploaded_file($_FILES['myfile']['tmp_name'],$target);
    $file_name = $_FILES['myfile']['name'];
    // call funtion to get information for post
    createPost($description_post,$file_name, $_SESSION['id']);
    header('location: /home.php');//go to home page



