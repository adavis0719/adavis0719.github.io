<?php
// Get the student data
$name = filter_input(INPUT_POST, 'Name');
$studentID = filter_input(INPUT_POST, 'studentID');
$grade = filter_input(INPUT_POST, 'Grade');

// Validate inputs
if ($name == null ||
        $studentID == null || $grade == null) {
    $error = "Invalid student data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database  
    $query = 'INSERT INTO classroster
                 (Name, studentID, Grade)
              VALUES
                 (:Name, :studentID, :Grade)';
    $statement = $db->prepare($query);
    $statement->bindValue(':Name', $name);
    $statement->bindValue(':studentID', $studentID);
    $statement->bindValue(':Grade', $grade);
   
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('roster.php');
}
?>