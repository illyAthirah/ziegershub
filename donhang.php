<?php include './inc/handle.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <link rel="stylesheet" href="assets/css/base.css"> -->
    <link rel="stylesheet" href="assets/css/grid.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/account.css">
    <link rel="stylesheet" href="assets/css/xemlaidonhang.css">
    <link rel="stylesheet" href="assets/font/themify-icons/themify-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Shopping cart</title>
</head>
<?php
//Cancel order
if (isset($_GET['orderID']) && $_GET['orderID']) {
    $userId = Session::get('user_id');
    $orderId = "(" . $_GET['orderID'] . "-1)";
    $update_status = $order->update_Status_Order($orderId, -1, $userId);
}

//xác nhận lấy hàng
if (isset($_GET['status']) && $_GET['status'] == 1) {
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $date_current = date('Y-m-d H:i:s');
    $userId = Session::get('user_id');
    $orderId = "(" . $_GET['orderID'] . "-1)";
    $update_status = $order->recieve_Order($orderId, 2, $userId, $date_current);
}

//Return item
if (isset($_GET['status']) && $_GET['status'] == 2) {
    $userId = Session::get('user_id');
    $orderId = "(" . $_GET['orderID'] . "-1)";
    $update_status = $order->update_Status_Order($orderId, 3, $userId);
}
?>

