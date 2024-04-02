@extends('layouts.backend')
@section('title') Create Our Team @endsection
@section('content')
<div class="row mt-4 ">
      <div class="col-lg-12">
         <div class="card">
           <div class="card-body">
           <div class="card-title">New Our Team</div>
           <hr>
            <form action="{{ route('backends.about.store') }}" method="post" enctype='multipart/form-data'>
              @csrf
              <div class="row">
                  <div class="col-lg-8">
  
                  <div class="form-group mt-2">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="position">Position</label>
                    <input type="text" class="form-control" name="position" id="position" >
                  </div>

                  </div>
                  
                  <div class="col-lg-4">
                      <div class="form-group mt-2">
                  <label for="image">Image</label>
                  <input type="file" class="form-control" name="image" id="image" accept="image/png, image/gif, image/jpeg, image/webp">
                </div>
                  </div>

              </div>
          
           <div class="form-group mt-4">
            <button type="submit" class="btn btn-light px-4">Save</button>
            <a href="{{ route('backends.about.index') }}" class="btn btn-light px-3">Back</a>
            
          </div>
          </form>
         </div>
         </div>
      </div>

@endsection