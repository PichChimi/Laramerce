@extends('layouts.backend')
@section('title') Create New Information @endsection
@section('content')
<div class="row mt-4 ">
      <div class="col-lg-12">
         <div class="card">
           <div class="card-body">
           <div class="card-title">New Information</div>
           <hr>
            <form action="{{ route('backends.newinformation.store') }}" method="post" enctype='multipart/form-data'>
              @csrf
               <input type="hidden" class="form-control" value="{{ Auth::id() }}" name="user_id" id="name" >
              <div class="row">
                  <div class="col-lg-8">
                  
                  <div class="form-group mt-2">
                    <label for="title_cart">Title Cart</label>
                    <input type="text" class="form-control" name="title_cart" id="title_cart" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="short_desc">Short Description Cart</label>
                    <input type="text" class="form-control" name="short_desc" id="short_desc" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="title">Title Article</label>
                    <input type="text" class="form-control" name="title" id="title" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="recent_1">Recent Post 1</label>
                    <input type="text" class="form-control" name="recent_1" id="recent_1" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="recent_2">Recent Post 2</label>
                    <input type="text" class="form-control" name="recent_2" id="recent_2" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="recent_3">Recent Post 3</label>
                    <input type="text" class="form-control" name="recent_3" id="recent_3" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="recent_4">Recent Post 4</label>
                    <input type="text" class="form-control" name="recent_4" id="recent_4" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="recent_5">Recent Post 5</label>
                    <input type="text" class="form-control" name="recent_5" id="recent_5" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="archive_1">Archive Posts 1</label>
                    <input type="text" class="form-control" name="archive_1" id="archive_1" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="archive_2">Archive Posts 2</label>
                    <input type="text" class="form-control" name="archive_2" id="archive_2" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="archive_3">Archive Posts 3</label>
                    <input type="text" class="form-control" name="archive_3" id="archive_3" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="archive_4">Archive Posts 4</label>
                    <input type="text" class="form-control" name="archive_4" id="archive_4" >
                  </div>

                  <div class="form-group mt-2">
                    <label for="archive_5">Archive Posts 5</label>
                    <input type="text" class="form-control" name="archive_5" id="archive_5" >
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
            <a href="{{ route('backends.newinformation.index') }}" class="btn btn-light px-3">Back</a>
            
          </div>
          </form>
         </div>
         </div>
      </div>

@endsection