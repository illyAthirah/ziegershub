<?php include '../classses/user.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <link rel="stylesheet" href="assets/font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="assets/css/thongtin.css">
    <title>Customer information</title>
</head>
<?php
$pd = new user();
if (isset($_GET['delid'])) {
    $id = $_GET['delid'];
    $delproduct = $pd->del_user($id);
}
?>

<body>
    <?php include './inc/sidebar.php' ?>
    <div class="main-content">
        <?php include './inc/header.php' ?>
        <main>
            <h2 class="dash-title">Customer information</h2>
            <section class="recent">
                <div class="activity-grid">
                    <div class="activity-card">
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Customer Code</th>
                                        <th>Customer Name</th>
                                        <th>Phone number</th>
                                        <th>Address</th>
                                        <th>Date of birth</th>
                                        <th>Gender</th>
                                        <th>Total amount spent</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <?php
                                $user = new user();
                                $showUser = $user->showKHAdmin();
                                while ($result = $showUser->fetch_assoc()) {
                                ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $result['userId'] ?></td>
                                            <td><?php echo $result['name'] ?></td>
                                            <td><?php echo $result['phoneNum'] ?></td>
                                            <td><?php echo $result['address'] ?></td>
                                            <td><?php echo $result['dateOfBirth'] ?></td>
                                            <td><?php echo $result['gender'] ?></td>
                                            <td><?php echo "RM" . number_format($result['sumTT'], 2, '.', '')?></td>
                                            <td>
                                                <a onclick="return confirm('Are you sure you want to delete?')" href="?delid=<?php echo $result['userId'] ?>">Delete</a>
                                            </td>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>

</html>