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
    <title>Nhập lại mật khẩu</title>
</head>

<body>
    <!-- Phần header -->
    <?php include 'inc/header.php' ?>
    <div class="app">
        <div class="grid wide">
            <div id="NhapLaiMK" class="app_content-allQMK">
                <div class="row">
                    <div class="auth__form-header">
                        <h2>Enter your new password</h2>
						<p>Please enter your registered email address. Our system will send you a link to change your password.</p>
                    </div>
                </div>
                <form action="" method="POST">
                    <div class="form-group">
                        <input value="" name="email" type="email" placeholder="Email">
                    </div>
                    <div class="form-group-tt">
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
                            $senmail = $sendMail->sendMail($_POST);
                            echo $senmail;
                        }
                        ?>
                        <button type="submit" name="submit" value="Gửi Mail">Send Email</button>
                    </div>
                    <div style="display: flex;align-items: center;padding: 10px 0;">
                        <span style="font-family: var(--font-family-monospace);">Already have a password?</span>
                        <a href="index.php" style="text-decoration: revert !important;padding: 0 10px;">Login</a>
                    </div>
                </form>
            </div>
        </div>
        <?php include './inc/footer.php' ?>
    </div>
</body>

</html>