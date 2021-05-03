<?php
require('database.php');
// Get name
if (!isset($name)) {
    $name = filter_input(INPUT_GET, 'Name', 
            FILTER_VALIDATE_INT);
    if ($name == NULL || $name == FALSE) {
        $name = 1;
    }
}
// Get name for selected course
$queryclassroster = 'SELECT * FROM `classroster` 
        ORDER BY `classroster`.`Name`';
$statement1 = $db->prepare($queryclassroster);
$statement1->bindValue(':Name', $name);
$statement1->execute();
$classroster = $statement1->fetch();
$name = $classroster['Name'];
$statement1->closeCursor();

// Get all courses
$query = 'SELECT * FROM `classroster` ORDER BY `Name`.`studentID`';
$statement = $db->prepare($query);
$statement->execute();
$classroster = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>Auburn University at Montgomery</title>
    
    <link rel="stylesheet" type="text/css" href="../main.css" />
</head>
<h1>Auburn University at Montgomery</h1>
<h2>Class Roster</h2>

<!-- the body section -->
<body>
<?php
$username = "mgs_user";
$password = "pa55word";
$database = "student_registration";
$mysqli = new mysqli("localhost", $username, $password, $database);
$query = "SELECT * FROM classroster";

echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">Student Name</font> </td> 
          <td> <font face="Arial">Student ID</font> </td> 
          <td> <font face="Arial">Grade</font> </td>
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $name = $row["Name"];
        $studentID = $row["studentID"];
        $grade = $row["Grade"];
        echo '<tr> 
                  <td>'.$name.'</td> 
                  <td>'.$studentID.'</td> 
                  <td>'.$grade.'</td>              
              </tr>';
    }
    $result->free();
} 
?>
    <p><a href="index.php">Home</a></p>  
</body>
</html>