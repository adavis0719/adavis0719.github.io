<?php
// Get the student data
$studentname = filter_input(INPUT_POST, 'name');
$birthday = filter_input(INPUT_POST, 'birthday');
$gender = filter_input(INPUT_POST, 'gender');
$email = filter_input(INPUT_POST, 'email');

// Validate inputs
if ($studentname == null || $birthday == null || $gender == null || $email == null) {
    $error = "Invalid student data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database  
    $query = 'INSERT INTO student_information
                 (name, birthday, gender, email)
              VALUES
                 (:name, :birthday, :gender, :email)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $studentname);
    $statement->bindValue(':birthday', $birthday);
    $statement->bindValue(':gender', $gender);
    $statement->bindValue(':email', $email);
   
    $statement->execute();
    $statement->closeCursor();

    include('studentInfo.php');
}
?>