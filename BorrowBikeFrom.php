<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="BorrowBikeFrom.css">
</head>

<body>
  <header>
    <div class="container" style="max-width: 1400px;">
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
      include 'connectdb.php';

      $conn = mysqli_connect($servername, $username, $password, $dbname);
      $sql = "SELECT * FROM audit";
      $query = mysqli_query($conn, $sql);
      $result = mysqli_fetch_array($query, MYSQLI_ASSOC);


      $query = "SELECT * FROM bicycle ORDER BY BikeID asc" or die("Error:" . mysqli_error());

      $resultt = mysqli_query($conn, $query);

      ?>

      <form action="BorrowbikeAdd.php" name="frmAdd" method="post">
        <div class="form-box">
          <H2 style="text-align: center; margin-top: 20px;">Borrow Form</H2>
          <div class="form-box-again">
            <div class="form-input-box">
              <h3>StudentID</h3>
              <input class="form-input" type="text" name="txtStudentID">
            </div>

            <div class="form-input-box">
              <h3>Name</h3>
              <input class="form-input" type="text" name="txtName">
            </div>

            <div class="form-input-box">
              <h3>รหัสจักรยาน</h3>
              <select class="form-input" name="txtBikeID" required>
                <option value="">-Choose-</option>
                <?php foreach ($resultt as $results) { ?>
                  <option value="<?php echo $results["BikeID"]; ?>">
                    <?php echo $results["BikeID"]; ?>
                  </option>
                <?php } ?>
              </select>
            </div>

            <div class="form-input-box">
              <h3>วันที่ยืม</h3>
              <input class="form-input" type="date" name="txtBorrowDate">
            </div>

            <div class="form-input-box">
              <h3>สถานะ</h3>
              <input class="form-input" type='hidden' name="txtStatus" value="Borrow">Borrow</input>
              <input class="form-input" type='hidden' name="txtStatusbike" value="Out Stock"></input>
              <input class="form-input" type='hidden' name="txtAmount" value="0"></input>
            </div>
          </div>
          <br> <br> <br>
          <div class="form-button">
            <input type="submit" name="submit" value="SUBMIT"> &nbsp;
            <button type="reset" name="reset" value="Cancel"><a href="Homepage.php">CANCLE</a></button>
          </div>
        </div>
      </form>
      <?php
      mysqli_close($conn);
      ?>
    </div>
  </header>
</body>

</html>