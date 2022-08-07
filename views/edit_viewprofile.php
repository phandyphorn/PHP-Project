
<?php
/**
 * Your code here
 */
require_once("../templates/header.php");
require_once("../models/post.php");

?>

<div class="container_post_view">
    <!-- Your code here -->
    <?php
    // get id from db post
        $post_id = $_GET['id'];
        
        $itempost = getPostById($post_id);
    ?>
    <form action="../controllers/edit_postprofile.php"  method="post">
        <div class="upload-btn-wrapper">
            <button class="btn"><i class="fas fa-upload text-muted fs-4 "></i>Upload a file</button>
            <input type="file"  name="myfile">
        </div>

        <br>
        <input type="hidden" value="<?php echo $post_id ;?>" name="postID">
        <textarea placeholder="What are you thinking about.............." class="input" name="descripe" value="<?= $itempost['description_post'] ;?>"><?= $itempost['description_post'] ?> </textarea>
        
        <br>
        <input type="submit" value="Change" class="btn_post">
        
    </form>
</div>


<?php
require_once("../templates/footer.php");
?>
