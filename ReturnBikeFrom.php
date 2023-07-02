<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ReturnBikeFrom.css">
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
                    <!-- <li><a href="Profile.php">PROFILE</a></li> -->
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

            if (isset($_GET["BikeID"])) {
                $BikeID = $_GET["BikeID"];
            }

            include 'connectdb.php';
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            $sql = "SELECT * FROM audit WHERE BikeID = '" . $BikeID . "'";

            $sqlst = "SELECT student.Name , audit.BIkeID , audit.ReturnDate , audit.Status 
                FROM audit
                INNER JOIN student 
                ON audit.StudentID = student.StudentID";

            $query = mysqli_query($conn, $sql);
            $queryst = mysqli_query($conn, $sqlst);
            $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
            $result_student = mysqli_fetch_array($queryst, MYSQLI_ASSOC);
            ?>

            <form action="ReturnBikeAdd.php" name="frmAdd" method="post">
                <div class="form-box">
                    <H2 style="text-align: center; margin-top: 20px;">Return Form</H2>
                    <div class="form-box-again">
                        <div class="form-input-box">
                            <h3>Student ID</h3>
                            <input class="form-input" type="hidden" name="txtStudentID"
                                value="<?php echo $result["StudentID"]; ?>"><?php echo $result["StudentID"]; ?>
                        </div>

                        <div class="form-input-box">
                            <h3>Bike ID</h3>
                            <input class="form-input" type="hidden" name="txtBikeID" size="20"
                                value="<?php echo $result["BikeID"]; ?>"><?php echo $result["BikeID"]; ?>
                        </div>

                        <div class="form-input-box">
                            <h3>Return Date</h3>
                            <input class="form-input" type="date" name="txtReturnDate">
                        </div>

                        <div class="form-input-box">
                            <h3>Status</h3>
                            <input class="form-input" type='hidden' name="txtStatus" value="Return">Return</input>
                            <input class="form-input" type='hidden' name="txtStatusbike" value="In Stock"></input>
                            <input class="form-input" type='hidden' name="txtAmount" value="1"></input>
                        </div>

                    </div>
                    <br> <br> <br>
                    <div class="form-button">
                        <input type="submit" name="submit" value="SUBMIT"> &nbsp;
                        <button type="reset" name="reset" value="Cancel"><a href="AuditShow.php">CANCLE</a></button>
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