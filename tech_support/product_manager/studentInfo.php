<?php
require('database.php');
// Get name
if (!isset($name)) {
    $studentname = filter_input(INPUT_GET, 'name', 
            FILTER_VALIDATE_INT);
    if ($studentname == NULL || $studentname == FALSE) {
        $studentname = 1;
    }
}
// Get name for selected course
$querystudent_information = 'SELECT * FROM `student_information` 
        ORDER BY `student_information`.`name`';
$statement1 = $db->prepare($querystudent_information);
$statement1->bindValue(':name', $studentname);
$statement1->execute();
$student_information = $statement1->fetch();
$studentname = $student_information['name'];
$statement1->closeCursor();

// Get all courses
$query = 'SELECT * FROM `student_information` ORDER BY `name`.`birthday`';
$statement = $db->prepare($query);
$statement->execute();
$student_information = $statement->fetchAll();
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
<h2>Student Information</h2>

<!-- the body section -->
<body>
<?php
$username = "mgs_user";
$password = "pa55word";
$database = "student_registration";
$mysqli = new mysqli("localhost", $username, $password, $database);
$query = "SELECT * FROM student_information";

echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">Student Name</font> </td> 
          <td> <font face="Arial">Birthday</font> </td> 
          <td> <font face="Arial">Gender</font> </td>
          <td> <font face="Arial">Email</font> </td>

      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $studentname = $row["name"];
        $birthday = $row["birthday"];
        $gender = $row["gender"];
        $email = $row["email"];
        echo '<tr> 
                  <td>'.$studentname.'</td> 
                  <td>'.$birthday.'</td> 
                  <td>'.$gender.'</td> 
                  <td>'.$email.'</td>    
              </tr>';
    }
    $result->free();
} 
?>
    <p><a href="index.php">Home</a></p>  
</body>
</html>