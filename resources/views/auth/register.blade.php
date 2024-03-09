@extends('layouts.authentication')
@section('title') Register @endsection
@section('content')

<!-- start loader -->
<div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->
<div id="wrapper">

	<div class="card card-authentication1 mx-auto my-4">
		<div class="card-body">
		 <div class="card-content p-2">
		 	<div class="text-center">
		 		<img src="{{ asset('dashboard/assets/images/logo-icon.png') }}" alt="logo icon">
		 	</div>
		  <div class="card-title text-uppercase text-center py-3">{{ __('Register') }}</div>
           <form method="POST" action="{{ route('register') }}">
                @csrf
			  <div class="form-group">
			  <label for="name" class="sr-only">{{ __('Name') }}</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus class="form-control input-shadow" placeholder="Enter Your Name">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			  <label for="email" class="sr-only">{{ __('Email Address') }}</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control input-shadow" required autocomplete="email" autofocus placeholder="Enter Your Email ID">
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
				  <div class="form-control-position">
					  <i class="icon-envelope-open"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			   <label for="password" class="sr-only">{{ __('Password') }}</label>
			   <div class="position-relative has-icon-right">
				  <input type="password" id="password" name="password"  class="form-control input-shadow" required autocomplete="new-password" placeholder="Choose Password">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>

              <div class="form-group">
			   <label for="password-confirm" class="sr-only">{{ __('Confirm Password') }}</label>
			   <div class="position-relative has-icon-right">
				  <input type="password" id="password-confirm" name="password_confirmation" required autocomplete="new-password"  class="form-control input-shadow">
                 
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			  
			   <div class="form-group">
			     <div class="icheck-material-white">
                   <input type="checkbox" id="user-checkbox" checked="" />
                   <label for="user-checkbox">I Agree With Terms & Conditions</label>
			     </div>
			    </div>
			  
			 <button type="submit" class="btn btn-light btn-block waves-effect waves-light">Sign Up</button>
			 
			 </form>
		   </div>
		  </div>
		  <div class="card-footer text-center py-3">
		    <p class="text-warning mb-0">Already have an account? <a href="{{ route('login') }}"> Sign In here</a></p>
		  </div>
	     </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
		<li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
      
     </div>
   </div>
  <!--end color switcher-->
	
	</div>
@endsection
