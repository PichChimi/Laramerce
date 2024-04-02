@extends('layouts.backend')

@section('content')
<div class="row mt-3">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Users</h5>
			  <div class="table-responsive">
               <table class="table">
               <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Role</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Profil</th>
                        @can('createUser')
                            <th scope="col">
                                <a href="{{ route('users.create') }}" class="btn btn-primary">New User</a>
                            </th>
                        @endcan
                    </tr>
                    </thead>
                  <tbody>
                    @if($users->isEmpty())
                        <tr>
                            <td>There is no record</td>
                        </tr>
                    @else
                        @foreach($users as $user)
                         <tr>
                            <td> {{ $loop->index + 1 }} </td>
                            <td> {{ $user->role }} </td>
                            <td> {{ $user->name }} </td>
                            <td> {{ $user->email }} </td>
                            <td>
                               @if($user->profile)
                                   <!-- Button trigger modal -->
                                 <a href="" data-toggle="modal" data-target="#exampleModal{{ $user->id }}" class="h3"><i class="fa-solid fa-image"></i></a>
                                  <!-- Modal -->
                                  <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        
                                        <div class="modal-body">
                                          <img src="{{ asset($user->profile) }}" alt="" width="100%">
                                        </div>
                                      
                                      </div>
                                    </div>
                                  </div>
                               @endif
                                 
                            </td>

                            <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-light px-3">Edit</a>
                                <button onclick="deleteCategory({{ $user->id }})" type="button" class="btn btn-danger" >Delete</button>
                                <form id="frmCategory{{ $user->id }}" action="{{ route('users.destroy', $user) }}" method="post">
                                   @csrf
                                   @method('delete')
                                </form>
                               <script>
                                  function deleteCategory(id){
                                    if(confirm('Are you sure?')){
                                      document.getElementById('frmCategory' + id).submit();
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
