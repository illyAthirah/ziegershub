<?php include './inc/handle.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="assets/css/grid.css">
  <link rel="stylesheet" href="assets/css/changePassWord.css">
  <link rel="stylesheet" href="assets/css/main.css">

  <link rel="shortcut icon" href="assets/img/favicon_created_by_logaster.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/font/themify-icons/themify-icons.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change User Password</title>
</head>

<?php
if (isset($_POST['doimatkhau']) && $_POST['password_cu'] != "" && $_POST['password_moi'] != "") {
  $username = $_POST['username'];
  $oldPassword = md5($_POST['password_cu']); // Function to encrypt password (md5)
  $newPassword = md5($_POST['password_moi']);
  $row = $user->doimatkhau($username, $oldPassword); // This line calls a function, likely to check current password
  if (empty($row)) {
    $count = 0;
  } else {
    $count = mysqli_num_rows($row);
  }
  if ($count > 0) {
    $up = $user->updatedoimatkhau($newPassword); // This line calls a function, likely to update password

  } else {
    $up = '<span class="ErrorUpdate_pass">Wrong password, please try again!</span>';
  }
} else {
  $up = '<span class="ErrorUpdate_pass">You haven\'t entered password?</span>';
}
?>

<body>

  <div class="content">
    <div class="grid">
      <?php include 'inc/header.php' ?>
    </div>
    <div class="grid wide">
      <div style="margin: 20px 0;" class="">
        <div class="account-me">
          <div class="">
            <div class="account-tt">
              <span class="account-title">Change User Password</span>
            </div>
            <?php
            $userId = Session::get('user_id');
            $infor_user = $user->show_User($userId);
            while ($result_infor_user = $infor_user->fetch_assoc()) {
            ?>
              <form action="" method="post">
                <div class="information">
                  <div class="information-name">
                    <label>Username</label>
                    <input readonly="readonly" type="text" name="username" value="<?php echo $result_infor_user['username'] ?>">
                  </div>
                  <div class="information-name">
                    <label>Old Password</label>
                    <input type="password" name="password_cu" value="">
                  </div>
                  <div class="information-name">
                    <label>New Password</label>
                    <input type="password" name="password_moi" value="">
                  </div>
                  <div style="display: flex;justify-content: center;">
                  <div style="display: flex;justify-content: center;">
                    <?php 
                      if (isset($up)) {
                        echo $up;
                      }
                    ?>
                  </div>
  
                  <div style="display: flex;justify-content: end;" class="infotmation-save">
  
                    <input type="submit" name="doimatkhau" value="Save Changes">
                  </div>
                </div>
              </form>
              <div style="padding: 20px 0;">
                <div>
                  <a style="color:black; font-size: 20px; margin-top: 20px;margin-right: 150px;display: flex;align-items: center;" href="index.php">
                    <span class="ti-arrow-left"></span>
                    <span>Back</span>
                  </a>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>

    <?php include './inc/footer.php' ?>
  </div>
</body>

</html>
