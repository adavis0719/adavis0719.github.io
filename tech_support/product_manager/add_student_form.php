<?php
require_once('database.php');
$query = 'SELECT *
          FROM classRoster
          ORDER BY Name';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Auburn University at Montgomery</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Class Roster</h1></header>

    <main>
        <h1>Add Student</h1>
        <form action="add_student.php" method="post"
              id="add_student_form">
            
            <label>Name:</label>
            <input type="text" name="Name"><br>
            
            <label>Student ID:</label>
            <input type="text" name="studentID"><br>

            <label>Grade:</label>
            <input type="text" name="Grade"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Student"><br>
        </form>
        <p><a href="roster.php">View Class Roster</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Auburn University at Montgomery</p>
    </footer>
</body>
</html>