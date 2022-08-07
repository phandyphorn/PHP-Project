<!-- use session to store information user -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook 2.0</title>
    <!-- Your style here -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <nav class="nav_bar">
        <div class="logo">
            Facebook
        </div>
        <!-- get the name of page -->
        <?php
        $page = "";
        if (isset($_GET['pages'])) {
          $page = $_GET['pages'];
        } else {
          $page = "home";
        }
    ?>
        <div class="menu">
            <a class="" aria-current="page" href="#"><i class="fas fa-home fs-4  <?php if($page != 'home.php'){ echo 'active text-primary';}else{echo 'active text-muted';} ?>" id="home"></i></a>
            <a class="" href="friends_view.php?pages=friend_view"><i class="fas fa-users  fs-4 <?php if($page == 'friends_view'){ echo 'active text-primary';}else{echo 'active text-muted';} ?>" id="friends"></i></a>            
        </div>
        <div class="sideba_left">
            <a href="views/profile_view.php" class="profile">
                <img src="../images/user_ph.png "class="img_pro" alt="">
            </a>
            <a href="index.php">LOG OUT</a>
        </div>

    </nav>
<?php
/**
 * Your code here
 */
// require_once("templates/header.php");
require_once("models/post.php");
?>



<!-- go to input post -->
<div class="coverElementPost">
    <div class="user_decri">
        <img src="images/user_ph.png" alt="" class="pro_user" >
        <form action="../controllers/create_post.php"  method="post" class="form_staus">
            <input type="text" name="description" class="input"  placeholder="What is you feeling...?">
            <input type="submit"  value="post" class="btn_input">
        </form>
    </div>
    <div class="line"></div>
   
    <div class="button_post">
        <a href="views/post_view.php"><i class="fas fa-file-image img_btnpost"></i> Photo/Video</a> 
    </div>

</div>

<!-- form display post -->
<?php
// get all item from post
$postImformation = getPosts();
// get the name of user
$nameUser = getUserName();

foreach ($postImformation as $informationOfPost):
    $nameofuser=$_SESSION['name'];
?>

<div class="showElementPost ">
    <div class="header_card">
        <div class="user_decri">
            <img src="images/user_ph.png" alt="" class="pro_user" >
            <div class="infor">
                <div class="user_name"><?php echo $nameofuser ?></div>
                <div class="date">
                    <?php date_default_timezone_set('Asia/Phnom_Penh'); ?>
                    <?= $informationOfPost['date_post'] = date("D M j Y G:i:s a"); ?>
                </div>
            </div>
        </div>
        <div class="item_crud">
            <a href="views/edit_view.php?id=<?php echo $informationOfPost['id_post']; ?>"><i class="fas fa-edit img_btnpost edit"></i></a>
            <a href="controllers/delete_post.php?id=<?php echo $informationOfPost['id_post']; ?>"><i class="fas fa-trash img_btnpost delete"> </i></a>
        </div>
        
    </div>
    <div class="infor_user">
        
    <?php 
        if (!empty($informationOfPost['images']) and !empty($informationOfPost['description_post'])) {
    ?>
        <div class="not_status"><?php echo $informationOfPost['description_post']; ?></div>   
        <div class="cover_photo">
            <img src="images/<?php  echo $informationOfPost['images'];?>" class="photo_post" alt="">
        </div> 

    <?php    
        }elseif (!empty($informationOfPost['description_post']) and empty($informationOfPost['images'])){
    ?>
        <div class="status"><?php echo $informationOfPost['description_post']; ?></div>   

    <?php
        }
    ?>

    </div>
    
    <div class="line"></div>
    <?php
    // call the funtion like 
    $liker =get_like();
    // varrible to store number of like
    $increseLike=0;
    foreach ($liker as $numLike){
        if($informationOfPost['id_post']==$numLike['id_post']){
            $increseLike+=1;
        }
    }
    ?>
    <div class="like_place">
        <?= $increseLike?>
    </div>
    <div class="element_like_comment">
        <div>
            <a href="controllers/like_post.php?id_post=<?php echo $informationOfPost['id_post']; ?>" class="like_element"><i class="fas fa-thumbs-up img_btnpost"></i> Like</a> 
        </div>
        <div>
            <a href=""  class="comment_element"><i class="fas fa-comment-alt img_btnpost"></i> Comment</a> 

        </div>
    </div>
    
</div>

<div class="showElementPost comments_bar">
    <form action="controllers/comment_post.php?id_post=<?php echo $informationOfPost['id_post']; ?>" method="post" >
        <div class="comment_user_box">
            <input type="text" class="input_comment" placeholder="your message" name="user_message" required>
            <button class="btn_comment" type="submit">
                Sent

            </button>
        </div>
    </form>
        <div class="show_commit" id="eleShowComment">
            <?php
             $commentFromUser = get_comment();
             
            foreach ($commentFromUser as $messageFromComment):
                

            ?>
            <?php
             if($informationOfPost['id_post']==$messageFromComment['id_post']){
          
                 ?>
                <div class="user_commer">   
                    <?= $messageFromComment["comment"]?>
                    <form action="controllers/delete_comment.php?id=<?php echo $informationOfPost['id_post']; ?>" method="post">
                        <input type="hidden" value="<?= $informationOfPost['id_post'];?> " name="posts_id">
                        <input type="hidden" value="<?= $messageFromComment['id_comment'];?> " name="comments_id">
                        <button class="btn_comment" type="sumbit"><i class="fas fa-trash img_btnpost delete"  style ="color:red; "> </i></button>

                    </form>
                </div>
                <?php
             }
             ?>
            <?php
                endforeach;
            ?>

        </div>
        

  
</div>



    <?php
    endforeach
    ?>


<?php
require_once("templates/footer.php");
?>