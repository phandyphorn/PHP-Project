<?php
/**
 * Your code here
 */

require_once('../models/post.php');
$id =$_GET['id'];
$deleteSucess= deletePost($id);

if($deleteSucess){
    header('location: /home.php');//got to home page

}else{
    echo"Cannot delete item with id ".$id;
}

