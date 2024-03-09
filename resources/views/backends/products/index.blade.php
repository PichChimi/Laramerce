@extends('layouts.backend')
@section('title') Product @endsection
@section('content')
<div class="row mt-3 ">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Product</h5>
			  <div class="table-responsive">
               <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Category</th>
                      <th scope="col">Image</th>
                      <th scope="col">Name</th>
                      <th scope="col">Quantity In Stock</th>
                      <th scope="col">
                          <a href="{{ route('backends.products.create') }}" class="btn btn-light px-3">New Product</a>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @if($products->isEmpty())
                        <tr>
                            <td>There is no record</td>
                        </tr>
                    @else
                        @foreach($products as $product)
                         <tr>
                            <td> {{ $loop->index +1 }} </td>
                            <td> {{ $product->category->title }} </td>
                            <td>
                            @if($product->image_url)
                                   <!-- Button trigger modal -->
                                 <a href="" data-toggle="modal" data-target="#ModalProduct{{ $product->id }}" class="h3"><i class="fa-solid fa-image"></i></a>
                                  <!-- Modal -->
                                  <div class="modal fade" id="ModalProduct{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        
                                        <div class="modal-body">
                                          <img src="{{ asset($product->image_url) }}" alt="" width="100%">
                                        </div>
                                      
                                      </div>
                                    </div>
                                  </div>
                               @endif
                            </td>
                            <td> {{ $product->name }} </td>
                            <td> {{ $product->qty_in_stock }} </td>
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                              
                                   <a href="{{ route('backends.products.show', $product) }}" class="btn btn-light px-3">Detail</a>
                             
                                @can('productEdit', $product)
                                    <a href="{{ route('backends.products.edit', $product) }}" class="btn btn-light px-3">Edit</a>
                                @endcan
                                @can('productDelete', $product)
                                <button onclick="deleteCategory({{ $product->id }})" type="button" class="btn btn-danger" >Delete</button>
                                <form id="frmCategory{{ $product->id }}" action="{{ route('backends.products.destroy', $product) }}" method="post">
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
                               @endcan
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