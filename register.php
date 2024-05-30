<?php include './inc/handle.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/dangnhap.css">
  <link rel="stylesheet" href="assets/css/base.css">
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/grid.css">
  <link rel="stylesheet" href="assets/font/themify-icons/themify-icons.css">
  <link rel="shortcut icon" href="assets/img/favicon_created_by_logaster.ico" type="image/x-icon">
  <title>Register Account</title>
</head>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
  $insertProduct = $user->insert_user($_POST);
}
?>

<body>
  <?php include 'inc/header.php' ?>
  <div class="app">
    <div class="grid wide">
      <div class="app_content-all">
        <div class="row">
          <div class="auth__form-header">
            <h2>REGISTER</h2>
          </div>
        </div>
        <form action="" method="post" class="auth__form-form">
          <div class="row">
            <div class="col c-6">
              <div class="auth__form">
                <div class="auth__form-container">
                  <div class="auth__form-container-title">Customer Information</div>
                  <div class="row">
                    <div class="auth__form-group col c-6 ">
                      <div class="auth__form-group-title">
                        <span>Full Name</span>
                        <span style="color: red;">*</span>
                      </div>
                      <input type="text" name="name" class="auth__form-input" placeholder="Enter your name">
                    </div>
                    <div class="auth__form-group col c-6">
                      <div class="auth__form-group-title">
                        <span>Email</span>
                        <span style="color: red;">*</span>
                      </div>
                      <input type="text" name="email" class="auth__form-input" placeholder="Enter your email address">
                    </div>
                    <div class="auth__form-group col c-6">
                      <div class="auth__form-group-title">
                        <span>Phone Number</span>
                        <span style="color: red;">*</span>
                      </div>
                      <input type="text" name="phone" class="auth__form-input" placeholder="Enter your phone number">
                    </div>
                    <div class="auth__form-group col c-6">
                      <div class="auth__form-group-title">
                        <span>Gender</span>
                        <span style="color: red;">*</span>
                      </div>
                      <input type="text" name="sex" class="auth__form-input" placeholder="Enter your gender">
                    </div>
                    <div class="auth__form-group col c-6">
                      <div class="auth__form-group-title">
                        <span>Date of Birth</span>
                        <span style="color: red;">*</span>
                      </div>
                      <input type="text" name="date" class="auth__form-input" placeholder="Enter your date of birth">
                    </div>
                  </div>
                  <div class="row">
                    <div class="auth__form-group col c-12">
                      <div class="auth__form-group-title">
                        <span>Address</span>
                        <span style="color: red;">*</span>
                      </div>
                      <textarea name="address" id="" cols="30" rows="10"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
            <div class="col c-6">
              <div class="auth__form-container-title">Registration Information</div>
              <div class="row">
                <div class="auth__form-group col c-12 ">
                  <div class="auth__form-group-title">
                    <span>Username</span>
                    <span style="color: red;">*</span>
                  </div>
                  <input type="text" name="username" class="auth__form-input" placeholder="Enter your username">
                </div>
                <div class="auth__form-group col c-12 ">
                  <div class="auth__form-group-title">
                    <span>Password</span>
                    <span style="color: red;">*</span>
                  </div>
                  <input type="password" name="password" class="auth__form-input" placeholder="Enter your password">
                </div>
                <div class="auth__form-group col c-12 ">
                  <div class="auth__form-group-title">
                    <span>Re-type Password</span>
                    <span style="color: red;">*</span>
                  </div>
                  <input type="password" name="relyPassword" class="auth__form-input" placeholder="Re-type your password">
                </div>
                <div class="auth__form-group col c-12 ">
                  <select class="auth__form-input" id="select" name="category">
                    <option>Select Security Question</option>
                    <option>Who is your favorite person?</option>
                    <option>What is your father's name?</option>
                    <option>What is your bank account number?</option>
                    <option>What is your favorite food?</option>
                  </select>
                  <input type="password" name="cauHoiBiMat" class="auth__form-input" placeholder="Answer the security question">
                </div>
              </div>
              <div class="baoloi">
                <?php
                if (isset($insertProduct)) {
                  echo $insertProduct;
                }
                ?>
              </div>
              <input type="submit" name="submit" value="Register" class="btn btn-login mt-16">
              <div style="text-align: right ; padding: 15px 0;">
                <a href="login.php" style="color: #221f20;font-family: var(--font-family-sans-serif);margin: 24px;">Login</a>
              </div>

            </div>
          </div>
        </form>
      </div>
    </div>
    <?php include './inc/footer.php' ?>
  </div>
</body>

</html>
