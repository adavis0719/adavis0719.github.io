<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
        $user_name = "ts_user";
        $password = "pa55word";
        $database = "student_registration";
        $host_name = "localhost";

$con = mysqli_connect($host_name ,$user_name ,$password, $database);
        extract($_POST);
            if(isset($save))
{
    $sql=mysql_query("select email from studentdetails where email='$e'");
    $return=mysql_num_rows($sql);

    if($return)
{
    $msg="<font color='red'>".ucfirst($e)."already exists choose another email</font>";
}
    else
{
        $query="insert into studentdetails values('','$n','$e','$p','$m','$g','$h','$dob','$add','$img',now())";
        mysql_query($query);
        $msg= "<font color='blue'>Your data saved</font>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <main>
        <h1>Student Registration!</h1>
        <form action="." method="post">
        <input type="hidden" name="action" value="process_data">
        
	<label for="name">Student Name:</label>
    <input type="name" name="name" id="name" autofocus required><br>
    
    <label for="gender">Gender:</label>
    <input type="text" name="gender" id="gender" required><br>
    
    <label for="sid">Student ID#:</label>
    <input type="text" name="sid" id="sid" required><br>
    
            <label for="email">Email:</label>
    <input type="text" name="email" id="email" required><br>
    
            <label for="password">Password:</label>
    <input type="text" name="password" id="password" required><br>
    
            <label for="confirm">Confirm Password:</label>
    <input type="text" name="confirm" id="confirm" required><br>
    
        <input type="submit" name="button" id = "button" value = "Submit">
        </form>

</form>


    </main>
</body>
</html>