<html>

<head>
    <title>Bicycle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Bicycle.css">
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
                <!-- <li><a href="Profile.php">PROFILE</a></li> -->
            </ul>
            <div class="nav-btn" style="width: 110px;">
                <img src="img/carbon_login.svg">
                <a href="logout.php" class="logout">Log Out</a>
            </div>
        </nav>
        <br> <br>
        <form name="frmSearch" method="get" action="<?= $_SERVER['SCRIPT_NAME']; ?>"> <br> <br> <br>
            <h2>ข้อมูลรถจักรยาน</h2> <br>
            <table width="600" ,border="1">
                <tr>
                    <th>ค้นหาข้อมูลจักรยาน:
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

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL:" . mysqli_connect_error();
            die();
        }
        $total_pages_sql = "SELECT COUNT(*) 
                FROM bicycle WHERE (BikeID LIKE '%" . $_GET["txtKeyword"] . "%' or Status LIKE '%" . $_GET["txtKeyword"] . "%' )";
        $result = mysqli_query($conn, $total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT *
                FROM bicycle 
                WHERE (BikeID LIKE '%" . $_GET["txtKeyword"] . "%' or Status LIKE '%" . $_GET["txtKeyword"] . "%' )LIMIT $offset, $no_of_records_per_page";

        $sqlnumbike = "SELECT bicycle.BikeID , bicycle.Status ,bike_brand.Brand , bike_brand.Color FROM bike_brand INNER JOIN bicycle ON bike_brand.NumberBike = bicycle.NumberBike";


        $res_data = mysqli_query($conn, $sql);
        $res_numbike = mysqli_query($conn, $sqlnumbike);
        echo "<table class=table table-bordered>";
        echo "<tr><th>รหัสจักรยาน</th>";

        echo "<th>ยี่ห้อจักรยาน</th>";
        echo "<th>สีจักรยาน</th>";
        echo "<th>สถานะ</th></tr>";
        while ($row = mysqli_fetch_array($res_data) and $rownumbike = mysqli_fetch_array($res_numbike)) {
            //here goes the data
            echo "<tr><td>" . $row["BikeID"] . "</td><td>" . $rownumbike["Brand"] . "</td><td>" . $rownumbike["Color"] . "</td><td>" . $row["Status"] . "</td></tr>";
        }
        mysqli_close($conn);
        echo "</table>";
        ?>

        <center>
            <button class="add-del" type="button" style="width: 80px;"><a
                    href="BikeAddForm.php">เพิ่มจักรยาน</a></button> &nbsp; &nbsp;
            <button class="add-del" type="button" style="width: 80px;"><a href="BikeDelList.php">ลบจักรยาน</a></button>
        </center>

        <center><br>
            <?php echo "Page: " . $pageno . "/" . $total_pages . "<br>"; ?>
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
        <button class="back" type="button"><a class="back-a" href="Homepage.php"
                style="color: #fff; text-decoration: none;">ย้อนกลับ</a></button>
    </div> <br> <br>
</body>

</html>