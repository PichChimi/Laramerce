<!--PreLoader-->
<div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="{{ route('page.index') }}">
								<img src="{{ asset('assets/img/logo.png') }}" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="{{ route('page.index') }}">Home</a></li>
								<li><a href="{{ route('page.about') }}">About</a></li>
								<li><a href="{{ route('page.contact') }}">Contact</a></li>
								<li><a href="{{ route('page.shop') }}">Shop</a>								</li>
								<li>
								<div class="header-icons">
								<a class="shopping-cart" href="{{ route('carts.index') }}"><i class="fas fa-shopping-cart"></i>
									@if($qtyadd > 0)
										<sup>{{ $qtyadd }}</sup>
									@else
									<sup> 0</sup>
									@endif
							   </a>
								@if(Auth::id())

						
	                         <a href="{{ route('backends.dashboard') }}"><span class="user-profile"><img src="@if(Auth::id()) {{ asset(Auth::user()->profile) }} @endif" class="img-circle" alt="user avatar"></span></a>
                                    {{-- <a href="{{ route('backends.dashboard') }}">{{ Auth::user()->name }}</a> --}}
									<a href="#" onclick = "logoutUser()"><i class="fas fa-sign-out-alt"></i></i></a>
									<form id="frmLogout" action="{{ route('logout') }}" method="POST">
                                       @csrf
									</form>
									<script>
										function logoutUser(){
                                            if(confirm('Are you syre?')){
												document.getElementById('frmLogout').submit();
											}
										}
									</script>
									 
								@else
									<a class="" href="{{ route('login') }}"><i class="fas fa-user"></i></i></a>
								@endif
								</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
	
	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->