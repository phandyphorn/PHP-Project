
<?php
/**
 * Your code here
 */
require_once("../templates/header.php");
?>

<div class="container_post_view">
    <!-- Your code here -->
    <form action="../controllers/create_post.php"  method="post" enctype="multipart/form-data">
        <div class="upload-btn-wrapper">
            
            <button class="btn"><i class="fas fa-upload text-muted fs-4 "></i>Upload a file</button>
            <input type="file" name="myfile" />
        </div>
        <br>
        
        <textarea placeholder="What are you thinking about.............." class="input" name="description"> </textarea>
        
        <br>
        <input type="submit" value="POST" class="btn_post">
        
    </form>
</div>
<?php
require_once("../templates/footer.php");
?>

