<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <link rel="stylesheet" href="assets/font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="assets/css/sp.css">
    <title>Products</title>
</head>
<?php
include '../classses/discount.php';
?>
<?php
$discount = new discount();
if (isset($_GET['delcoupon_id'])) {
    $id = $_GET['delcoupon_id'];
    $delproduct = $discount->del_Discount($id);
}
?>
<body>
    <?php include './inc/sidebar.php' ?>
    <div class="main-content">
        <?php include './inc/header.php' ?>
        <main>
            <section class="recent">
                <div class="activity-grid">
                    <div class="activity-card">
                        <div class="activity-header">
                            <h3>Product List</h3>
                            <div class="activity-more">
                                <span class="ti-plus"></span>
                                <a href="discountadd.php">Add Discount code</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Tên mã giảm</th>
                                        <th>Discount code</th>
                                        <th>Quantity Discount code</th>
                                        <th>Điều kiện mã giảm</th>
                                        <th>Số giảm</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $discount = new discount();
                                    $discountList = $discount->showDiscount();
                                    if ($discountList) {
                                        while ($result = $discountList->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td><?php echo $result['coupon_name'] ?></td>
                                                <td><?php echo $result['coupon_code'] ?></td>
                                                <td><?php echo $result['coupon_time'] ?></td>
                                                <?php 
                                                    if ($result['coupon_conditions'] == 0) {
                                                 ?>
                                                    <td>Giảm theo phần trăm</td>
                                                <?php   
                                                    } else {
                                                ?>
                                                    <td>Giảm theo tiền</td>
                                                <?php
                                                    }
                                                ?>
                                                <?php 
                                                    if ($result['coupon_conditions'] == 0) {
                                                 ?>
                                                    <td><?php echo $result['coupon_number'] ?>%</td>
                                                <?php   
                                                    } else {
                                                ?>
                                                    <td><?php echo "RM" . number_format($result['coupon_number'], 2, '.', '')?></td>
                                                <?php
                                                    }
                                                ?>
                                                <td>
                                                    <a onclick="return confirm('Are you sure you want to delete?')" href="?delcoupon_id=<?php echo $result['coupon_id'] ?>">Delete</a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
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