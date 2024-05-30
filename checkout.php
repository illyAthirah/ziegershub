<?php include './inc/handle.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <link rel="stylesheet" href="assets/css/base.css"> -->
    <link rel="stylesheet" href="assets/css/grid.css">
    <link rel="stylesheet" href="assets/css/productCart.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/thanhtoan.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/font/themify-icons/themify-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping cart</title>
</head>
<?php
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $date=date('Y-m-d H:i:s');
    $inserOder = $order->insertOder(Session::get('user_id'),$date);
    $delCart = $cat->del_Cart(Session::get('user_id'));
    header('Location:orders.php');
}
?>
<body>
    <div class="grid">
        <!-- Phần header -->
        <?php include 'inc/header.php' ?>
    </div>
    <div class="grid" style="border-top: 1px solid #ccc;">
        <form action="" method="POST">
            <div class="grid">
                <div class="app">
                    <div class="grid wide">
                        <div class="row">
                            <div class="col l-8" style="margin-top: 40px;">
                                <div class="col l-12">
                                    <div class="checkout-process-bar block-border">
                                        <ul>
                                            <li class="">
                                                <span>Cart</span>
                                            </li>
                                            <li class="active"><span>Order</span></li>
                                            <li class=""><span>Payment</span></li>
                                            <li><span>Order Complete</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col l-12" style="margin: 20px 0;">
                                    <h3 style="padding: 10px;font-family: var(--font-family-sans-serif);">Product Information</h3>
                                    <div style="border: 1px solid #e7e8e9;border-radius: 32px 0px 0px;">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Size</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $getProductCat = $cat->getProductCart(Session::get('user_id'));
                                                if ($getProductCat) {
                                                    $dem = 0;
                                                    $subTotal = 0;
                                                    $i = 0;
                                                    while ($result_ProductCat = $getProductCat->fetch_assoc()) {
                                                ?>
                                                        <tr>
                                                            <td><?= ($i = $i + 1); ?></td>
                                                            <td>
                                                                <div class="cart-td_title">
                                                                    <a href="productdetails.php?productId=<?php echo $result_ProductCat['productId']; ?>">
                                                                        <img style="cursor:pointer;" src="./admin/upload/<?php echo $result_ProductCat['image'] ?>" alt="" class="app_cart-img">
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <span><?php echo $result_ProductCat['productName'] ?></span>
                                                            </td>
                                                            <td><?php echo $result_ProductCat['size'] ?></td>
                                                            <td>
                                                                <div class="cart-btn">
                                                                    <span><?php echo "RM" . number_format($result_ProductCat['price'], 2, '.', '')?></span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <form action="" method="post">
                                                                    <!-- hidden loại type không hiên thị -->
                                                                    <input type="hidden" name="cartId" value="<?php echo $result_ProductCat['cartID'] ?>" />
                                                                    <input style="border: none;background: none;font-family: var(--font-family-sans-serif);" type="button" name="quantity" value="<?php echo $result_ProductCat['quantity'] ?>" width="30px" />
                                                                    <!-- <input type="submit" name="submit" value="Update"/> -->
                                                                </form>
                                                            </td>

                                                            <td>
                                                                <span class="cart-current"><?php $total = $result_ProductCat['price'] * $result_ProductCat['quantity'];
                                                                                            echo "RM" . number_format($total, 2, '.', '');
                                                                                            ?></span>
                                                            </td>

                                                        </tr>
                                                <?php
                                                        $dem++;
                                                        $subTotal += $total;
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                            <!-- <?php
                                                    if (isset($update_quantity)) {
                                                        echo $update_quantity;
                                                    }
                                                    ?>
                                        <?php
                                        if (isset($delProductCart)) {
                                            echo $delProductCart;
                                        }
                                        ?> -->
                                        </table>
                                    </div>

                                </div>
                                <div class="col l-12" style="margin: 20px 0;">
                                    <h3 style="padding: 10px;font-family: var(--font-family-sans-serif);">Shipping Address</h3>
                                    <div style="border: 1px solid #e7e8e9;border-radius: 32px 0px 0px;">
                                        <?php
                                        $userId = Session::get('user_id');
                                        $infor_user = $user->show_User($userId);
                                        while ($result_infor_user = $infor_user->fetch_assoc()) {
                                        ?>
                                            <table>
                                                <tbody>
                                                    <tr style="line-height:50px;">
                                                        <td>Name: </td>
                                                        <td><?php echo $result_infor_user['name'] ?></td>
                                                    </tr>
                                                    <tr style="line-height:50px;">
                                                        <td>Email: </td>
                                                        <td><?php echo $result_infor_user['email'] ?></td>
                                                    </tr>
                                                    <tr style="line-height:50px;">
                                                        <td>Phone: </td>
                                                        <td><?php echo $result_infor_user['phoneNum'] ?></td>
                                                    </tr>
                                                    <tr style="line-height:50px;">
                                                        <td>Address: </td>
                                                        <td><?php echo $result_infor_user['address'] ?></td>
                                                    </tr>
                                                    <tr style="line-height:50px;">
                                                        <td colspan="2" style="cursor:pointer;"><a href="account.php" style="text-decoration:none;color:black; ">Edit Information</a></td>
                                                    </tr>
                                                </tbody>
                                            <?php
                                        }
                                            ?>
                                            </table>
                                    </div>

                                </div>

                            </div>
                            <div class="col l-4">
                            <div class="cart-voucher">
								<h3>Order Summary</h3>
								<?php
								$check_cart = $cat->checkCart(Session::get('user_id'));
								if ($check_cart) {
								?>
									<div style="display: flex;justify-content: space-between; margin: 20px 0;">
										<span class="voucher-title">
											<span>Total Products</span>
										</span>
										<span class="sum-product"><?php
																	Session::set('sum', $dem);
																	echo $dem ?>
										</span>
									</div>
									<div style="display: flex;justify-content: space-between; margin: 20px 0;">
										<div class="voucher-title">
											<span>Total Price</span>
										</div>
										<span class="sum-product"><?php echo "RM" . number_format($subTotal, 2, '.', '') ?></span>
									</div>
									<div style="display: flex;justify-content: space-between; margin: 20px 0;">
										<span class="sum-product">Tax (VAT 10%)</span>
										<span class="sum-product">
											<?php
											$vat = $subTotal * 0.1;
											echo "RM" . number_format($vat, 2, '.', '');
											?>
										</span>
									</div>
									<div class="cart-purchase">
										<span class="sum-product">Total</span>
										<span class="sum-product" style="font-weight: 800;">
											<?php
											$grand_Total = $subTotal + $vat;
											echo "RM" . number_format($grand_Total, 2, '.', '')
											?>
										</span>
									</div>
									<div class="cart-purchase-button">
                                    <p class="btn"><a href="?orderid=order" id="btn_order" onclick="return alert('You have successfully placed an order')">Confirm Order</a></p>
									</div>
								<?php
								} else {
								}
								?>
							</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

        </form>
        <?php include './inc/footer.php' ?>
    </div>

</body>

</html>