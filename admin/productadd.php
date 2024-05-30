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
<?php include '../classses/brand.php';?>
<?php include '../classses/category.php';?>
<?php include '../classses/product.php';?>
<?php include '../classses/typeProduct.php';?>
<?php
    // isset($_POST['submit']) nếu người dùng nhấn vào submit thì mới Add còn lại thì không
    $product = new product();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        //có $_FILES bởi vì có update hình Image  
        $insertProduct = $product->insert_product($_POST,$_FILES);
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
                        <h3>Add Products</h3>
                        <?php
                            if(isset($insertProduct)){
                                echo $insertProduct;
                            }
                        ?>  
                    </div>
            <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
                <tr>
                    <td class="form_title">
                        <label>Enter Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" placeholder="Nhập Product name" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td class="form_title">
                        <label>Quantity</label>
                    </td>
                    <td>
                        <input type="text" name="productQuantity" placeholder="Enter Quantity" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td class="form_title">
                        <label>Product Catalog</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>Select Category</option>
                            <?php
                                $cat = new category();
                                $catlist = $cat ->show_category();
                                if ($catlist) {
                                    while ($result = $catlist ->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $result['catId'] ?>"><?php echo $result["catName"] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="form_title">
                        <label>Products List</label>
                    </td>
                    <td>
                        <select id="select" name="typeProduct">
                            <option>Select Products List</option>
                            <?php
                                $typeP = new typeProduct();
                                $catlist = $typeP ->show_type_product();
                                if ($catlist) {
                                    while ($result = $catlist ->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $result['typeProductID'] ?>"><?php echo $result["typeProductName"] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td class="form_title">
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>Select Brand</option>
                            <?php
                                $brand = new brand();
                                $brandlist = $brand ->show_brand();
                                if ($brandlist) {
                                    while ($result = $brandlist ->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $result['brandId'] ?>"><?php echo $result["brandName"] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				 <tr>
                    <td class="form_title" style="vertical-align: top; padding-top: 9px;">
                        <label>Description Products</label>
                    </td>
                    <td>
                        <textarea rows="9" cols="70" name="product_desc" class="tinymce"></textarea>
                    </td>
                </tr>
				<tr>
                    <td class="form_title">
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Enter Price" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td class="form_title">
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				<tr>
                    <td class="form_title">
                        <label>Products List</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <option value="0">Mens clothing</option>
                            <option value="1">Womens clothing</option>
                            <option value="2">Kids clothing</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
            </div>
            </div>
            </section>
        </main>
    </div>
</body>
</html>