<body>
    <div class="content">
        <div class="grid">
            <?php include 'inc/header.php' ?>
        </div>
        <div class="grid wide" style="border-top: 1px solid #ccc;">
            <div class="account-body1">
                <div class="row">
                    <div class="col l-3  underline">
                        <div class="category-all">
                            <ul>
                                <li style="display: flex;
                                align-items: center;
                                justify-content: center;
                                padding: 10px;
                                border-bottom: 1px solid #ccc;">
                                    <span class="ti-user" style="padding: 10px;border: 1px solid;border-radius: 50%;"></span>
                                    <a href="" style="text-decoration: none;padding: 0 10px;font-family: var(--font-family-monospace); color: black;
                                font-weight: bold"> Name</a>
                                </li>
                                <li class="category">
                                    <span class="ti-user"></span>
                                    <a href=""> Account information</a>
                                </li>
                                <li class="category">
                                    <span class="ti-comments"></span>
                                    <a href=""> My notifications</a>
                                </li>
                                <li class="category">
                                    <span class="ti-printer"></span>
                                    <a href="tinhtrangdonhang.php"> Order status</a>
                                </li>
                                <li class="category">
                                    <span class="ti-printer"></span>
                                    <a href="lichsu.php"> Order management</a>
                                </li>
                                <li class="category">
                                    <span class="ti-location-pin"></span>
                                    <a href=""> Address number</a>
                                </li>
                                <li class="category">
                                    <span class="ti-envelope"></span>
                                    <a href=""> Payment information</a>
                                </li>
                                <li class="category">
                                    <span class="ti-write"></span>
                                    <a href=""> Nhận xét sản phẩm đã mua</a>
                                </li>
                                <li class="category">
                                    <span class="ti-ink-pen"></span>
                                    <a href=""> Sản phẩm đã xem</a>
                                </li>
                                <li class="category">
                                    <span class="ti-ink-pen"></span>
                                    <a href=""> Sản phẩm yêu thích</a>
                                </li>
                                <li class="category">
                                    <span class="ti-shopping-cart-full"></span>
                                    <a href=""> Sản phẩm mua sau</a>
                                </li>
                                <li class="category">
                                    <span class="ti-star"></span>
                                    <a href=""> My review</a>
                                </li>
                                <li class="category">
                                    <span class="ti-ticket"></span>
                                    <a href=""> Discount code</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col m-12 l-9">
                        <h3 style="font-weight: 500;font-size: 24px;line-height: 32px;text-transform: uppercase;color: #221f20;display: flex;align-items: center;">Order management</h3>
                        <ul style="display:flex;">
                            <li class="QLdonhang" onclick="changeProductList('choXN',this)">Waiting for confirmation</li>
                            <li class="QLdonhang" onclick="changeProductList('daNH',this)">Currently delivering</li>
                            <li class="QLdonhang" onclick="changeProductList('daGiao',this)">Delivered</li>
                            <li class="QLdonhang" onclick="changeProductList('traHang',this)">Return item</li>
                            <li class="QLdonhang" onclick="changeProductList('daHuy',this)">Cancelled</li>
                        </ul>
                        <div class="col l-12">
                            <!-- <table id="choXN" class="table table_0"> -->
                            <?php
                            $date = $order->order_date(Session::get('user_id'), '(0)');
                            if ($date == Null) {
                            } else {

                                $count = 0;
                                while ($result_date = $date->fetch_assoc()) {
                                    $count += 1;
                                    //foreach($result_date as $date_order){
                            ?>
                                    <table id="choXN" class="choXN table_0">
                                        <thead>
                                            <tr>
                                                <th>Order: <?php echo $count; ?></th>
                                                <th colspan="5">Order date: <?php echo $result_date['order_time']; ?></th>
                                                <th colspan="2" class="toggle">View details</th>
                                            </tr>
                                        </thead>
                                        <!-- </table> -->

                                        <table class="display display_0">
                                            <thead style="background-color:blue;">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Image</th>
                                                    <th>Tên</th>
                                                    <th>Size</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                    <th>Address</th>
                                                    <th>Tình trạng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $getOrderHistory0 = $order->getOrderHistory(Session::get('user_id'), '(0)', $result_date['order_time']);

                                                if ($getOrderHistory0) {
                                                    $i = 0;
                                                    $total0 = 0;
                                                    $orderID = "";
                                                    while ($result_OrderHistory0 = $getOrderHistory0->fetch_assoc()) {
                                                        $total0 += $result_OrderHistory0['total'];
                                                        $orderID .= $result_OrderHistory0['orderId'] . ",";
                                                ?>
                                                        <tr>
                                                            <td><?= ($i = $i + 1); ?></td>
                                                            <td>
                                                                <div class="cart-td_title">
                                                                    <a href="chitietsanpham.php?productId=<?php echo $result_OrderHistory0['productId']; ?>"><img style="cursor:pointer;" src="./admin/upload/<?php echo $result_OrderHistory0['image'] ?>" alt="" class="app_cart-img"></a>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <span><?php echo $result_OrderHistory0['productName'] ?></span>
                                                            </td>
                                                            <td><?php echo $result_OrderHistory0['size'] ?></td>
                                                            <td>
                                                                <div class="cart-btn">
                                                                    <span><?php echo "RM" . number_format($result_OrderHistory0['price'], 2, '.', '')?></span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <form action="" method="post">
                                                                    <!-- hidden loại type không hiên thị -->

                                                                    <input style="border: none;background: none;" type="button" name="quantity" value="<?php echo $result_OrderHistory0['quantity'] ?>" width="30px" />
                                                                    <!-- <input type="submit" name="submit" value="Update"/> -->
                                                                </form>
                                                            </td>

                                                            <td>
                                                                <span class="cart-current"><?php
                                                                                            echo "RM" . number_format($result_OrderHistory0['total'], 2, '.', '');
                                                                                            ?></span>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                echo $result_OrderHistory0['order_time'];
                                                                ?>
                                                            </td>
                                                            <td style="color:red;cursor:pointer">Still waiting for confirmation</td>

                                                        </tr>
                                                    <?php
                                                    }

                                                    ?>
                                                    <td colspan="7" style="background-color:#2a2b2c;text-align:center;color:white;">Total orders: <?php echo "RM" . number_format($total0, 2, '.', ''); ?></td>
                                                    <td colspan="3" class="huy_don" style="background-color:#2a2b2c;">
                                                        <div style="display: flex;align-items: center;justify-content: space-evenly;">
                                                            <span class="ti-trash" style="color: white;font-size: 20px;"> </span>
                                                            <a style="text-decoration:none;font-size:20px;" onclick="return confirm('Bạn có chắc chắn muốn Cancel order hàng này')" href="?orderID=<?php echo $orderID ?>">Cancel order</a>
                                                        </div>
                                                    </td>
                                            <?php
                                                }
                                            }
                                            //}

                                            ?>
                                            </tbody>
                                        </table>
                                    </table>
                                <?php } ?>


                                <!-- <table id="daGiao" class="table table_1"> -->
                                <?php
                                $date1 = $order->order_date(Session::get('user_id'), '(1)');
                                if ($date1 == Null) {
                                } else {

                                    $count = 0;
                                    while ($result_date1 = $date1->fetch_assoc()) {
                                        $count += 1;
                                        //foreach($result_date1 as $date_order1){
                                ?>
                                        <table id="daNH" class="daNH table_1">
                                            <thead>
                                                <tr>
                                                    <th>Order: <?php echo $count; ?></th>
                                                    <th colspan="5">Order date: <?php echo $result_date1['order_time']; ?></th>
                                                    <th colspan="2" class="toggle">View details</th>
                                                </tr>
                                            </thead>
                                            <!-- </table> -->

                                            <table class="display display_1">
                                                <thead style="background-color:blue;">
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Image</th>
                                                        <th>Tên</th>
                                                        <th>Size</th>
                                                        <th>Price</th>
                                                        <th>Quantity</th>
                                                        <th>Total</th>
                                                        <th>Address</th>
                                                        <th>Tình trạng</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $getOrderHistory1 = $order->getOrderHistory(Session::get('user_id'), '(1)', $result_date1['order_time']);

                                                    if ($getOrderHistory1) {
                                                        $i = 0;
                                                        $total1 = 0;
                                                        $orderID = "";
                                                        while ($result_OrderHistory1 = $getOrderHistory1->fetch_assoc()) {
                                                            $total1 += $result_OrderHistory1['total'];
                                                            $orderID .= $result_OrderHistory1['orderId'] . ",";
                                                    ?>
                                                            <tr>
                                                                <td><?= ($i = $i + 1); ?></td>
                                                                <td>
                                                                    <div class="cart-td_title">
                                                                        <a href="chitietsanpham.php?productId=<?php echo $result_OrderHistory1['productId']; ?>"><img style="cursor:pointer;" src="./admin/upload/<?php echo $result_OrderHistory1['image'] ?>" alt="" class="app_cart-img"></a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <span><?php echo $result_OrderHistory1['productName'] ?></span>
                                                                </td>
                                                                <td><?php echo $result_OrderHistory1['size'] ?></td>
                                                                <td>
                                                                    <div class="cart-btn">
                                                                        <span><?php echo "RM" . number_format($result_OrderHistory1['price'], 2, '.', '')?></span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <form action="" method="post">
                                                                        <!-- hidden loại type không hiên thị -->

                                                                        <input style="border: none;background: none;" type="button" name="quantity" value="<?php echo $result_OrderHistory1['quantity'] ?>" width="30px" />
                                                                        <!-- <input type="submit" name="submit" value="Update"/> -->
                                                                    </form>
                                                                </td>

                                                                <td>
                                                                    <span class="cart-current"><?php
                                                                                                echo "RM" . number_format($result_OrderHistory1['total'], 2, '.', '');
                                                                                                ?></span>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    echo $result_OrderHistory1['order_time'];
                                                                    ?>
                                                                </td>
                                                                <td style="color:blue;">Currently delivering</td>
                                                            </tr>
                                                        <?php

                                                        }
                                                        ?>
                                                        <td colspan="6" style="background-color:#2a2b2c;text-align:center;color:white;">Total orders: <?php echo "RM" . number_format($total1, 2, '.', ''); ?></td>
                                                        <td colspan="3" class="confirm" style="background-color:#2a2b2c;">
                                                            <div>
                                                                <span class="ti-check" style="color:white; font-size:15px;"></span>
                                                                <a style="text-decoration:none;font-size:15px;" onclick="return confirm('Do you want to confirm pickup?')" href="?orderID=<?php echo $orderID ?>&status=1">Order receive</a>
                                                            </div>

                                                        </td>
                                                <?php
                                                    }
                                                }
                                                //}

                                                ?>
                                                </tbody>
                                            </table>
                                        </table>
                                    <?php } ?>


                                    <!--da giao-->
                                    <!-- <table id="daHuy" class="table table_2"> -->
                                    <?php
                                    $date2 = $order->order_date(Session::get('user_id'), '(2,5)');
                                    if ($date2 == Null) {
                                    } else {

                                        $count = 0;
                                        while ($result_date2 = $date2->fetch_assoc()) {
                                            $count += 1;
                                            //foreach($result_date2 as $date_order2){
                                    ?>
                                            <table id="daGiao" class="daGiao table_2">
                                                <thead>
                                                    <tr>
                                                        <th>Order: <?php echo $count; ?></th>
                                                        <th colspan="3">Order date: <?php echo $result_date2['order_time']; ?></th>
                                                        <th colspan="2">Pickup date: <?php echo $result_date2['recieve_time']; ?></th>
                                                        <th colspan="2" class="toggle">View details</th>
                                                    </tr>
                                                </thead>
                                                <!-- </table> -->

                                                <table class="display display_2">
                                                    <thead style="background-color:blue;">
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Image</th>
                                                            <th>Tên</th>
                                                            <th>Size</th>
                                                            <th>Price</th>
                                                            <th>Quantity</th>
                                                            <th>Total</th>
                                                            <th>Address</th>
                                                            <th>Tình trạng</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $getOrderHistory2 = $order->getOrderHistory(Session::get('user_id'), '(2,5)', $result_date2['order_time']);

                                                        if ($getOrderHistory2) {
                                                            $i = 0;
                                                            $total2 = 0;
                                                            $orderID = "";
                                                            while ($result_OrderHistory2 = $getOrderHistory2->fetch_assoc()) {
                                                                $total2 += $result_OrderHistory2['total'];
                                                                $orderID .= $result_OrderHistory2['orderId'] . ",";
                                                        ?>
                                                                <tr>
                                                                    <td><?= ($i = $i + 1); ?></td>
                                                                    <td>
                                                                        <div class="cart-td_title">
                                                                            <a href="chitietsanpham.php?productId=<?php echo $result_OrderHistory2['productId']; ?>"><img style="cursor:pointer;" src="./admin/upload/<?php echo $result_OrderHistory2['image'] ?>" alt="" class="app_cart-img"></a>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span><?php echo $result_OrderHistory2['productName'] ?></span>
                                                                    </td>
                                                                    <td><?php echo $result_OrderHistory2['size'] ?></td>
                                                                    <td>
                                                                        <div class="cart-btn">
                                                                            <span><?php echo "RM" . number_format($result_OrderHistory2['price'], 2, '.', '')?></span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <form action="" method="post">
                                                                            <!-- hidden loại type không hiên thị -->

                                                                            <input style="border: none;background: none;" type="button" name="quantity" value="<?php echo $result_OrderHistory2['quantity'] ?>" width="30px" />
                                                                            <!-- <input type="submit" name="submit" value="Update"/> -->
                                                                        </form>
                                                                    </td>

                                                                    <td>
                                                                        <span class="cart-current"><?php
                                                                                                    echo "RM" . number_format($result_OrderHistory2['total'], 2, '.', '');
                                                                                                    ?></span>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        echo $result_OrderHistory2['order_time'];
                                                                        ?>
                                                                    </td>
                                                                    <td style="color:blue;cursor:pointer">Order receive</td>

                                                                </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                            <td colspan="7" style="background-color:#2a2b2c;text-align:center;color:white;">Total orders: <?php echo "RM" . number_format($total2, 2, '.', ''); ?></td>

                                                            <td colspan="2" class="confirm" style="background-color:#2a2b2c">
                                                            <div style="display: flex;align-items: center ; justify-content: center;">
                                                                <span class="ti-close" style="color: white ; font-size:15px"></span>
                                                                <a style="text-decoration:none;font-size:15px;" onclick="return confirm('Do you want to return an item?')" href="?orderID=<?php echo $orderID ?>&status=2" >Return item</a>
                                                            </div>
                                                            </td>
                                                    <?php
                                                        }
                                                    }
                                                    //}

                                                    ?>
                                                    </tbody>

                                                </table>
                                            </table>
                                        <?php } ?>



                                        <!--tra hang-->
                                        <!-- <table id="daHuy" class="table table_3"> -->
                                        <?php
                                        $date2 = $order->order_date(Session::get('user_id'), '(3)');
                                        if ($date2 == Null) {
                                        } else {

                                            $count = 0;
                                            while ($result_date2 = $date2->fetch_assoc()) {
                                                $count += 1;
                                                //foreach($result_date2 as $date_order2){
                                        ?>
                                                <table id="traHang" class="traHang table_3">
                                                    <thead>
                                                        <tr>
                                                            <th>Order: <?php echo $count; ?></th>
                                                            <th colspan="3">Order date: <?php echo $result_date2['order_time']; ?></th>
                                                            <th colspan="2">Pickup date: <?php echo $result_date2['recieve_time']; ?></th>
                                                            <th colspan="2" class="toggle">View details</th>
                                                        </tr>
                                                    </thead>
                                                    <!-- </table> -->

                                                    <table class="display display_3">
                                                        <thead style="background-color:blue;">
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Image</th>
                                                                <th>Tên</th>
                                                                <th>Size</th>
                                                                <th>Price</th>
                                                                <th>Quantity</th>
                                                                <th>Total</th>
                                                                <th>Address</th>
                                                                <th>Tình trạng</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $getOrderHistory2 = $order->getOrderHistory(Session::get('user_id'), '(3)', $result_date2['order_time']);

                                                            if ($getOrderHistory2) {
                                                                $i = 0;
                                                                $total2 = 0;
                                                                $orderID = "";
                                                                while ($result_OrderHistory2 = $getOrderHistory2->fetch_assoc()) {
                                                                    $total2 += $result_OrderHistory2['total'];
                                                                    $orderID .= $result_OrderHistory2['orderId'] . ",";
                                                            ?>
                                                                    <tr>
                                                                        <td><?= ($i = $i + 1); ?></td>
                                                                        <td>
                                                                            <div class="cart-td_title">
                                                                                <a href="chitietsanpham.php?productId=<?php echo $result_OrderHistory2['productId']; ?>"><img style="cursor:pointer;" src="./admin/upload/<?php echo $result_OrderHistory2['image'] ?>" alt="" class="app_cart-img"></a>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <span><?php echo $result_OrderHistory2['productName'] ?></span>
                                                                        </td>
                                                                        <td><?php echo $result_OrderHistory2['size'] ?></td>
                                                                        <td>
                                                                            <div class="cart-btn">
                                                                                <span><?php echo "RM" . number_format($result_OrderHistory2['price'], 2, '.', '')?></span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <form action="" method="post">
                                                                                <!-- hidden loại type không hiên thị -->

                                                                                <input style="border: none;background: none;" type="button" name="quantity" value="<?php echo $result_OrderHistory2['quantity'] ?>" width="30px" />
                                                                                <!-- <input type="submit" name="submit" value="Update"/> -->
                                                                            </form>
                                                                        </td>

                                                                        <td>
                                                                            <span class="cart-current"><?php
                                                                                                        echo "RM" . number_format($result_OrderHistory2['total'], 2, '.', '');
                                                                                                        ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            echo $result_OrderHistory2['order_time'];
                                                                            ?>
                                                                        </td>
                                                                        <td style="color:red;cursor:pointer">Waiting for confirmation Return item</td>

                                                                    </tr>
                                                                <?php
                                                                }
                                                                ?>
                                                                <td colspan="9" style="background-color:#2a2b2c;text-align:center;color:white;">Total orders: <?php echo "RM" . number_format($total2, 2, '.', ''); ?></td>

                                                        <?php
                                                            }
                                                        }
                                                        //}

                                                        ?>
                                                        </tbody>

                                                    </table>
                                                </table>
                                            <?php } ?>


                                            <!--huy don-->
                                            <!-- <table id="daHuy" class="table table_4"> -->
                                            <?php
                                            $date2 = $order->order_date(Session::get('user_id'), '(-1,4)');
                                            if ($date2 == Null) {
                                            } else {

                                                $count = 0;
                                                while ($result_date2 = $date2->fetch_assoc()) {
                                                    $count += 1;
                                                    //foreach($result_date2 as $date_order2){
                                            ?>
                                                    <table id="daHuy" class="daHuy table_4">
                                                        <thead>
                                                            <tr>
                                                                <th>Order: <?php echo $count; ?></th>
                                                                <th colspan="4">Order date: <?php echo $result_date2['order_time']; ?></th>
                                                                <th colspan="3" class="toggle">View details</th>
                                                            </tr>
                                                        </thead>
                                                        <!-- </table> -->

                                                        <table class="display display_4">
                                                            <thead style="background-color:blue;">
                                                                <tr>
                                                                    <th>No.</th>
                                                                    <th>Image</th>
                                                                    <th>Tên</th>
                                                                    <th>Size</th>
                                                                    <th>Price</th>
                                                                    <th>Quantity</th>
                                                                    <th>Total</th>
                                                                    <th>Address</th>
                                                                    <th>Tình trạng</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $getOrderHistory2 = $order->getOrderHistory(Session::get('user_id'), '(-1,4)', $result_date2['order_time']);

                                                                if ($getOrderHistory2) {
                                                                    $i = 0;
                                                                    $total2 = 0;
                                                                    $orderId = "";
                                                                    while ($result_OrderHistory2 = $getOrderHistory2->fetch_assoc()) {
                                                                        $total2 += $result_OrderHistory2['total'];
                                                                ?>
                                                                        <tr>
                                                                            <td><?= ($i = $i + 1); ?></td>
                                                                            <td>
                                                                                <div class="cart-td_title">
                                                                                    <a href="chitietsanpham.php?productId=<?php echo $result_OrderHistory2['productId']; ?>"><img style="cursor:pointer;" src="./admin/upload/<?php echo $result_OrderHistory2['image'] ?>" alt="" class="app_cart-img"></a>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <span><?php echo $result_OrderHistory2['productName'] ?></span>
                                                                            </td>
                                                                            <td><?php echo $result_OrderHistory2['size'] ?></td>
                                                                            <td>
                                                                                <div class="cart-btn">
                                                                                    <span><?php echo "RM" . number_format($result_OrderHistory2['price'], 2, '.', '')?></span>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <form action="" method="post">
                                                                                    <!-- hidden loại type không hiên thị -->

                                                                                    <input style="border: none;background: none;" type="button" name="quantity" value="<?php echo $result_OrderHistory2['quantity'] ?>" width="30px" />
                                                                                    <!-- <input type="submit" name="submit" value="Update"/> -->
                                                                                </form>
                                                                            </td>

                                                                            <td>
                                                                                <span class="cart-current"><?php
                                                                                                            echo "RM" . number_format($result_OrderHistory2['total'], 2, '.', '');
                                                                                                            ?></span>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                echo $result_OrderHistory2['order_time'];
                                                                                ?>
                                                                            </td>
                                                                            <?php
                                                                            if ($result_OrderHistory2['status'] == -1) {
                                                                            ?>
                                                                                <td style="color:red;cursor:pointer">Cancelled order</td>
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <td style="color:red;cursor:pointer">The item has been returned</td>
                                                                            <?php } ?>

                                                                        </tr>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    <td colspan="9" style="background-color:#2a2b2c;text-align:center;color:white;">Total orders: <?php echo "RM" . number_format($total2, 2, '.', ''); ?></td>

                                                            <?php
                                                                }
                                                            }
                                                            //}

                                                            ?>
                                                            </tbody>

                                                        </table>
                                                    </table>
                                                <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './inc/footer.php' ?>
    </div>
</body>

<script src="./assets/js/donhang.js"></script>

</html>