@extends('layouts.app')

@section('title') Cart @endsection

@section('label') Fresh and Organic @endsection

@section('titlemenu') Cart @endsection

@section('content')
<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
                                @if($carts->isEmpty())
                                    <td>This not recort.</td>
                                @else
                                   @foreach($carts as $cart)
                                    <tr class="table-body-row">
                                        <td class="product-remove">
											<form action="{{ route('carts.destory', $cart) }}" method="POST">
											 @csrf
											 @method('DELETE')
											    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')" ><i class="far fa-window-close"></i></button>
											</form>
										</td>
                                        <td class="product-image"><img src="{{ asset($cart->product->image_url) }}" alt=""></td>
                                        <td class="product-name">{{ $cart->product->name }}</td>
                                        <td class="product-price">${{  $cart->product->unit_price }}</td>
                                        <td class="product-quantity">
											<form action="{{ route('carts.updateQty', $cart) }}" method="post">
											@csrf
											@method('PUT')
											<input type="hidden" name="Qty" value="{{ $cart->qty - 1 }}">
											<button type="submit" class="btn btn-sm rounded-circle bg-light border" >
												<i class="fa fa-minus"></i>
											</button>
											</form>

											 <input type="text" class="text-center border-0" value="{{ $cart->qty }}">
											 <form action="{{ route('carts.updateQty', $cart) }}" method="post">
												@csrf
												@method('PUT')
												<input type="hidden" name="Qty" value="{{ $cart->qty + 1 }}">
											 <button type="submit" class="btn btn-sm rounded-circle bg-light border">
                                                    <i class="fa fa-plus"></i>
                                             </button>
											</form>
										 
										</td>
                                        <td class="product-total">${{ $cart->total }}</td>
                                    </tr>
                                    @endforeach
                                @endif
								
							
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td>${{ $subtotal }}</td>
								</tr>
								<!-- <tr class="total-data">
									<td><strong>Shipping: </strong></td>
									<td>$45</td>
								</tr> -->
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>${{ $total }}</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
						<form action="{{ route('orders.store') }}" method="POST">
						  @csrf
						   <button type="submit" class="btn btn-warning boxed-btn black">Check Out</button>
							<!-- <a href="" class="boxed-btn black">Check Out</a> -->
						</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection