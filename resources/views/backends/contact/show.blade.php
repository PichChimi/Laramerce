@extends('layouts.backend')
@section('title') Contact Detail @endsection
@section('content')
<div class="row mt-4 ">
      <div class="col-lg-12">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Contact Detail</div>
           <hr>
            <form action="#" method="post" enctype='multipart/form-data'>
              @csrf
              <div class="row">
                  <div class="col-lg-8">

                  <div class="form-group mt-2">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="{{ $contact->user->name }}" name="name" id="name" readonly>
                  </div>

                  <div class="form-group mt-2">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" value="{{ $contact->user->email }}" name="unit_price" id="unit_price" readonly>
                  </div>

                  <div class="form-group mt-2">
                    <label for="qty_in_stock">Phone Number</label>
                    <input type="text" class="form-control" value="{{ $contact->number }}"  name="number" id="number" readonly>
                  </div>

                  <div class="form-group mt-2">
                    <label for="subject">Subject</label>
                    <textarea class="form-control" name="subject" id="subject" readonly>{{ $contact->subject }}</textarea>
                  </div>

                  <div class="form-group mt-2">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="message" id="message" readonly>{{ $contact->message }}</textarea>
                  </div>

                  </div>
                  
                  <div class="col-lg-4">
                      <div class="form-group mt-2">
                  <h5 for="title">Profile</h5>
                  <img src="{{ asset($contact->user->profile) }}" alt="" width="60%">
                </div>
                  </div>
              </div>
           

           
           <div class="form-group mt-4">
            <a href="{{ route('backends.contact.index') }}" class="btn btn-light px-3">Back</a>
            
          </div>
          </form>
         </div>
         </div>
      </div>

@endsection