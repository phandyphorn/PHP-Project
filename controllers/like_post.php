<?php
    require_once("../models/post.php");

    $post_id=$_GET['id_post'];

    like_post(3,$post_id);

    header('location: /../home.php');