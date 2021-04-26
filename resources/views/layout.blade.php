<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{{$meta_desc}}">
	<!-- Seo -->
	<meta name="keywords" content="{{$meta_keywords}}" />
	<meta name="robots" content="Index,Follow" />
	<meta name="author" content="">
	<title>{{$meta_title}}</title>
	<link rel="canonical" href="{{$url}}" />
	<link rel="icon" type="image/x-icon" href="https://www.thol.com.vn/pub/media/favicon/stores/5/favicon.png" />


	<meta property="og:site_name" content="http://localhost/shopbanhanglaravel" />
	<meta property="og:description" content="{{$meta_desc}}" />
	<meta property="og:title" content="{{$meta_title}}" />
	<meta property="og:url" content="{{$url}}" />
	<meta property="og:type" content="website" />



	<!-- seo -->
	<link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="{{('public/frontend/images/ico/favicon.ico')}}">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>

	<header id="header">
		<!--header-->
		<div class="header_top" style="color:red">
			<!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> HOTLINE:0395927599</a></li>
								<li><a href="#"> <i class="fa fa-envelope"></i> Email:thanhdd300599@gmail.com</a></li>
								<li><a href="#"> <i class="fa fa-location-arrow"></i> Find The Nearest Store</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/header_top-->

		<div class="header-middle">
			<!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="col-sm-6">
							<img src="{{('public/frontend/images/logo2.jpg')}}" class="girl img-responsive" alt="" />
						</div>
					</div>
					<div class="col-sm-8">
						<li class="btn nav-btn animated-linear-gradient"><a style="color:white" href="{{URL::to('/admin')}}"><i class="fa fa-star" style="color:white"></i> Admin</a></li>
						<?php
						$customer_id = Session::get('customer_id');
						$shipping_id = Session::get('shipping_id');
						if ($customer_id != null && $shipping_id == null) {
						?>
							<li class="btn nav-btn animated-linear-gradient">

								<a style="color:white" href="{{URL::to('/checkout')}}"><i style="color:white" class="fa fa-crosshairs"></i> Checkout</a>

							</li>

						<?php

						} elseif ($customer_id != null && $shipping_id != null) {
						?>
							<li class="btn nav-btn animated-linear-gradient"><a style="color:white" href="{{URL::to('/payment')}}"><i style="color:white" class="fa fa-crosshairs"></i> Checkout</a></li>
						<?php
						} else {
						?>
							<li class="btn nav-btn animated-linear-gradient"><a style="color:white" href="{{URL::to('/login-checkout')}}"><i style="color:white" class="fa fa-crosshairs"></i> Checkout</a></li>
						<?php
						}
						?>


						<li class="btn nav-btn animated-linear-gradient"><a style="color:white" href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
						<?php
						$customer_id = Session::get('customer_id');
						if ($customer_id != null) {
						?>
							<li class="btn nav-btn animated-linear-gradient"><a style="color:white" href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Logout</a></li>
						<?php

						} else {
						?>
							<li class="btn nav-btn animated-linear-gradient"><a style="color:white" href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Login</a></li>
						<?php
						}
						?>

					</div>
				</div>
			</div>
		</div>
		<!--/header-middle-->

		<div class="header-bottom">
			<!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">

						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/homepage')}}" class="active dropdown"> <i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
								<li class="dropdown"><a href="#"> <i class="fa fa-laptop" aria-hidden="true"></i>Product</a>
								</li>
								<li class="dropdown"><a href="#"><i class="fa fa-rss" aria-hidden="true"></i> Tech news</a>
								</li>
								<li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>



								<?php
								$customer_id = Session::get('customer_id');
								$shipping_id = Session::get('shipping_id');
								if ($customer_id != null && $shipping_id == null) {
								?>
									<li class="btn nav-btn animated-linear-gradient">

									<li><a href="{{URL::to('/checkout')}}"> <i class="fa fa-crosshairs"></i> Checkout</a></li>

									</li>

								<?php

								} elseif ($customer_id != null && $shipping_id != null) {
								?>
									<li><a href="{{URL::to('/payment')}}"> <i class="fa fa-crosshairs"></i> Checkout</a></li>

								<?php
								} else {
								?>
									<li><a href="{{URL::to('/login-checkout')}}"> <i class="fa fa-crosshairs"></i> Checkout</a></li>

								<?php
								}
								?>
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="search_box pull-right">
							<form action="{{URL::to('/search')}}" method="post">
								{{csrf_field()}}
								<input type="text" name="keywords_submit" placeholder="Search Product" />
								<input type="submit" name="search_items" class="btn btn-info btn-sm" value="Search" />
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/header-bottom-->
	</header>
	<!--/header-->

	<section id="slider">
		<!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1 style="color:red"><span style="color:black">Ting-Ting</span>-Gaming</h1>
									<h2>The Happiest Place On Earth</h2>
									<p>The quality of the products gives you peace of mind when using them. </p>

								</div>
								<div class="col-sm-6">
									<img src="{{('public/frontend/images/slide1.jpg')}}" class="girl img-responsive" alt="" />
									<img src="{{('public/frontend/images/pricing.jpg')}}" class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1 style="color:red"><span style="color:black">Ting-Ting</span>-Gaming</h1>
									<h2>The Happiest Place On Earth</h2>
									<p>The quality of the products gives you peace of mind when using them. </p>

								</div>
								<div class="col-sm-6">
									<img src="{{('public/frontend/images/slide2.jpg')}}" class="girl img-responsive" alt="" />
									<img src="{{('public/frontend/images/pricing.jpg')}}" class="pricing" alt="" />
								</div>
							</div>

							<div class="item">
								<div class="col-sm-6">
									<h1 style="color:red"><span style="color:black">Ting-Ting</span>-Gaming</h1>
									<h2>The Happiest Place On Earth</h2>
									<p>The quality of the products gives you peace of mind when using them. </p>

								</div>
								<div class="col-sm-6">
									<img src="{{('public/frontend/images/slide3.jpg')}}" class="girl img-responsive" alt="" />
									<img src="{{('public/frontend/images/pricing.jpg')}}" class="pricing" alt="" />
								</div>
							</div>

						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!--/slider-->

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">

					<div class="left-sidebar">
						<h2>PRODUCT CATEGORY</h2>
						<div class="panel-group category-products" id="accordian">
							@foreach($category as $key => $cate)

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
								</div>

							</div>
							@endforeach

						</div>
						<!--/category-products-->

						<div class="brands_products">
							<!--brands_products-->
							<h2>PRODUCT BRANDS</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									@foreach($brand as $key => $brand)
									<li class="nav-left-2"><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}"> <span class="pull-right"></span>{{$brand->brand_name}}</a></li>
									@endforeach
								</ul>
							</div>
						</div>


					</div>
				</div>

				<div class="col-sm-9 padding-right">
					@yield('content')
				</div>
				<div class="fb-comments" data-href="{{$url}}" data-width="" data-numposts="10"></div>
			</div>
		</div>
	</section>

	<footer id="footer">
		<!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="companyinfo">
							<h2 style="color:red"><span style=" color:black">Ting-Ting</span>-Gaming</h2>
							<p>The Happiest Place On Earth</p>
						</div>
					</div>
					<div class="fb-page" data-href="https://www.facebook.com/vietxuecomputer" data-tabs="message" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
						<blockquote cite="https://www.facebook.com/vietxuecomputer" class="fb-xfbml-parse-ignore">
							<a href="https://www.facebook.com/vietxuecomputer">XUÊ PC Store</a>
						</blockquote>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="address">
						<img src="images/home/map.png" alt="" />
						<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
					</div>
				</div>
			</div>
		</div>
		</div>

		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>
								INFORMATION
							</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Information</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Ting Ting Gaming</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#"> Information</a></li>
								
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">


				</div>
			</div>
		</div>

	</footer>
	<!--/Footer-->



	<script src="{{asset('public/frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{asset('public/frontend/js/main.js')}}"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0" nonce="HPqiZfj4"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.add-to-cart').click(function() {
				var id = $(this).data('id');
				var cart_product_id = $('.cart_product_id_' + id).val();
				var cart_product_name = $('.cart_product_name_' + id).val();
				var cart_product_image = $('.cart_product_image_' + id).val();
				var cart_product_price = $('.cart_product_price_' + id).val();
				var cart_product_qty = $('.cart_product_qty_' + id).val();
				var _token = $('input[name="_token"]').val();

				$.ajax({

					url: '{{url(' / add - cart - ajax ')}}',
					data: {
						cart_product_id: cart_product_id,
						cart_product_name: cart_product_name,
						cart_product_image: cart_product_image,
						cart_product_price: cart_product_price,
						cart_product_qty: cart_product_qty,
						_token: _token
					},
					success: function(data) {
						alert(data);
					}




				});

			})

		});
	</script>
</body>

</html>