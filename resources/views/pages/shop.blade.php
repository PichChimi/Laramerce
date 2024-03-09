@extends('layouts.app')

@section('title') Shop @endsection

@section('label') Fresh and Organic @endsection

@section('titlemenu') Shop @endsection

@section('content')
        <!-- products -->
        <div class="product-section mt-150 mb-150">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="product-filters">
                            <ul>
                                <li class="active" href="#tab-category-all">All</li>
                                @foreach($categories as $category)
                                    <li data-filter=".{{ $category->title }}">{{ $category->title }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            <div class="row product-lists">
            @foreach($categories as $category)
            <div class="col-lg-4 col-md-6 text-center {{ $category->title }}">
                @foreach($category->product as $product)
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="single-product.html"><img src="{{ asset($product->image_url) }}" alt=""></a>
                        </div>
                        <h3>{{ $product->name }}</h3>
                        <p class="product-price"><span>Per Kg</span> {{ $product->unit_price }}$ </p>
                        <form id="frmCart{{ $product->id }}" action="{{ route('carts.store', $product) }}" method="post">
                        @csrf
                        </form>
                        <a href="#" onclick="document.getElementById('frmCart{{ $product->id }}').submit(); " class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                @endforeach
            </div>
            @endforeach

        
            </div>

                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="pagination-wrap">
                            <ul>
                                <li><a href="#">Prev</a></li>
                                <li><a href="#">1</a></li>
                                <li><a class="active" href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end products -->

        <!-- logo carousel -->
        <div class="logo-carousel-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="logo-carousel-inner">
                            <div class="single-logo-item">
                                <img src="assets/img/company-logos/1.png" alt="">
                            </div>
                            <div class="single-logo-item">
                                <img src="assets/img/company-logos/2.png" alt="">
                            </div>
                            <div class="single-logo-item">
                                <img src="assets/img/company-logos/3.png" alt="">
                            </div>
                            <div class="single-logo-item">
                                <img src="assets/img/company-logos/4.png" alt="">
                            </div>
                            <div class="single-logo-item">
                                <img src="assets/img/company-logos/5.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end logo carousel -->
@endsection