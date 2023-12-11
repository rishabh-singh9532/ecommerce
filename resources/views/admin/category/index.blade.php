{{-- @dd('okk'); --}}
@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Category List</h4>
                <h4><a href="{{route('category.create')}}" class="btn btn-primary btn-sm float-end">Add Category</a></h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item)
                      <tr>
                     
                           <td>{{$item->name}}</td>
                           <td>{{$item->slug}}</td>
                           <td>{{$item->description}}</td>
                           <td> <img src="{{ url('/uploads/category/' . $item->image) }}" alt=""
                            height="50" width="50" class="rounded-circle"></td>
                            
                            <td>
                                <a href="{{route('category.edit',$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{route('category.destroy',$item->id)}}" class="btn btn-danger btn-sm">Delete</a>

                                <form id="category-edit-action-{{ $item->id }}"
                                    action="{{ route('category.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    
                                </form>
                            </td>
                     
                   
                      
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
        <div class="mt-2">
            {{ $category->links('pagination::bootstrap-5')}}
        </div>
    </div>
</div>
<script>
    function deleteemployee(id){
    if(confirm("Are You Want To Delete ")){
        document.getElementById('category-edit-action-'+id).submit();
    }
    }
    </script>
@endsection