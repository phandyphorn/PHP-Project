
<!-- Create posts -->
<?php
require_once('database.php');

// Function Creating Post===========================================================================
function createPost($description_post,$file_name, $userId)
{
    global $db;
    $description_post= $_POST['description'];
    $statement=$db->prepare("INSERT INTO userposts (description_post,images, id_user) VALUES(:description,:images,:userID)");
    $statement->execute([
        ':description'=>$description_post,
        ':images'=>$file_name,
        ':userID' => $userId
    ]);
    return ($statement->rowCount()==1);
}

// Function Get all Posts (attribute) from Posts table=============================================
function getPosts()
{
    global $db;
    $statement = $db->prepare("SELECT id_post, description_post, date_post, images, id_user FROM userposts ORDER BY id_post DESC;");
    $statement->execute();
    $postItems = $statement->fetchAll();
    return $postItems;
}

// Function Get only id from posts table===========================================================
function getPostById($post_id)
{
    global $db;
    $statement = $db->prepare("SELECT description_post from userposts WHERE id_post=:id_ofposts;");
    $statement->execute([
        'id_ofposts' => $post_id
    ]);
    $itemPost = $statement->fetch();
    return $itemPost;
}

// Function Delete element by using id of table posts.
function deletePost($id)
{
    global $db;
    $statement=$db->prepare("DELETE FROM userposts WHERE id_post=:id;");
    $statement->execute(
        [
            ':id'=>$id
        ]);
    return ($statement-> rowCount()==1);
}

// Function use to edit both image and description
function editPost($id_post, $description_post,$image)
{
    global $db;
    $statement = $db->prepare("UPDATE userposts SET description_post=:post_description,images=:myimg WHERE id_post=:postID");
    $statement->execute([
        ':post_description'=> $description_post,
        ':postID'=> $id_post,
        ':myimg'=>$image
        
    ]);
    return $statement->rowCount() == 1;
}

// Function use to edit only description
function editPosts($id_post, $description_post)
{
    global $db;
    $statement = $db->prepare("UPDATE userposts SET description_post=:post_description WHERE id_post=:postID");
    $statement->execute([
        ':post_description'=> $description_post,
        ':postID'=> $id_post,
    ]);
    return $statement->rowCount() == 1;
}

// add user
function adduser($user_name,$user_gender,$user_birth,$user_email,$user_password)
{
    global $db;
    $statement=$db->prepare("INSERT INTO users (name,gender_gender,dateofbirth_user,email_user,password_user) VALUES (:name_user,:gender,:birth,:email_user,:password_user)");
    $statement->execute([
        ':name_user'=>$user_name,
        ':gender'=>$user_gender,
        ':birth'=>$user_birth,
        ':email_user'=>$user_email,
        ':password_user'=>$user_password
    ]);
    return ($statement->rowCount()==1);
}

// selete user form table users
function getUsers()
{
    global $db;
    $statement = $db->prepare("SELECT id_user, name, password_user FROM users ORDER BY id_user DESC;");
    $statement->execute();
    $postItems = $statement->fetchAll();
    return $postItems;
}

// selete the name of user from table users
function getUserName() {
    global $db;
    $statement = $db->prepare("SELECT users.name
    FROM users
    JOIN userposts ON userposts.id_user = users.id_user");
    $statement->execute();
    $userName = $statement->fetch();
    return $userName;

}

// like post--------------
function like_post($user_id, $post_id){
    global $db;
    $statement = $db->prepare("INSERT INTO likes (id_user,id_post) VALUES (:userId, :postID);");
    $statement->execute([
        ':userId'=>$user_id,
        ':postID'=>$post_id
    ]);

    return ($statement->rowCount()==1);
};

// get like
function get_like(){
    global $db;
    $statement = $db->query("SELECT * FROM likes");

    return ($statement->fetchAll()) ;
};

// insert comment to db
function comment_post($user_id,$post_id,$comment_user){
    global $db;
    $statement = $db->prepare("INSERT INTO comments (id_user,id_post,comment) VALUES (:userId, :postID, :comment);");
    $statement->execute([
        ':userId'=>$user_id,
        ':postID'=>$post_id,
        ':comment' =>$comment_user
    ]);

    return ($statement->rowCount()==1);
};

// get comment from db
function get_comment(){
    global $db;
    $statement = $db->query("SELECT * FROM comments");

    return ($statement->fetchAll()) ;
};

// delete commemt from user post
// Function Delete element by using id of table posts.
function deleteComment($com_id,$post_id)
{
    global $db;
    $statement=$db->prepare("DELETE FROM comments WHERE id_post=:id_post AND id_comment=:id_com;");
    $statement->execute(
        [
            ':id_post'=>$post_id,
            'id_com'=>$com_id

        ]);
    return ($statement-> rowCount()==1);
}


//select name of friends from table friend
function getFriend()
{
    global $db;
    $statement = $db->prepare("SELECT id_fri, name_fri,id_user FROM friends ORDER BY id_fri DESC;");
    $statement->execute();
    $postItems = $statement->fetchAll();
    return $postItems;
}


// Unfriend from my friends list.
function deleteFriend($id)
{
    global $db;
    $statement=$db->prepare("DELETE FROM friends WHERE id_fri=:id;");
    $statement->execute(
        [
            ':id'=>$id
        ]);
    return ($statement-> rowCount()==1);
}



