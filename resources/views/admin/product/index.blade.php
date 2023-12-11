{{-- @dd('okk'); --}}
@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Product List</h4>
                <h4><a href="{{route('product.create')}}" class="btn btn-primary btn-sm float-end">Add Products</a></h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>

                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                       

                        <th scope="col">Action</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                      <tr>
                     
                           <td>{{$item->name}}</td>
                           <td>{{$item->slug}}</td>
                           <td>{{$item->description}}</td>
                           <td>{{$item->selling_price}}</td>

                           <td> <img src="{{ url('/uploads/product/' . $item->image) }}" alt=""
                            height="50" width="50" class="rounded-circle"></td>
                            
                            <td>
                                <a href="{{route('product.edit',$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{route('product.destroy',$item->id)}}" class="btn btn-danger btn-sm">Delete</a>

                                <form id="product-edit-action-{{ $item->id }}"
                                    action="{{ route('product.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    
                                </form>
                            </td>
                     
                   
                      
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
        {{-- <div class="mt-2">
            {{ $product->links('pagination::bootstrap-5')}}
        </div> --}}
    </div>
</div>
<script>
    function deleteemployee(id){
    if(confirm("Are You Want To Delete ")){
        document.getElementById('product-edit-action-'+id).submit();
    }
    }
    </script>
@endsection