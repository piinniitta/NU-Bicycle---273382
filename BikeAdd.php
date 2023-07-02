<html>

<head>
    <title>Add Bicycle</title>
    <link rel="stylesheet" href="BikeAdd.css">
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
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM bicycle WHERE BikeID = '" . $_POST["txtBikeID"] . "' ";
        $objQuery = mysqli_query($conn, $sql);
        $objResult = mysqli_fetch_array($objQuery);
        if ($objResult) {
            echo "ข้อมูลจักรยานคันนี้มีอยู่แล้ว";
        } else {
            $sql = "INSERT INTO bicycle (BikeID, Status,NumberBike, Amount )
                VALUES ('" . $_POST["txtBikeID"] . "','" . $_POST["txtStatus"] . "','" . $_POST["txtNumBike"] . "','" . $_POST["txtAmount"] . "') ";
            if (mysqli_query($conn, $sql)) {
                echo "บันทึกข้อมูลจักรยานสำเร็จ";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
        ?>
        <br> <br>
        <div class="form-button">
            <button type="button" style="width: 220px;"><a href="BikeAddForm.php"> ย้อนกลับไปหน้าฟอร์ม </a></button>
            &nbsp; &nbsp;
            <button type="button" style="width: 220px;"><a href="Bicycle.php">ย้อนกลับไปหน้าข้อมูลรถจักรยาน</a></button>
        </div>
    </div>
</body>

</html>