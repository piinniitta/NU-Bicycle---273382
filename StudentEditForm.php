<html>

<head>
  <title>Student Edit Form</title>
  <link rel="stylesheet" href="StudentEditForm.css">
</head>

<body>
  <div class="container">
    <nav>
      <div class="logo">
        <img src="img/Group 311.svg" class="logo">
      </div>
      <h4 class="webname">NU BICYCLE</h4>
      <ul>
        <li><a href="Homepage.php">HOME</a></li>
        <li><a href="About.php">ABOUT</a></li>
      </ul>
      <div class="nav-btn" style="width: 110px;">
        <img src="img/carbon_login.svg">
        <a href="logout.php" class="logout">Log Out</a>
      </div>
    </nav>
    <br> <br>
    <?php
    ini_set('display_errors', 1);
    error_reporting(~0);
    if (isset($_GET["StudentID"])) {
      $StudentID = $_GET["StudentID"];
    }
    include('connectdb.php');
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM student WHERE StudentID = '" . $StudentID . "' ";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
    ?>

    <form action="StudentEditSave.php" name="frmAdd" method="post">
      <div class="form-box">
        <H2 style="text-align: center; margin-top: 20px;">Edit Form</H2>
        <div class="form-box-again">
          <div class="form-input-box">
            <h3>StudentID</h3>
            <input class="form-input" type="hidden" name="txtStudentID" value="<?php echo $result["StudentID"]; ?>">
            <?php echo $result["StudentID"]; ?></td>
          </div>

          <div class="form-input-box">
            <h3>Name</h3>
            <input class="form-input" type="text" name="txtName" value="<?php echo $result["Name"]; ?>">
          </div>

          <div class="form-input-box">
            <h3>Faculty</h3>
            <input class="form-input" type="text" name="txtFaculty" value="<?php echo $result["Faculty"]; ?>">
          </div>

          <div class="form-input-box">
            <h3>Branch</h3>
            <input class="form-input" type="text" name="txtBranch" value="<?php echo $result["Branch"]; ?>">
          </div>

          <div class="form-input-box">
            <h3>Email</h3>
            <input class="form-input" type="text" name="txtEmail" value="<?php echo $result["Email"]; ?>">
          </div>

          <div class="form-input-box">
            <h3>Phonenumber</h3>
            <input class="form-input" type="text" name="txtPhonenumber" value="<?php echo $result["Phonenumber"]; ?>">
          </div>
        </div>

        <br> <br>
        <div class="form-button">
          <input type="submit" name="submit" value="SUBMIT"> &nbsp;
          <button type="reset" name="reset" value="Cancel"><a href="StudentList.php">CANCLE</a></button>
        </div>
      </div>
    </form>
    <?php
    mysqli_close($conn);
    ?>
  </div>
</body>

</html>