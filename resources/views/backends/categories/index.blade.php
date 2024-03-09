@extends('layouts.backend')
@section('title') Category @endsection
@section('content')
<div class="row mt-3 d-flex justify-content-center">
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">New Category</h5>
			  <div class="table-responsive">
               <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">
                          <a href="{{ route('backends.categories.create') }}" class="btn btn-light px-3">Create</a>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @if($categories->isEmpty())
                        <tr>
                            <td>There is no record</td>
                        </tr>
                    @else
                        @foreach($categories as $category)
                         <tr>
                            <td> {{ $category->id }} </td>
                            <td> {{ $category->title }} </td>
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('backends.categories.edit', $category) }}" class="btn btn-light px-3">Edit</a>
                                <button onclick="deleteCategory({{ $category->id }})" type="button" class="btn btn-danger" >Delete</button>
                                <form id="frmCategory{{ $category->id }}" action="{{ route('backends.categories.delete', $category) }}" method="post">
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