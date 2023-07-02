<?php
session_start();
include('connectdb.php');

$user = $_POST['username'];
$pwd = $_POST['password'];

$sql = "SELECT * FROM student where (StudentID='" . $user;
$sql .= "' and user_password='" . $pwd . "')";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);
$_SESSION['StudentID'] = $row["StudentID"];
$_SESSION['Name'] = $row["Name"];
$_SESSION['Faculty'] = $row["Faculty"];
$_SESSION['Branch'] = $row["Branch"];
$_SESSION['Email'] = $row["Email"];
$_SESSION['Phonenumber'] = $row["Phonenumber"];

if (mysqli_num_rows($result) == 1) {
  // Session
  $_SESSION['user'] = $user;
  header("Location: Homepage.php");
} else {
  session_unset();
  header("Location: signUp.php");
}
mysqli_close($conn);
?>