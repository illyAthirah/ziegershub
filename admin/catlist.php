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
<?php include '../classses/category.php' ?>
<?php
    $cat = new category();
    if (isset($_GET['delid'])) {
		$id = $_GET['delid'];
		$delcat = $cat->del_category($id);
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
                            <a href="catadd.php"> <h4>Add Products</h4></a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Category name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $show_cate = $cat->show_category();
                                if ($show_cate) {
                                    $i = 0 ;
                                    while($result = $show_cate->fetch_assoc()) {
                                    $i++;
                                ?>
                                <tr>  
                                    <td><?php echo $i ?></td>    
                                    <td><?php echo $result['catName'] ?></td>
                                    <td>
                                        <a href="catedit.php?catid=<?php echo $result['catId'] ?>" class="img-link">Edit</a>
                                    </td>
                                    <td>
                                    <a onclick="return confirm('Are you sure you want to delete?')" href="?delid=<?php echo $result['catId'] ?>" class="img-link"class ="cat__link">Delete</a>
                                    </td>
                                </tr>
                                <?php
							         }
						        }
				                 ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </section>
        </main>
    </div>
</body>
</html>