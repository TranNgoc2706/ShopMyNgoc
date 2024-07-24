<!-- Header -->

<header>
	@php $menusHtml = \App\Helpers\Helper::menus($menus); @endphp
	<!-- Header desktop -->
	<div class="container-menu-desktop">


		<div class="wrap-menu-desktop">
			<a href="#" class="logo">
				<img src="/template/images/icons/Logo.png" alt="IMG-LOGO">
			</a>
			<nav class="limiter-menu-desktop container">
				<!-- Menu desktop -->
				<div class="menu-desktop">
					<ul class="main-menu">
						<li class="active-menu"> <a href="/">HOME</a></li>
						{!! $menusHtml!!}
						<li>
							<a href="/contact">CONTACT US</a>
						</li>
					</ul>

				</div>
				<!-- Icon header -->
				<div class="wrap-icon-header flex-w flex-r-m m-r-15">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0}}">
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>

					<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 ">
						<a href="/admin/users/login">
							<i class="fa-solid fa-user"></i>
						</a>
					</div>
				</div>
			</nav>
		</div>
	</div>
	<!-- Header Mobile -->
	<div class="wrap-header-mobile">
		<!-- Logo moblie -->
		<div class="logo-mobile">
			<a href="#"><img src="/template/images/icons/Logo.png" alt="IMG-LOGO"></a>
		</div>

		<!-- Icon header -->
		<div class="wrap-icon-header flex-w flex-r-m m-r-15">

			<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0}}">
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>

			<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 ">
				<a href="/admin/users/login">
					<i class="fa-solid fa-user"></i>
				</a>
			</div>

		</div>

		<!-- Button show menu -->
		<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</div>
	</div>


	<!-- Menu Mobile -->
	<div class="menu-mobile">
		<ul class="main-menu">
			<li class="active-menu"> <a href="/">HOME</a></li>
			{!! $menusHtml!!}
			<li>
				<a href="/contact">CONTACT US</a>
			</li>
		</ul>
	</div>

</header>