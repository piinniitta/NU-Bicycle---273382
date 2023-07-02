<?php
session_start();
include('connectdb.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css" />
  <title>Sign in & Sign up Form</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="signUpDB.php" class="sign-up-form" method="post">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="txtStudentID" placeholder="Student ID" required />
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="txtName" placeholder="Name" required />
          </div>
          <div class="input-field">
            <i class="fas fa-building"></i>
            <input type="text" name="txtFaculty" placeholder="Faculty" required />
          </div>
          <div class="input-field">
            <i class="fas fa-solid fa-book"></i>
            <input type="text" name="txtBranch" placeholder="Branch" required />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" name="txtEmail" placeholder="Email" required />
          </div>
          <div class="input-field">
            <i class="fas fa-phone"></i>
            <input type="tel" id="phone" name="txtPhonenumber" pattern="[0-9]{10}" placeholder="Phone Number" required>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="txtPassword" placeholder="Password" required />
          </div>
          <button type="submit" name="reg_user" class="btn" value="Sign up"> Sign up </button>
        </form>
        <form action="loginDB.php" class="sign-in-form" method="post">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="Student ID" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" />
          </div>
          <button type="submit" name="login_user" value="Login" class="btn solid"> Login </button>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Not a member yet?</h3>
          <p style="font-size: 20px;">
            หากยังไม่ได้สมัครสมาชิกสามารถสมัครได้ที่นี่
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <img src="img/bike (2).svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>Login here?</h3>
          <p style="font-size: 20px;">
            ผู้ใช้สามารถเข้าสู่ระบบได้ที่นี่
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="img/bike (1).svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="app.js"></script>
</body>

</html>