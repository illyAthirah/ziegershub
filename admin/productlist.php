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
    include '../classses/brand.php';
    include '../classses/category.php';
    include '../classses/product.php';
    include_once '../helpers/format.php';
?>
<?php
	$pd = new product();
	$fm = new Format();
    if (isset($_GET['delid'])) {
		$id = $_GET['delid'];
		$delproduct = $pd->del_product($id);
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
                            <a href="productadd.php"> <h4>Add Products</h4></a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Type</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Description</th>
                                    <th>Variation</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $pd = new product();
                                $pdlist = $pd->show_product();
                                if ($pdlist) {
                                    $i=0;
                                    while ($result = $pdlist->fetch_assoc()) {
                                        $i++;	
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $result['productName'] ?></td>
                                <td><?php echo $result['quantity'] ?></td>
                                <td><?php echo $result['price'] ?></td>
                                <td><img src="upload/<?php echo $result['image'] ?>" style="width: 50px; height: 50px;" ></td>
                                <td><?php echo $result['typeProductName'] ?></td>
                                <td><?php echo $result['catName'] ?></td>
                                <td><?php echo $result['brandName'] ?></td>
                                <td>
                                    <?php 
                                        echo $fm->textShorten($result['product_desc'],20);
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if ($result['type']==0) {
                                            echo 'Mens clothing';
                                        } else if ($result['type']==1) {
                                            echo 'Womens clothing';
                                        } else if ($result['type']==2) {
                                            echo 'Kids clothing';
                                        }
                                    ?>
                                </td>
                                <td><a href="productedit.php?productId=<?php echo $result['productId']?>">Edit</a> 
                                || <a onclick="return confirm('Are you sure you want to delete?')" href="?delid=<?php echo $result['productId'] ?>">Delete</a></td>
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