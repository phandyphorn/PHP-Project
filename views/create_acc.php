<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 15px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
h1{
    text-align: center;
    flex: 1rem;
    color:#245EA1;
    font-size: 1.5rem;
    margin-top: -0.5rem;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
.sign_up{
    width: 42%;
    margin: auto;
    background: #E5E2E2;
    margin-top: 1rem;
    box-shadow: 0 0.5rem 1rem black;
    border-radius:10px;
}
.clearfix a{
    text-decoration: none;
    color:#fff;
}
.gender{
    display: flex;
    margin: 0.5rem;
}
p{
    text-align: center;
    font-size: 1.1rem;
    margin-top: -0.5rem;
    margin-bottom: -0.5rem;
}
</style>
<body>

<form action="../controllers/create_user.php" style="border:1px solid #ccc" class="sign_up"  method="post">
  <div class="container">
    <h1>SIGN UP</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="psw-repeat"><b>User name</b></label>
    <input type="text" placeholder="Username" name="usernames" required>
    <label for="gender"><b>Gender</b></label>
    <div class="gender">
        <div>
            <input type="radio" id="html" value="F" checked name="gender">
            <label for="html">Female</label><br>
        </div>
        <div>
            <input type="radio" id="css" value="M" name="gender">
            <label for="css">Male</label><br>
        </div>
          
    </div>
    <div>
      <label for="birthday"><b>Birthday:</b></label><br><br>
      <input type="date" id="birthday" name="birthday">

    </div>
    <br>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="emails" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psws" required>


    

    <div class="clearfix">
      <button type="button" class="cancelbtn"><a href="../index.php">Cancel</a> </button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>

</body>
</html>