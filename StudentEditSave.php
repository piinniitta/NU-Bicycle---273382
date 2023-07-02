<html>

<head>
	<title>Edit</title>
</head>

<body>
	<?php
	ini_set('display_errors', 1);
	error_reporting(~0);
	$serverName = "localhost";
	$userName = "root";
	$userPassword = "12345678";
	$dbName = "mybike";
	$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);
	$sql = "UPDATE student SET
		Name = '" . $_POST["txtName"] . "' ,
		Faculty = '" . $_POST["txtFaculty"] . "' ,
		Branch = '" . $_POST["txtBranch"] . "' ,
		Email = '" . $_POST["txtEmail"] . "' ,
		Phonenumber = '" . $_POST["txtPhonenumber"] . "'
		WHERE StudentID = '" . $_POST["txtStudentID"] . "' ";
	$query = mysqli_query($conn, $sql);
	if ($query) {
		header("Location: Homepage.php");
	}
	mysqli_close($conn);
	?>
</body>

</html>