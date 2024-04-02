@extends('layouts.backend')
@section('title')Edit New Information @endsection
@section('content')
<div class="row mt-4 ">
      <div class="col-lg-12">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Edit New Information</div>
           <hr>
            <form action="{{ route('backends.newinformation.update', $newinformation) }}" method="post" enctype='multipart/form-data'>
              @csrf
              @method('PUT')
              <div class="row">
                  <div class="col-lg-8">
                  
                  <div class="form-group mt-2">
                    <label for="title_cart">Title Cart</label>
                    <input type="text" class="form-control" value="{{ $newinformation->title_cart }}" name="title_cart" id="title_cart" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="short_desc">Short Description Cart</label>
                    <input type="text" class="form-control" value="{{ $newinformation->short_desc }}" name="short_desc" id="short_desc" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="title">Title Article</label>
                    <input type="text" class="form-control" value="{{ $newinformation->title }}" name="title" id="title" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="recent_1">Recent Post 1</label>
                    <input type="text" class="form-control" value="{{ $newinformation->recent_1 }}" name="recent_1" id="recent_1" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="recent_2">Recent Post 2</label>
                    <input type="text" class="form-control" value="{{ $newinformation->recent_2 }}" name="recent_2" id="recent_2" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="recent_3">Recent Post 3</label>
                    <input type="text" class="form-control" value="{{ $newinformation->recent_3 }}" name="recent_3" id="recent_3" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="recent_4">Recent Post 4</label>
                    <input type="text" class="form-control" value="{{ $newinformation->recent_4 }}" name="recent_4" id="recent_4" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="recent_5">Recent Post 5</label>
                    <input type="text" class="form-control" value="{{ $newinformation->recent_5 }}" name="recent_5" id="recent_5" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="archive_1">Archive Posts 1</label>
                    <input type="text" class="form-control" value="{{ $newinformation->archive_1 }}" name="archive_1" id="archive_1" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="archive_2">Archive Posts 2</label>
                    <input type="text" class="form-control" value="{{ $newinformation->archive_2 }}" name="archive_2" id="archive_2" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="archive_3">Archive Posts 3</label>
                    <input type="text" class="form-control" value="{{ $newinformation->archive_3 }}" name="archive_3" id="archive_3" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="archive_4">Archive Posts 4</label>
                    <input type="text" class="form-control" value="{{ $newinformation->archive_4 }}" name="archive_4" id="archive_4" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="archive_5">Archive Posts 5</label>
                    <input type="text" class="form-control" value="{{ $newinformation->archive_5 }}" name="archive_5" id="archive_5" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="desc">Description</label>
                    <textarea class="form-control" name="desc" id="desc" >{{ $newinformation->desc }}</textarea>
                  </div>

                  </div>
                  
                  <div class="col-lg-4">
                      <div class="form-group mt-3">
                  <label for="image">Image</label>
                  <input type="file" class="form-control" name="image" id="image" accept="image/png, image/gif, image/jpeg, image/webp">
                      <div class="mt-3">
                        <img src="{{ asset($newinformation->image) }}" alt="" width="80%">
                      </div>
                </div>
                  </div>

              </div>
           

           
           <div class="form-group mt-4">
            <button type="submit" class="btn btn-light px-4">Save</button>
            <a href="{{ route('backends.newinformation.index') }}" class="btn btn-light px-3">Back</a>
            
          </div>
          </form>
         </div>
         </div>
      </div>

@endsection