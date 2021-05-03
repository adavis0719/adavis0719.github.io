<?php
require_once('database.php');
$query = 'SELECT *
          FROM student_information
          ORDER BY name';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Auburn University at Montgomery</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <main>
        <h1>Student Information</h1>
        <form action="add_student_info.php" method="post" id ="add_student_info_form">
        
            <label for="name">Student Name:</label>
            <input type="text" name="name" ><br>
    
            <label for="birthday">Birthday:</label>
            <input type="text" name="birthday"><br>
    
            <label for="gender">Gender:</label>
            <input type="text" name="gender"><br>
    
            <label for="email">Email:</label>
            <input type="text" name="email"><br>
       
    <label>&nbsp;</label>
    <input type="submit" value = "Add Info"><br>
    </form>
            <p><a href="studentInfo.php">List Of Student's Information</a></p>
    </main>
</body>
</html>