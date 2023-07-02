<html>

<head>
	<title>Delete Bicycle</title>
	<link rel="stylesheet" href="BikeDel.css">
</head>

<body>
	<div class="container" style="max-width: 1400px;">
		<nav>
			<div class="logo">
				<img src="img/Group 311.svg" class="logo">
			</div>
			<h4 class="webname">NU BICYCLE</h4>
			<ul>
				<li><a href="Homepage.php">HOME</a></li>
				<li><a href="About.php">ABOUT</a></li>
				<!-- <li><a href="Profile.php">PROFILE</a></li> -->
			</ul>
			<div class="nav-btn" style="width: 110px;">
				<img src="img/carbon_login.svg">
				<a href="logout.php" class="logout">Log Out</a>
			</div>
		</nav>
		<br><br>
		<?php
		ini_set('display_errors', 1);
		error_reporting(~0);
		include 'connectdb.php';
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$BikeID = $_GET["BikeID"];
		$sql = "DELETE FROM bicycle WHERE BikeID = '" . $BikeID . "' ";
		$query = mysqli_query($conn, $sql);

		if (mysqli_affected_rows($conn)) {
			echo "ลบข้อมูลจักรยานสำเร็จ";
		}
		mysqli_close($conn);
		?>
		<br> <br>
		<div class="form-button">
			<button type="button" style="width: 220px;"><a href="BikeDelList.php"> ย้อนกลับไปหน้าลบ </a></button> &nbsp;
			&nbsp;
			<button type="button" style="width: 220px;"><a href="Bicycle.php">ย้อนกลับไปหน้าข้อมูลรถจักรยาน</a></button>
		</div>
	</div>
</body>

</html>