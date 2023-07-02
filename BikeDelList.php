<html>

<head>
  <title>Bike Delete</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="BikeDelList.css">
</head>

<body>
  <div class="container1">
    <nav>
      <div class="logo">
        <img src="img/Group 311.svg" class="logo">
      </div>
      <h4 class="webname">NU BICYCLE</h4>
      <ul>
        <li><a href="Homepage.php">HOME</a></li> &nbsp; &nbsp;
        <li><a href="About.php">ABOUT</a></li>
      </ul>
      <div class="nav-btn" style="width: 110px;">
        <img src="img/carbon_login.svg">
        <a href="logout.php" class="logout">Log Out</a>
      </div>
    </nav>
    <br> <br>
    <form name="frmSearch" method="get" action="<?= $_SERVER['SCRIPT_NAME']; ?>"> <br> <br> <br>
      <h2>Delete Bicycle</h2> <br>
      <table width="428.5" ,border="1" a>
        <tr>
          <th>Search :
            <input name="txtKeyword" type="text" id="txtKeyword" value="<?= $_GET["txtKeyword"]; ?>">
            <input
              style="height: 25px; width: 65px; background: #EB5757;  color: #fff; border-radius: 5px; border: #EB5757; font-size: 13px;"
              type="submit" value="Search">
            <input
              style="height: 25px; width: 65px; background: #EB5757;  color: #fff; border-radius: 5px; border: #EB5757; font-size: 13px;"
              type="reset" value="Reset">
          </th>
        </tr>
      </table>
    </form>
    <br>
    <?php
    include 'connectdb.php';
    if (isset($_GET['pageno'])) {
      $pageno = $_GET['pageno'];
    } else {
      $pageno = 1;
    }
    $no_of_records_per_page = 10; //จำนวนจักรยานที่โชว์ต่อ1หน้า
    $offset = ($pageno - 1) * $no_of_records_per_page;
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      die();
    }
    $total_pages_sql = "SELECT COUNT(*) FROM bicycle WHERE (BikeID LIKE '%" . $_GET["txtKeyword"] . "%' or Status LIKE '%" . $_GET["txtKeyword"] . "%' )";
    $result = mysqli_query($conn, $total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);
    $sql = "SELECT * FROM bicycle WHERE (BikeID LIKE '%" . $_GET["txtKeyword"] . "%' or Status LIKE '%" . $_GET["txtKeyword"] . "%' )  LIMIT $offset, $no_of_records_per_page ";
    $res_data = mysqli_query($conn, $sql);

    echo "<table class=table table-bordered>";
    echo "<tr><th>BikeID</th>";
    echo "<th>NumberBike</th>";
    echo "<th>Status</th>";
    echo "<th>Amount</th>";
    echo "<th>Delete</th></tr>";

    while ($row = mysqli_fetch_array($res_data)) {
      echo "<tr>
          <td>" . $row["BikeID"] . "</td>
          <td>" . $row["NumberBike"] . "</td>
          <td>" . $row["Status"] . "</td>
          <td>" . $row["Amount"] . "</td>
          <td><a href=BikeDel.php?BikeID=" . $row["BikeID"] . ">Delete</a> </td>
          </tr>";
    }
    mysqli_close($conn);
    echo "</table>";
    ?>
    <center>
      <br>
      <?php
      echo "Page: " . $pageno . "/" . $total_pages . "<br>";
      ?>
      <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if ($pageno <= 1) {
          echo 'disabled';
        } ?>">
          <a href="<?php if ($pageno <= 1) {
            echo '#';
          } else {
            echo "?pageno=" . ($pageno - 1);
          } ?>">Prev</a>
        </li>
        <li class="<?php if ($pageno >= $total_pages) {
          echo 'disabled';
        } ?>">
          <a href="<?php if ($pageno >= $total_pages) {
            echo '#';
          } else {
            echo "?pageno=" . ($pageno + 1);
          } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
      </ul>
    </center>
    <button class="back" type="button"><a class="back-a" href="Bicycle.php"
        style="color: #fff; text-decoration: none;">ย้อนกลับ</a></button>
  </div> <br> <br>
</body>

</html>