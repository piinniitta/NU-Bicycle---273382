<?php 
    session_start();
    include('connectdb.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Home.css">
</head>
<body>
    <header>
        <div class="container">
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
                <div class="nav-btn">
                    <img src="img/carbon_login.svg">
                    <a href="logout.php" class="logout">Log Out</a>
                </div>
            </nav>

            <section class="header-info">
                <div class="content">
                    <div class="borrow-return">
                        <div class="upper-card">
                            <div class="card">
                                <div class="textBox">
                                    <?php if (isset($_SESSION['StudentID'])) : ?>
                                        <div class="header-title"> 
                                            <h4 class="name-user" style="color: #3C3A36;">
                                            Welcome, <strong><?php echo $_SESSION['Name']; ?></strong> </h4>
                                        </div>
                                    <?php endif ?>
                                </div>
                                <div class="card-face2">
                                    <div class="content-face">
                                        <h3>จำนวนจักรยานที่เหลืออยู่</h3> <br>
                                        <h1>50</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="face face1">
                                    <div class="content-face">
                                        <img src="img/bike (3).png" alt="" style="margin-left: 40px;">
                                        <h3>ตรวจสอบสถานะรถจักรยาน</h3>
                                    </div>
                                </div>
                                <div class="face face2">
                                    <div class="content-face">
                                        <p style="text-align: start;">เป็นการตรวจสอบว่ามีจักรยานอยู่ในคลังหรือไม่ โดยการค้นหาหรือตรวจเช็คสถานะรถจักรยาน และสามารถเพิ่มและลบจักรยานได้
                                        </p>
                                        <a href="Bicycle.php">Click</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="face face1">
                                    <div class="content-face2">
                                        <img src="img/exchange (1).png" alt="" style="margin-left: 40px;">
                                        <h3>ข้อมูลการยืม-คืนรถจักรยาน</h3>
                                    </div>
                                </div>
                                <div class="face face2">
                                    <div class="content-face">
                                        <p style="text-align: start;">เป็นการตรวจเช็คการยืมและการคืนรถจักรยาน
                                        </p>
                                        <a href="Show.php">Click</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lower-card" style="margin-top: 10px;">
                            <div class="borrow-box">
                                <div class="borrow-bg"></div>
                                <div class="borrow-button">
                                    <h3>ยืมจักรยาน</h3> <br>
                                    <li><a href="BorrowBikeFrom.php">BORROW</a></li>
                                </div>
                            </div>
                            <div class="return-box">
                                <div class="return-bg"></div>
                                <div class="return-button">
                                    <h3>คืนรถจักรยาน</h3> <br>
                                    <li><a href="AuditShow.php">RETURN</a></li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ProfileBox">
                        <div class="cover"></div>
                        <div class="upper-part">
                            <div class="upper">
                                <div class="circle">
                                    <div class="circle-pic"></div>
                                </div>
                                <div class="edit">
                                    <ul>
                                        <a href="StudentList.php" class="button button-1" style="text-decoration:none">EDIT</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="UserInfo">
                            <div class="UserInfoBox">
                                <div class="UserInfoBox-Inner">
                                    <?php if (isset($_SESSION['StudentID'])) : ?>
                                        <div class="Info">
                                            <h3 class="topic">Student ID</h3>
                                            <h3 class="detail"> <strong><?php echo $_SESSION['StudentID']; ?></strong></h3>
                                        </div>
                                    <?php endif ?>
                                   
                                    <?php if (isset($_SESSION['StudentID'])) : ?>
                                        <div class="Info">
                                            <h3 class="topic">Name </h3>
                                            <h3 class="detail"> <strong><?php echo $_SESSION['Name']; ?></strong></h3>
                                        </div>
                                    <?php endif ?>

                                    <?php if (isset($_SESSION['StudentID'])) : ?>
                                        <div class="Info">
                                            <h3 class="topic">Faculty </h3>
                                            <h3 class="detail"> <strong><?php echo $_SESSION['Faculty']; ?></strong></h3>
                                        </div>
                                    <?php endif ?>
                                    
                                    <?php if (isset($_SESSION['StudentID'])) : ?>
                                        <div class="Info">
                                            <h3 class="topic">Branch </h3>
                                            <h3 class="detail"> <strong><?php echo $_SESSION['Branch']; ?></strong></h3>
                                        </div>
                                    <?php endif ?>

                                    <?php if (isset($_SESSION['StudentID'])) : ?>
                                        <div class="Info">
                                            <h3 class="topic">Email </h3>
                                            <h3 class="detail"> <strong><?php echo $_SESSION['Email']; ?></strong></h3>
                                        </div>
                                    <?php endif ?>

                                    <?php if (isset($_SESSION['StudentID'])) : ?>
                                        <div class="Info">
                                            <h3 class="topic">Phone Number </h3>
                                            <h3 class="detail"> <strong><?php echo $_SESSION['Phonenumber']; ?></strong></h3>
                                        </div>
                                    <?php endif ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </header>
</body>
</html>