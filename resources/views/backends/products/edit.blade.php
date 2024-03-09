@extends('layouts.backend')
@section('title') Edit Product @endsection
@section('content')
<div class="row mt-4 ">
      <div class="col-lg-12">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Edit Product</div>
           <hr>
            <form action="{{ route('backends.products.update',$product ) }}" method="post" enctype='multipart/form-data'>
              @csrf
              @method('PUT')
              <div class="row">
                  <div class="col-lg-8">
                          <div class="form-group mt-2">
                    <label for="category_id">Category</label>
                    <select  class="form-control" name="category_id" id="category_id">
                        <option value="">--------- Choose Category ---------</option>
                        @foreach($categories as $id => $title)
                        <option @if($product->category_id === $id) selected @endif value="{{ $id }}">{{ $title }}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group mt-2">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="{{ $product->name }}" name="name" id="name" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="unit_price">Unit Price</label>
                    <input type="text" class="form-control" value="{{ $product->unit_price }}" name="unit_price" id="unit_price" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="qty_in_stock">Quentity In Stock</label>
                    <input type="text" class="form-control" value="{{ $product->qty_in_stock }}"  name="qty_in_stock" id="qty_in_stock" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description">{{ $product->description }}</textarea>
                  </div>

                  </div>
                  
                  <div class="col-lg-4">
                      <div class="form-group mt-2">
                  <label for="title">Image</label>
                  <input type="file" class="form-control" name="image_url" id="image_url" accept="image/png, image/gif, image/jpeg, image/webp">
                </div>

                <div class="mt-4">
                    <img src="{{ asset($product->image_url) }}" alt="" width="60%">
                  </div>

                  </div>

                  

              </div>
           

           
           <div class="form-group mt-4">
            <button type="submit" class="btn btn-light px-4">Save</button>
            <a href="{{ route('backends.products.index') }}" class="btn btn-light px-3">Back</a>
            
          </div>
          </form>
         </div>
         </div>
      </div>

@endsection