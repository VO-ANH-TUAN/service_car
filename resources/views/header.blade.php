@php $menusHtml = \App\Helpers\Helper::menus($menus); @endphp

@php
    if(is_null(Session::get('carts'))) { $productQuantity = 0; }
    else $productQuantity = count(Session::get('carts'));
@endphp
<header>
		<!-- Header desktop -->

		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar" style="background: black!important;">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar ">
					Chào mừng bạn đến với T3DK
					</div>

					<div class="right-top-bar flex-w h-full">
                        <a href="{{route('login')}}" class="flex-c-m trans-04 p-lr-25">
                            Login Admin
                        </a>
						<a href="mailto:voanhtuan00001@gmail.com" class="flex-c-m trans-04 p-lr-25">
							voanhtuan00001.gmail.com
						</a>
						<a href="tel:0577666888" class="flex-c-m trans-04 p-lr-25">
							0577 666 888
						</a>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
<style>
    .logo p {
        color: red;
        font-size: 40px;
        font-weight: bold;
    }
    .logo p:hover{
        color: green;
        font-size: 45px;
    }
</style>
					<!-- Logo desktop -->
					<a href="#" class="logo">
{{--						<img src="{{asset('public/template/images/icons/logo.png')}}" alt="IMG-LOGO" style="border: 5px solid green">--}}
				        <p>T3DK</p>
					</a>
					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu" style="color:black;font-family:Georgia;font-weight:bold;">
							<li class="active-menu" >
                                <a href="/" style="color:black;">Trang chủ</a></li>
                            <li>
                                <a href="http://rentcar.com" class="a1" style="color:green;font-size:large;">Thuê xe</a>
                            </li>

                                {!!$menusHtml!!}
                            <li>
                                <a href="new">Tin tức</a>
                            </li>
							<li>
								<a href="about">Về chúng tôi</a>
							</li>

							<li>
								<a href="contact">Liên Hệ</a>
							</li>

						</ul>
					</div>

					<!-- Icon header -->
					<div class="wrap-icon-header flex flex-r-m" >
                        <form action="/search">
                        <div class="input-group" >
                            <input type="search" name ="query"class="form-control rounded" placeholder="Tìm kiếm" aria-label="Search" aria-describedby="search-addon" />
                            <button type="submit" class="btn btn-outline-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                        </form>
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{ $productQuantity  }}">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>

{{--						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">--}}{{-- {{!is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}--}}
{{--							<i class="zmdi zmdi-search"></i>--}}
{{--						</div>--}}




					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="#"><img src="{{asset('public/template/images/icons/logo.png')}}" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{!is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}">
					<i class="zmdi zmdi-shopping-cart"></i>
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
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
                    Chào mừng bạn đến với T3DK
					</div>
				</li>
			</ul>

			<ul class="main-menu-m" style="color:black;font-family:Georgia;font-weight:bold;">
				<li>
					<a href="/">Trang chủ</a></li>
                    {!!$menusHtml!!}
                <li>
                    <a href="new">Tin tức</a>
                </li>
                <li>
                    <a href="about">Về chúng tôi</a>
                </li>

                <li>
                    <a href="contact">Liên Hệ</a>
                </li>
                <li>
                    <a href="http://rentcar.com">Thuê xe</a>
                </li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="{{asset('public/template/images/icons/icon-close2.png')}}" alt="CLOSE">
				</button>

                <form action="/search">
                    <div class="input-group" >
                        <input type="search" name ="query"class="form-control rounded" placeholder="Tìm kiếm" aria-label="Search" aria-describedby="search-addon" />
                        <button type="submit" class="btn btn-outline-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </form>
			</div>
		</div>
	</header>
