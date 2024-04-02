@extends('layouts.backend')
@section('title') Our Team @endsection
@section('content')
<div class="row mt-3 ">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Our Team</h5>
			  <div class="table-responsive">
               <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Image</th>
                      <th scope="col">Name</th>
                      <th scope="col">Position</th>
                      <th scope="col">
                          <a href="{{ route('backends.about.create') }}" class="btn btn-light px-3">New About</a>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @if($abouts->isEmpty())
                        <tr>
                            <td>There is no record</td>
                        </tr>
                    @else
                        @foreach($abouts as $about)
                         <tr>
                            <td> {{ $loop->index +1 }} </td>
                            <td>
                                @if($about->image)
                                    <a href="" data-toggle="modal" data-target="#ModalAbout{{ $about->id }}" class="h3"><i class="fa-solid fa-image"></i></a>
                                      <!-- Modal -->
                                      <div class="modal fade" id="ModalAbout{{ $about->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            
                                            <div class="modal-body">
                                              <img src="{{ asset($about->image) }}" alt="" width="100%">
                                            </div>
                                          
                                          </div>
                                        </div>
                                      </div>
                                  @endif
                            </td>
                            <td> {{ $about->name }} </td>
                            <td> {{ $about->position }} </td>
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('backends.about.edit', $about) }}" class="btn btn-light px-3">Edit</a>
                                <button onclick="deleteAbout({{ $about->id }})" type="button" class="btn btn-danger" >Delete</button>
                                <form id="frmAbout{{ $about->id }}" action="{{ route('backends.about.destroy', $about) }}" method="post">
                                   @csrf
                                   @method('delete')
                                </form>
                               <script>
                                  function deleteAbout(id){
                                    if(confirm('Are you sure?')){
                                      document.getElementById('frmAbout' + id).submit();
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