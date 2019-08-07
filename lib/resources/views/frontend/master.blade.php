<!DOCTYPE html>
<html>
<head>
	<base href="{{asset('public/layout/frontend')}}/">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="css/category.css">
	<link rel="stylesheet" href="css/details.css">
	<link rel="stylesheet" href="css/search.css">
	<link rel="stylesheet" href="css/cart.css">
	<link rel="stylesheet" href="css/email.css">
	<link rel="stylesheet" href="css/complete.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<!-- header -->
	<header id="header">
		<div class="container">
			<div class="row">
				<div id="logo" class="col-md-3 col-sm-12 col-xs-12">
					<h1>
						<a href="{{asset('/')}}"><img src="img/home/logo.png"></a>
						<nav>
							<a id="pull" class="btn btn-danger" href="#"><i class="fa fa-bars"></i></a>
						</nav>
					</h1>
				</div>
				<div id="search" class="col-md-7 col-sm-12 col-xs-12">
					<form action="{{asset('search/')}}" role="search" method="get">
						<input type="text" name="result" placeholder="Nhập từ khóa ...">
						<input type="submit" value="Search">
					</form>
				</div>
				<div id="cart" class="col-md-2 col-sm-12 col-xs-12">
					<a class="display" href="{{asset('cart/show')}}">Giỏ hàng</a>
					<a href="{{asset('cart/show')}}">{{Cart::count()}}</a>
				</div>
			</div>
		</div>
	</header><!-- /header -->
	<!-- endheader -->
	<!-- main -->
	<section id="body">
		<div class="container">
			<div class="row">
				<div id="sidebar" class="col-md-3">
					<nav id="menu">
						<ul>
							<li class="menu-item">danh mục sản phẩm</li>
							@foreach($categories as $cate)
							<li class="menu-item"><a
									href="{{asset('category/'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}"
									title="">{{$cate->cate_name}}</a></li>
							@endforeach
						</ul>
						<!-- <a href="#" id="pull">Danh mục</a> -->
					</nav>
					<div id="banner-l" class="text-center">
						<div class="banner-l-item">
							<a href="#"><img src="img/home/banner-l-1.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/banner-l-2.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/banner-l-3.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/banner-l-4.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/banner-l-5.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/banner-l-6.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/banner-l-7.png" alt="" class="img-thumbnail"></a>
						</div>
					</div>
				</div>
				<div id="main" class="col-md-9">
					<!-- main -->
					<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
					<div id="slider">
						<div id="demo" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="active"></li>
								<li data-target="#demo" data-slide-to="1"></li>
								<li data-target="#demo" data-slide-to="2"></li>
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="img/home/slide-1.png" alt="Los Angeles">
								</div>
								<div class="carousel-item">
									<img src="img/home/slide-2.png" alt="Chicago">
								</div>
								<div class="carousel-item">
									<img src="img/home/slide-3.png" alt="New York">
								</div>
							</div>

							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					</div>

					<div id="banner-t" class="text-center">
						<div class="row">
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
							</div>
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
							</div>
						</div>
					</div>
					@yield('main')
					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
	<!-- endmain -->
	<!-- footer -->
	<footer id="footer">
		<div id="footer-t">
			<div class="container">
				<div class="row">
					<div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">
						<a href="{{asset('/')}}"><img src="img/home/logo.png"></a>
					</div>
					<div id="about" class="col-md-3 col-sm-12 col-xs-12">
						<h3>About us</h3>
						<p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
							Nemo reprehenderit unde alias provident ratione error eius quam debitis, natus veniam ullam illo dolore non odio! 
							Numquam illum ut architecto illo.</p>
					</div>
					<div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Hotline</h3>
						<p>Phone Sale: (+84) 0357 188 134</p>
						<p>Email: nguyenlethanhcong.10k13@gmail.com</p>
					</div>
					<div id="contact" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Contact Us</h3>
						<p>Address 1: Phường Phước Long B, Quận 9, TP. HCM</p>
						<p>Address 2: 56/26/3/2 Lê Lợi, TP. Phan Rang - Tháp Chàm, tỉnh Ninh Thuận</p>
					</div>
				</div>
			</div>
			<div id="footer-b">
				<div class="container">
					<p style="text-align: center;">© 2019 Nguyễn Lê Thành Công - 17211TT1345 | FIT - TDC</p>
				</div>
				<div id="scroll">
					<a href="{{asset('/')}}"><img src="img/home/scroll.png"></a>
				</div>
			</div>
		</div>
	</footer>
	<!-- endfooter -->
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(function () {
			var pull = $('#pull');
			menu = $('nav ul');
			menuHeight = menu.height();

			$(pull).on('click', function (e) {
				e.preventDefault();
				menu.slideToggle();
			});
		});
		$(window).resize(function () {
			var w = $(window).width();
			if (w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	</script>
</body>
</html>