@extends('layouts.app')

@section('title') Payment-Success @endsection

@section('label') Payment - Success @endsection

@section('titlemenu') Payment @endsection

@section('content')
      <!-- featured section -->
	<div class="feature-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<div class="featured-text">
						<h2 class="pb-3">Payment <span class="orange-text">Success</span></h2>
						<div class="row">
						
							<div class="col-lg-6 col-md-6 mb-5 mb-md-5">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-money-bill-alt"></i>
									</div>
									<div class="content">
										<h3>Thanks you</h3>
										<p>Thanks for you order You have just complited your payment.The seeler will reach out to you as soon as posible.</p>
										<a href="{{ route('page.index') }}" class="cart-btn mt-4">Back</a>
									</div>
								</div>
							</div>
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end featured section -->

@endsection