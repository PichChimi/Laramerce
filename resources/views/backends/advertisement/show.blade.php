@extends('layouts.backend')
@section('title') Detail Advertisements @endsection
@section('content')
<div class="row mt-4 ">
      <div class="col-lg-12">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Detail Advertisements</div>
           <hr>
            <form action="#" method="post" enctype='multipart/form-data'>
              @csrf
              <div class="row">
                  <div class="col-lg-8">

                  
                  <div class="form-group mt-2">
                    <label for="year">Since Year</label>
                    <input type="text" class="form-control" value="{{ $advertisement->year }}" name="year" id="year" readonly>
                  </div>

                  <div class="form-group mt-2">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" value="{{ $advertisement->title }}" name="title" id="title" readonly>
                  </div>

                  <div class="form-group mt-2">
                    <label for="short_desc">Description</label>
                    <textarea class="form-control" name="short_desc" id="short_desc" readonly>{{ $advertisement->short_desc }}</textarea>
                  </div>

                  <div class="form-group mt-2">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="desc" id="desc" readonly>{{ $advertisement->desc }}</textarea>
                  </div>

                  </div>
                  
                  <div class="col-lg-4">
                      <div class="form-group mt-2">
                  <h5 for="image">Image</h5>
                  <img src="{{ asset($advertisement->image) }}" alt="" width="60%">
                </div>
                  </div>

                  

              </div>
           

           
           <div class="form-group mt-4">
            <a href="{{ route('backends.advertisement.index') }}" class="btn btn-light px-3">Back</a>
            
          </div>
          </form>
         </div>
         </div>
      </div>

@endsection