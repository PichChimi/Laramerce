@extends('layouts.backend')
@section('title') Advertisement @endsection
@section('content')
<div class="row mt-3 ">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Advertisement</h5>
			  <div class="table-responsive">
               <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Image</th>
                      <th scope="col">Since Year</th>
                      <th scope="col">Title</th>
                      <th scope="col">
                          <a href="{{ route('backends.advertisement.create') }}" class="btn btn-light px-3">New Advertisement</a>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @if($advertisements->isEmpty())
                        <tr>
                            <td>There is no record</td>
                        </tr>
                    @else
                        @foreach($advertisements as $advertisement)
                         <tr>
                            <td> {{ $loop->index +1 }} </td>
                            <td>
                                @if($advertisement->image)
                                    <a href="" data-toggle="modal" data-target="#ModalAdverti{{ $advertisement->id }}" class="h3"><i class="fa-solid fa-image"></i></a>
                                      <!-- Modal -->
                                      <div class="modal fade" id="ModalAdverti{{ $advertisement->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            
                                            <div class="modal-body">
                                              <img src="{{ asset($advertisement->image) }}" alt="" width="100%">
                                            </div>
                                          
                                          </div>
                                        </div>
                                      </div>
                                  @endif
                            </td>
                            <td> {{ $advertisement->year }} </td>
                            <td> {{ $advertisement->title }} </td>
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                   <a href="{{ route('backends.advertisement.show', $advertisement) }}" class="btn btn-light px-3">Detail</a>
                                    <a href="{{ route('backends.advertisement.edit', $advertisement) }}" class="btn btn-light px-3">Edit</a>
                                <button onclick="deleteAdverti({{ $advertisement->id }})" type="button" class="btn btn-danger" >Delete</button>
                                <form id="frmAdverti{{ $advertisement->id }}" action="{{ route('backends.advertisement.destroy', $advertisement) }}" method="post">
                                   @csrf
                                   @method('delete')
                                </form>
                               <script>
                                  function deleteAdverti(id){
                                    if(confirm('Are you sure?')){
                                      document.getElementById('frmAdverti' + id).submit();
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