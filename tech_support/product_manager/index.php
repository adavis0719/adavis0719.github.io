<?php 
require('../model/database.php');
// Get name
if (!isset($course)) {
    $course = filter_input(INPUT_GET, 'course', 
            FILTER_VALIDATE_INT);
    if ($course == NULL || $course == FALSE) {
        $course= 1;
    }
}
// Get studentID for selected name
$queryClasses = 'SELECT * FROM `courses` 
        ORDER BY `courses`.`course`';
$statement1 = $db->prepare($queryClasses);
$statement1->bindValue(':course', $course);
$statement1->execute();
$courses = $statement1->fetch();
$name = $courses['course'];
$statement1->closeCursor();

// Get all classes
$query = 'SELECT * FROM `courses` ORDER BY `course`.`courseName`';
$statement = $db->prepare($query);
$statement->execute();
$courses = $statement->fetchAll();
$statement->closeCursor();
   ?>     
        
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>Auburn University at Montgomery</title>
    
    <link rel="stylesheet" type="text/css" href="../main.css" />
</head>

<!-- the body section -->
<body>

<main>
    <h1>Computer Science Courses</h1>
    <p>Due to COVID 19 we are only having 1 Computer Science class for Graduate Students. We apologize for the inconvenience. If all students get vaccinated then we will offer more classes. STAY SAFE!!!</p>   
    <h2>Course</h2>

    <aside>
        <!-- display a list of categories -->
        
        <nav>
        <ul>
     
            <li><a href=".?courseID=<?php echo $semester['courseID']; ?>">
                    
                </a>
            </li>
            
        </ul>
        </nav>          
    </aside>

    <section>
        <!-- display a table of course-->
<body>
<?php
$username = "mgs_user";
$password = "pa55word";
$database = "student_registration";
$mysqli = new mysqli("localhost", $username, $password, $database);
$query = "SELECT * FROM courses";

echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">course</font> </td> 
          <td> <font face="Arial">courseName</font> </td> 
          <td> <font face="Arial">semester</font> </td>
          <td> <font face="Arial">instructor</font> </td>
          <td> <font face="Arial">classroom</font> </td>
          <td> <font face="Arial">time</font> </td>
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $course = $row["course"];
        $courseName = $row["courseName"];
        $semester = $row["semester"];
        $instructor = $row["instructor"];
        $classroom = $row["classroom"];
        $time = $row["time"];
        echo '<tr> 
                  <td>'.$course.'</td> 
                  <td>'.$courseName.'</td> 
                  <td>'.$semester.'</td>   
                  <td>'.$instructor.'</td> 
                  <td>'.$classroom.'</td> 
                  <td>'.$time.'</td> 
              </tr>';
    }
    $result->free();
} 
?>
    <p><a href="roster.php">Course Roster</a></p>  
    <p><a href="add_student_form.php">Add Student</a></p> 
    <p><a href="../index.php">Exit</a></p>
     
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Auburn University at Montgomery</p>
</footer>
</body>
</html>​
