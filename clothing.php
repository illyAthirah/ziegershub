<?php include './inc/handle.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quần áo</title>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" type="text/css" href="assets/css/quanao.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="assets/css/grid.css">
	<link rel="stylesheet" href="assets/font/themify-icons/themify-icons.css">
	<link rel="shortcut icon" href="assets/img/favicon_created_by_logaster.ico" type="image/x-icon">
	
</head>

<body>
	<section class="app">
		<?php include 'inc/header.php' ?>
		<div class="app_search">
			<div class="pc">
				<div class="grid wide">
					<div class="row">
						<div class="col l-3">
							<div class="tim-kiem-nang-cao">
								<div class="boloc-top">
									<span>Sports clothing</span>
								</div>
					
								<div class="tag-list">
									<ul>
                                        <li>Hoodies & Sweatshirts</li>
                                        <li>Coats & Gilets</li>
                                        <li>Pants and tights</li>
                                        <li>Sport suits</li>
                                        <li>Socks</li>
                                    </ul>				
								</div>
								<hr>
								<div class="dmuc">
									<h4 class="h4">Gender</h4>
								<ul class="danhmuc">
									<li>
										<i class="icon-danhmuc far fa-square"></i>
										<a href="">Male</a>
									</li>
									<li>
										<i class="icon-danhmuc far fa-square"></i>
										<a href="">Female</a>
									</li>
									<li>
										<i class="icon-danhmuc far fa-square"></i>
										<a href="">Unisex</a>
									</li>
								</ul>
								</div>
								<hr>					
								<div class="t_hieu">
									<h4 class="h4">Brands</h4>
								<ul class="thuonghieu">
									<li>
										<i class="icon-danhmuc far fa-square"></i>
										<a href="">Adidas</a>
									</li>
									<li>
										<i class="icon-danhmuc far fa-square"></i>
										<a href="">Nike</a>
									</li>
									<li>
										<i class="icon-danhmuc far fa-square"></i>
										<a href="">Bitis</a>
									</li>
									<li>
										<i class="icon-danhmuc far fa-square"></i>
										<a href="">Puma</a>
									</li>
									<li>
										<i class="icon-danhmuc far fa-square"></i>
										<a href="">Li-ning</a>
									</li>
									<li>
										<i class="icon-danhmuc far fa-square"></i>
										<a href="">Uniqlo </a>
									</li>
									<li>
										<i class="icon-danhmuc far fa-square"></i>
										<a href="">Fila</a>
									</li>
									<li>
										<i class="icon-danhmuc far fa-square"></i>
										<a href="">Kappa</a>
									</li>
									<li>
										<i class="icon-danhmuc far fa-square"></i>
										<a href="">Champion</a>
									</li>
									<li>
										<i class="icon-danhmuc far fa-square"></i>
										<a href="">Wika</a>
									</li>
									<li>
										<i class="icon-danhmuc far fa-square"></i>
										<a href="">Under Armour</a>
									</li>
								</ul>
								</div>
								<hr>
					
								<div class="khoanggia">
                                    <h4 class="h4">Sleeve length</h4>
                                    <ul class="danhmuc">
                                        <li>
                                            <i class="icon-danhmuc far fa-square"></i>
                                            <a href="">Short sleeve</a>
                                        </li>
                                        <li>
                                            <i class="icon-danhmuc far fa-square"></i>
                                            <a href="">Long sleeve</a>
                                        </li>
                                        <li>
                                            <i class="icon-danhmuc far fa-square"></i>
                                            <a href="">Sleeveless</a>
                                        </li>
                                    </ul>
								</div>			
								<hr>
								<div class="t_hieu">
									<h4 class="h4">Color</h4>
								    <div class="t_hieu-color">
                                        <button class="t_hieu-color-1">Color</button>
                                        <button class="t_hieu-color-2">Color</button>
                                        <button class="t_hieu-color-3">Color</button>
                                        <button class="t_hieu-color-4">Color</button>
                                    </div>
								</div>
							</div>
						</div>
						<div class="col l-9">
							<div class="row" id="sanpham">	
								<div class="col l-4" >
									<div class="home-product-item">
										<a href="">
											<img src="./assets/img/trend/hinh1.jfif" alt="" class="home-product-item_img">
										</a>
										<span class="home-product-item_name">Paris Saint-Germain Mens Fleece Trousers</span>
										<div class="home-product-item_price">
											<span class="home-product-item_price-old">999.000đ</span>
											<span class="home-product-item_price-current">538.000đ</span>
										</div>
									</div>
								</div>
							</div>		
							<div class="home-foward">
								<ul class="home-ul">
									<li class="ti-angle-left"></li>
									<div class="number-page" id="number-page">
											<li class="foward-btn">
												<a href="" >1</a>
											</li>
											<li>
												<a href="">2</a>
											</li>
											<li>
												<a href="">3</a>
											</li>
											<li>
												<a href="">4</a>
											</li>
											<li>
												<a href="">5</a>
											</li>
											<li>
												<a href="">...</a>
											</li>
									</div>
									<li class="ti-angle-right" onclick=""></li>
								</ul>
								
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
		// Phần footer
		<?php include './inc/footer.php'?>
	</section>
<script src="./assets/js/data.js"></script>
</body>
</html>