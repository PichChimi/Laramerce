@extends('layouts.backend')
@section('title') Product Detail @endsection
@section('content')
<div class="row mt-4 ">
      <div class="col-lg-12">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Product Detail</div>
           <hr>
            <form action="#" method="post" enctype='multipart/form-data'>
              @csrf
              <div class="row">
                  <div class="col-lg-8">

                  <div class="form-group mt-2">
                    <label for="category_id">Category</label>
                    <input type="text" class="form-control" value="{{ $product->category->title }}" name="category_id" id="category_id" readonly>
                  </div>

                  <div class="form-group mt-2">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="{{ $product->name }}" name="name" id="name" readonly>
                  </div>

                  <div class="form-group mt-2">
                    <label for="unit_price">Unit Price</label>
                    <input type="text" class="form-control" value="{{ $product->unit_price }}" name="unit_price" id="unit_price" readonly>
                  </div>

                  <div class="form-group mt-2">
                    <label for="qty_in_stock">Quentity In Stock</label>
                    <input type="text" class="form-control" value="{{ $product->qty_in_stock }}"  name="qty_in_stock" id="qty_in_stock" readonly>
                  </div>

                  <div class="form-group mt-2">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" readonly>{{ $product->description }}</textarea>
                  </div>

                  </div>
                  
                  <div class="col-lg-4">
                      <div class="form-group mt-2">
                  <h5 for="title">Image</h5>
                  <img src="{{ asset($product->image_url) }}" alt="" width="60%">
                </div>
                  </div>

                  

              </div>
           

           
           <div class="form-group mt-4">
            <a href="{{ route('backends.products.index') }}" class="btn btn-light px-3">Back</a>
            
          </div>
          </form>
         </div>
         </div>
      </div>

@endsection