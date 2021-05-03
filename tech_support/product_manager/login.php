<?php
session_start();

$my_username = "finding";
$my_password = "nemo";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user_name = $_POST['username'];
    $password = $_POST['password'];
    
    if(($user_name === $my_username) and ($password === $my_password));
    {
        $_SESSION['username'] = $user_name;
        $_SESSION['password'] = $password;
        
        echo"<script>alert('Logged in successful!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset =" UTF-8">
        <meta name ="viewport" content =" "width="device-width, initial-scale=1.0">
        <title>
            Login Page
        </title>
    </head>
    <body>
        <form action="#" method ="POST">
             <table align="center" width="50%" cellspacing="10px">

        <caption>LOG IN</caption>

        <tr>

            <td>Username:</td>

            <td><input type="text" id="username" name="username" placeholder="Enter email / Id" required></td>

        </tr>

        <tr>
            <td>Password:</td>
            <td><input type="password" name="password" id="password" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <a href="index.php">
                    <input type="submit" value="LOG IN"></a>
            </td>
        </tr>
    </table>
        </form>
        <p>After your login is successful press the home link below.</p>
        <ul><a href="index.php">Home</a></ul>
    </body>   
</html>