<?php
$errors ="";
$db = mysqli_connect('localhost', 'root', '', 'todos');
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    if(empty($username)){
        $errors = "username is incorrect";
    }else {
        mysqli_query($db, "INSERT INTO sign (username) VALUES ('$username')");
        header('location: sign.php');
    }

    if(empty($email)){
        $errors = "email is incorrect";
    }else {
        mysqli_query($db, "INSERT INTO sign (email) VALUES ('$email')");
        header('location: sign.php');
    }
    if(empty($password)){
        $errors = "password is incorrect";
    }else {
        mysqli_query($db, "INSERT INTO sign (password) VALUES ('$password')");
        header('location: sign.php');
    }
}
$sign = mysqli_query($db, 'SELECT * FROM sign')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="sign.css">
    <title>Sign</title>
</head>
<body>
    <form method="POST" action="sign.php">
    <?php if(isset($errors)){ ?>
         <P><?Php echo $errors; ?></P>
        <?php }?>
    <div class="sign">
         <input type="text" name="username" class="username_input" placeholder="username"><br>
         <input type="email" name="email" class="email_input" placeholder="email"><br>
         <input class="password" type="password" class="password_input" name="password" placeholder="password"><br>
         <button type="submit" class="send_btn" name="submit">Send</button>
    </div>
    </form>
</body>
</html>