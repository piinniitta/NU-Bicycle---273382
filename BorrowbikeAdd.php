<html>

<head>
  <title>Add Bicycle</title>
  <link rel="stylesheet" href="ReturnBikeFrom.css">
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
    include 'connectdb.php';
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "INSERT INTO audit ( BikeID,StudentID,BorrowDate,Status)
              VALUES ('" . $_POST["txtBikeID"] . "','" . $_POST["txtStudentID"] . "','" . $_POST["txtBorrowDate"] . "','" . $_POST["txtStatus"] . "') ";

    $sqlbike = "UPDATE bicycle SET
              Status ='" . $_POST["txtStatusbike"] . "',
              Amount ='" . $_POST["txtAmount"] . "' 
              WHERE BikeID = '" . $_POST["txtBikeID"] . "'";


    if (mysqli_query($conn, $sql) and mysqli_query($conn, $sqlbike)) {
      header("Location: Show.php");
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      echo "Error: " . $sqlbike . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
    ?>

    <br> <br>
    <!--<div class="form-button">
                <button type="button" ><a href="Show.php"> Yes </a></button> &nbsp; 
                <button type="button" ><a href="BorrowBikeFrom.php">No</a></button>
              </div>-->
  </div>
</body>

</html>