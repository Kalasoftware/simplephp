<?php
session_start();
include("con.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $code = $_POST['capcod'];

        $val_user = val_field('user', $user);
        $val_pass = val_field('pass', $pass);

        if ($_SESSION['capcode'] == $code ) {
            if($val_user && $val_pass)
            {
                if (check_user($user, $pass)) { // Pass raw user input for checking
                    $_SESSION['loginYes'] = true; // Set session variable to indicate successful login
                    header('Location: admin.php');
                    exit; // Ensure no further code execution after redirect
                } else {
                    echo "<script>alert('Wrong credentials');</script>";
                }
            }
            else
            {
                echo "<script>alert('captcha is right , but credentials are wrong');</script>";
            }
            
        } else {
            echo "<script>alert('Invalid input or captcha');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>  
    <form action="" method="post">
        Enter the username: <input name="user" required>
        <br>
        Enter the password: <input type="password" name="pass" required>
        <br>
        <img src="captcha.php" alt="captcha">
        <input name="capcod" required> <br>
        <button name="submit">Login</button>
    </form>
</body>
</html>
