<html>

<head>
  <title>Add Bicycle</title>
  <link rel="stylesheet" href="BikeAddForm.css">
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
      </ul>
      <div class="nav-btn" style="width: 110px;">
        <img src="img/carbon_login.svg">
        <a href="logout.php" class="logout">Log Out</a>
      </div>
    </nav>
    <br> <br>
    <center>

      <form action="BikeAdd.php" name="frmAdd" method="post">
        <div class="form-box">
          <H2 style="text-align: center; margin-top: 20px;">Insert Form</H2>
          <div class="form-box-again">
            <div class="form-input-box">
              <h3>Bike ID</h3>
              <input class="form-input" type="text" name="txtBikeID">
            </div>

            <div class="form-input-box">
              <h3>Status</h3>
              <input class="form-input" type="text" name="txtStatus" value="In Stock" require>
            </div>

            <div class="form-input-box">
              <h3>Number Bike</h3>
              <select class="form-input" name="txtNumBike" size="1">
                <option value="NB0101">NB0101</option>
                <option value="NB0102">NB0102</option>
                <option value="NB0103">NB0103</option>
                <option value="NB0104">NB0104</option>
                <option value="NB0105">NB0105</option>
                <option value="NB0106">NB0106</option>
                <option value="NB0107">NB0107</option>
                <option value="NB0108">NB0108</option>
                <option value="NB0109">NB0109</option>
                <option value="NB0110">NB0110</option>
              </select>
            </div>

            <div class="form-input-box">
              <h3>Amount</h3>
              <input class="form-input" type="text" name="txtAmount" value="1">
            </div>
            <!--
                    <div class="form-input-box">
                      <h3>สถานะ</h3>
                      <input class="form-input" type='hidden' name="txtStatus" value ="Borrow">Borrow</input>
                      <input class="form-input" type='hidden' name="txtStatusbike" value ="Out Stock"></input>
                      <input class="form-input" type='hidden' name="txtAmount" value ="0"></input>
                    </div> -->
          </div>
          <br> <br> <br>
          <div class="form-button">
            <input type="submit" name="submit" value="SUBMIT"> &nbsp;
            <button type="reset" name="reset" value="Cancel"><a href="Bicycle.php">CANCLE</a></button>
          </div>
        </div>
      </form>
    </center>
  </div>
</body>

</html>