<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

</head>
<body>
    <!-- home  -->
    <?php 
    require_once("models/post.php");
        $userItems = getUsers();
    ?>
    <div class="contener1">
        <div class="text">
            <h1 class="nameOfapp">
                Facebook
            </h1>
            <h4 class="inforDetail">
                 Facebook create by students Group8 in PNC will helps you connect and share with the people in your life.
            </h4>
            <img src="images/bg.png" alt="" class="bg_first">
        </div>
      

        <form class="formLoginIn" action="../index.php" method="post">
        <input type="hidden" value='' >

            <div>
                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
            </div>
            <div>
                
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
            </div>

            <button type="submit" class="btn-primary form-control">Login in</button>
            <p class="para">
                <a href="" class="forgot_pass">forgot password</a>
            </p>
            <p class="para">
            <a href="../views/create_acc.php" class="createAcc">Create new account</a>

            </p>
        </form>
    </div>
    <?php
// loop on db user to get the element from it
        foreach($userItems as $user) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // user form db
                $userName = $user['name'];
                // password from db
                $userPass = $user['password_user'];
                // id from db
                $userId = $user['id_user'];
                
                // user name from input
                $name = $_POST['username'];
                // password from input
                $password = $_POST['pswd'];
    
                if (!empty($name) and !empty($password) and $name == $userName) {
                    $test = password_hash($password,PASSWORD_DEFAULT);
                    // commpare the name and password from user input with name and user from db
                    if(password_verify($userPass, $test)) {
                    //   set name and id in session
                        $_SESSION['id'] = $userId ;
                        $_SESSION['name'] = $name;
                        header('Location: home.php');
                    }
                } 
                

            }
        }
    ?>

</body>
</html>