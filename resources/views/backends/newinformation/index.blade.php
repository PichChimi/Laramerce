@extends('layouts.backend')
@section('title') New Information @endsection
@section('content')
<div class="row mt-3 ">
        <div class="col-lg-12">
          <div class="card">
        
            <div class="card-body">
              <h5 class="card-title">New Information</h5>
			  <div class="table-responsive">
               <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Image</th>
                      <th scope="col">Title</th>
                      <th scope="col">
                          <a href="{{ route('backends.newinformation.create') }}" class="btn btn-light px-3">New Information</a>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($datainfors->isEmpty())
                        <tr>
                            <td>There is no record</td>
                        </tr>
                    @else
                        @foreach($datainfors as $datainfor)
                         <tr>
                            <td> {{ $loop->index +1 }} </td>
                            <td>
                            @if($datainfor->image)
                                   <!-- Button trigger modal -->
                                 <a href="" data-toggle="modal" data-target="#ModalProduct{{ $datainfor->id }}" class="h3"><i class="fa-solid fa-image"></i></a>
                                  <!-- Modal -->
                                  <div class="modal fade" id="ModalProduct{{ $datainfor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        
                                        <div class="modal-body">
                                          <img src="{{ asset($datainfor->image) }}" alt="" width="100%">
                                        </div>
                                      
                                      </div>
                                    </div>
                                  </div>
                               @endif
                            </td>
                            <td> {{ $datainfor->title_cart }} </td>
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="{{ route('backends.newinformation.show', $datainfor) }}" class="btn btn-light px-3">Detail</a>
                                  <a href="{{ route('backends.newinformation.edit', $datainfor) }}" class="btn btn-light px-3">Edit</a>
                                <button onclick="deletenewInfor({{ $datainfor->id }})" type="button" class="btn btn-danger" >Delete</button>
                                <form id="frmnewInfor{{ $datainfor->id }}" action="{{ route('backends.newinformation.destroy', $datainfor) }}" method="post">
                                   @csrf
                                   @method('delete')
                                </form>
                               <script>
                                  function deletenewInfor(id){
                                    if(confirm('Are you sure?')){
                                      document.getElementById('frmnewInfor' + id).submit();
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