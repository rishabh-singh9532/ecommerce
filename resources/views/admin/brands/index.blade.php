{{-- @dd('okk'); --}}
@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Brand list</h4>
                <h4><a href="{{route('brand.create')}}" class="btn btn-primary btn-sm float-end">Add Brand</a></h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($brand as $item)
                      <tr>
                     
                           <td>{{$item->name}}</td>
                           <td>{{$item->slug}}</td>
                           <td>{{$item->status}}</td>
                          <td>
                                <a href="{{route('brand.edit',$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{route('brand.destroy',$item->id)}}" class="btn btn-danger btn-sm">Delete</a>

                                <form id="brand-edit-action-{{ $item->id }}"
                                    action="{{ route('brand.destroy', $item->id) }}" method="POST">
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
            {{ $brand->links('pagination::bootstrap-5')}}
        </div>
    </div>
</div>
<script>
    function deleteemployee(id){
    if(confirm("Are You Want To Delete ")){
        document.getElementById('brand-edit-action-'+id).submit();
    }
    }
    </script>
@endsection