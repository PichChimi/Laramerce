@extends('layouts.backend')

@section('content')


<div class="row mt-4">
      <div class="col-lg-12">
         <div class="card">
           <div class="card-body">
           <div class="card-title">New User</div>
           <hr>
            <form action="{{ route('users.store') }}" method="post" enctype='multipart/form-data'>
              @csrf

              <div class="form-group mt-2">
                <label for="role">Role</label>
                <select class="form-control" name="role" id="role">
                    <option selected disabled>---------- Choose Role ---------</option>
                    <option value="Buyer">Buyer</option>
                    <option value="admin">admin</option>
                    <option value="Seller">Seller</option> <!-- Corrected spelling to 'Seller' -->
                </select>
            </div>

           <div class="form-group mt-2">
            <label for="title">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
           </div>

           <div class="form-group mt-2">
            <label for="title">Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Enter E-mail">
           </div>

           <div class="form-group mt-2">
            <label for="title">Password</label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Enter Password">
           </div>

           <div class="form-group mt-2">
            <label for="title">Image</label>
            <input type="file" class="form-control" name="image" id="image" accept="image/png, image/gif, image/jpeg, image/webp">
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
