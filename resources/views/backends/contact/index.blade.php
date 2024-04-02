@extends('layouts.backend')
@section('title') Contact Us @endsection
@section('content')
<div class="row mt-3">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Contact Us</h5>
			  <div class="table-responsive">
               <table class="table">
               <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Profil</th>
                        <th></th>
                    </tr>
                    </thead>
                  <tbody>
                    @if($contacts->isEmpty())
                        <tr>
                            <td>There is no record</td>
                        </tr>
                    @else
                        @foreach($contacts as $contact)
                         <tr>
                            <td> {{ $loop->index + 1 }} </td>
                            <td> {{ $contact->user->name }} </td>
                            <td> {{ $contact->user->email }} </td>
                            <td> {{ $contact->number }} </td>
                            <td>
                               @if($contact->user->profile)
                                 <a href="" data-toggle="modal" data-target="#exampleModal" class="h3"><i class="fa-solid fa-image"></i></a>
                                  <!-- Modal -->
                                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        
                                        <div class="modal-body">
                                          <img src="{{ asset($contact->user->profile) }}" alt="" width="100%">
                                        </div>
                                      
                                      </div>
                                    </div>
                                  </div>
                               @endif
                                 
                            </td>

                            <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="{{ route('backends.contact.show', $contact) }}" class="btn btn-light px-3">Detail</a>
                                <button onclick="deleteContact({{ $contact->id }})" type="button" class="btn btn-danger" >Delete</button>
                                <form id="frmContact{{ $contact->id }}" action="{{ route('backends.contact.destroy', $contact) }}" method="post">
                                   @csrf
                                   @method('delete')
                                </form>
                               <script>
                                  function deleteContact(id){
                                    if(confirm('Are you sure?')){
                                      document.getElementById('frmContact' + id).submit();
                                    }
                                  }
                               </script>
                            </div>
                          </td>
                      </tr>
                        @endforeach
                    @endif
                    
                   
                  </tbody>
                </table>
            </div>
            </div>
          </div>
        </div>

@endsection
