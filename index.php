<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Food on Click</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/focicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<?php
	include 'dbcontroller.php';
	// Start the session
	session_start();

	$table_id = base64_decode($_GET['table_id']);
	$_SESSION["table_id"] = $table_id;
	$query = "SELECT * FROM food_item";
?>


</head>
<body>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="./index.php" class="site-logo">
							<img src="img/logo.png" >
						</a>
					</div>
					<div class="col-lg-10 text-lg-right">
						<div class="user-panel">
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span>0</span>
								</div>
								<a href="./cart.html">Shopping Cart</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->

	<!-- Banner section -->
	<section class="banner-section">
		<div class="container">
			<div class="banner set-bg" data-setbg="img/banner-bg.jpg">
				<div class="tag-new">NEW</div>
				<span>New on Menu</span>
				<h2>Veg Kothe</h2>
				<a href="#" class="site-btn">ORDER NOW</a>
			</div>
		</div>
	</section>
	<!-- Banner section end  -->

	<!-- Product filter section -->
	<section class="product-filter-section">
		<div class="container">
			<div class="section-title">
				<h2>BROWSE TOP SELLING ITEMS</h2>
			</div>
			<ul class="product-filter-menu" id="category">
				<li value="0"><a >ALL</a></li>
				<li value=""><a >STARTERS</a></li>
				<li value=""><a >SOUP</a></li>
				<li value="2"><a >MAIN COURSE</a></li>
				<li value=""><a >BREADS</a></li>
				<li value=""><a >RICE</a></li>
				<li value=""><a >DESERT</a></li>
				<li value="1"><a >BEVRAGES</a></li>
			</ul>
			<div class="row" name="food_item" id="food_item">
				<?php 
					$result = Runquery($query);
					foreach ($result as $key => $value) {
				?>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<input type="hidden" name="">
							<img src="./img/products/<?php echo $value->food_id ?>.jpg" alt="">
							<div class="pi-links">
								<a class="add-card" onclick="addtocart(<?php echo $value->food_id ?>)"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<!-- <a href="#" class="add-card"><i class="pro-qty"><input type="text" value="1"></i></a> -->
								<a class="quantity" id="quantity<?php echo $value->food_id?>">
					                <i class="pro-qty">
										<input type="text" value="1">
									</i>
								</a>
							</div>
						</div>
						<div class="pi-text">
							<h6>₹ <?php echo strtoupper($value->price); ?> </h6>
							<p> <?php echo strtoupper($value->food_name); ?> </p>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<!-- Product filter section end -->


	<!-- Features section -->
	<section class="features-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="img/icons/1.png" alt="#">
						</div>
						<h2>Fast Secure Payments</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="img/icons/2.png" alt="#">
						</div>
						<h2>Excellent Service</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="img/icons/3.png" alt="#">
						</div>
						<h2>Best Taste</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Features section end -->

	<!-- Footer section -->
	<section class="footer-section">
		<p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by <a>Food on Click</a></p>
	</section>
	<!-- Footer section end -->

<!-- Modal -->
	<div id="myModal" class="modal hide fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Welcome to Food on Click</h4>
				</div>
				<div class="modal-body">
					<div class="pi-pic">
						<img src="./img/g64338.png" alt="">						
					</div>
					<p>Welcome You are at Table Number <?php echo $_SESSION["table_id"] ?></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal">Start Ordering</button>
				</div>
			</div>
		</div>
	</div>
<!-- Modal Ends -->

	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>

	<script type="text/javascript">
	    $(document).on('load',function(){
	        $('#myModal').modal('show');
	    });

	    $("#category li").click(function(){
			var a = $(this).attr("value");	
			alert(a);		
		});

	    function addtocart(b) {
	    	alert(b);
	    }

	</script>

	</body>
</html>
