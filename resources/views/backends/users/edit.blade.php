@extends('layouts.backend')

@section('content')


<div class="row mt-4">
      <div class="col-lg-12">
         <div class="card">
           <div class="card-body">
           <div class="card-title">New User</div>
           <hr>
            <form action="{{ route('users.update',$user ) }}" method="post" enctype='multipart/form-data'>
              @csrf
              @method('PUT')
              <div class="form-group mt-2">
                <label for="role">Role</label>
                <select class="form-control" name="role" id="role">
                    <option balue="">---------- Choose Role ---------</option>
                    <option value="{{ $user->role }}" selected >{{ $user->role }}</option>
                </select>
            </div>

           <div class="form-group mt-2">
            <label for="title">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
           </div>

           <div class="form-group mt-2">
            <label for="title">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
           </div>

           <div class="form-group mt-2">
            <label for="title">Image</label>
            <input type="file" class="form-control mb-3" name="image" id="image" accept="image/png, image/gif, image/jpeg, image/webp">
            <img src="{{ asset($user->profile) }}" alt="" width="10%">
           </div>
           
           <div class="form-group mt-4">
            <button type="submit" class="btn btn-light px-4">Save</button>
            <a href="{{ route('users.index') }}" class="btn btn-light px-3">Back</a>
            
          </div>
          </form>
         </div>
         </div>
      </div>

@endsection
