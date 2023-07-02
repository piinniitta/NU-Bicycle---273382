<?php
session_start();
include('connectdb.php');

$sql = "SELECT * FROM student WHERE StudentID = '" . $_POST["txtStudentID"] . "' ";
$objQuery = mysqli_query($conn, $sql);
$objResult = mysqli_fetch_array($objQuery);


if ($objResult) {
    echo "StudentID already exist.";
} else {
    $sql = "INSERT INTO student (StudentID, Name, Faculty, Branch, Email, Phonenumber,user_password)
        VALUES ('" . $_POST["txtStudentID"] . "','" . $_POST["txtName"] . "','" . $_POST["txtFaculty"] . "','" . $_POST["txtBranch"] . "','" . $_POST["txtEmail"] . "','" . $_POST["txtPhonenumber"] . "','" . $_POST["txtPassword"] . "') ";

    if (mysqli_query($conn, $sql)) {
        header("Location: signUp.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>