<?php include './inc/handle.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/dangnhap.css">
  <link rel="stylesheet" href="assets/css/grid.css">
  <link rel="stylesheet" href="assets/css/base.css">
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/font/themify-icons/themify-icons.css">
  <link rel="shortcut icon" href="assets/img/favicon_created_by_logaster.ico" type="image/x-icon">
  <title>Login</title>
</head>
<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $login_user = $user->login_user($_POST); // Assuming $user is an object with a login_user method
  }
?>
<body>
  <?php include 'inc/header.php' ?>
  <div class="app">
    <div class="grid wide">  
      <div class="app_content-all">
        <form action="" method="post" class="auth__form-form">
          <div class="row">
            <div class="fix-content col c-5">
              <div class="auth__form">
                <div class="auth__form-container">
                  <div class="form-container-title">Existing MLL customer
                    <p>
                      If you already have an account, please log in to accumulate points
                      and receive better benefits!
                    </p>
                  </div>
                  <div class="row">
                    <div class="auth__form-group1 col c-12 ">
                      <input type="text" name="username" class="auth__form-input" placeholder="Username">
                    </div>
                    <div class="auth__form-group1 col c-12">
                      <input type="password" name="password" class="auth__form-input" placeholder="Password">
                    </div>
                  </div>
                  <div style="text-align: right;">
                    <a href="forgotPassword.php" style="font-family: var(--font-family-monospace);color: #221f20;">Forgot Password</a>
                  </div>
                  <div class="baoloi">
                    <?php
                      if (isset($login_user)) {
                        echo $login_user;
                      }
                    ?>
                  </div>
                  <input type="submit" name="submit" value="Login" class="btn btn-login mt-16">
                </div>
              </div>
            </div>
            <div class="col c-2">
              <div class="auth-row">
              </div>
            </div>
            <div class="col c-5">
              <div class="auth__form">
                <div class="auth__form-container">
                  <div class="form-container-title">New MLL customer
                    <p>
                      If you don't have an account on mll.com yet, please use this option to access the registration form.
                      By providing IVY moda with your details, the shopping process on ivymoda.com will be a more enjoyable and quicker experience!
                    </p>
                  </div>
                  <div class="btn-login1">
                    <a href="register.php">Register</a>
                  </div>
                </div>
              </div>
            </div>
          </div>  
        </form>
      </div>
    </div>
  </div>  
  <?php include './inc/footer.php' ?>
</body>
</html>
