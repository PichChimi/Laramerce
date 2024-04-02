@extends('layouts.backend')
@section('title') Create Advertisement @endsection
@section('content')
<div class="row mt-4 ">
      <div class="col-lg-12">
         <div class="card">
           <div class="card-body">
           <div class="card-title">New Advertisement</div>
           <hr>
            <form action="{{ route('backends.advertisement.store') }}" method="post" enctype='multipart/form-data'>
              @csrf
              <div class="row">
                  <div class="col-lg-8">
  
                  <div class="form-group mt-2">
                    <label for="year">Since Year</label>
                    <input type="text" class="form-control" name="year" id="year" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="short_desc">Short Description</label>
                    <textarea  class="form-control" name="short_desc" id="short_desc"></textarea>
                  </div>

                  <div class="form-group mt-2">
                    <label for="desc">Description</label>
                    <textarea class="form-control" name="desc" id="desc"></textarea>
                  </div>

                  </div>
                  
                  <div class="col-lg-4">
                      <div class="form-group mt-2">
                  <label for="title">Image</label>
                  <input type="file" class="form-control" name="image" id="image" accept="image/png, image/gif, image/jpeg, image/webp">
                </div>
                  </div>

              </div>
          
           <div class="form-group mt-4">
            <button type="submit" class="btn btn-light px-4">Save</button>
            <a href="{{ route('backends.advertisement.index') }}" class="btn btn-light px-3">Back</a>
            
          </div>
          </form>
         </div>
         </div>
      </div>

@endsection