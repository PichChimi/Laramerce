@extends('layouts.backend')
@section('title') Create Category @endsection
@section('content')
<div class="row mt-4 d-flex justify-content-center">
      <div class="col-lg-10">
         <div class="card">
           <div class="card-body">
           <div class="card-title">New Category</div>
           <hr>
            <form action="{{ route('backends.categories.store') }}" method="post">
              @csrf
           <div class="form-group mt-2">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Category">
           </div>
           
           <div class="form-group mt-4">
            <button type="submit" class="btn btn-light px-4">Save</button>
            <a href="{{ route('backends.categories.index') }}" class="btn btn-light px-3">Back</a>
            
          </div>
          </form>
         </div>
         </div>
      </div>

@endsection