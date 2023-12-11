@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4><a href="{{route('brand.create')}}" class="btn btn-primary btn-sm float-end">Back</a></h4>
            </div>
            <div class="card-body">
                {{-- @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @else
                @endif --}}
               <form action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class=" col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" > 
                    </div>
                    <div class=" col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control " name="slug" > 
                    </div>

                </div>
               </div>
                <div class=" mb-3">
                        <label for="">Status</label>
                        <input type="number" class="form-control" placeholder="It Should be 0 or 1" name="status" > 
                    </div>
                    <div class=" mb-3">
                       <button type="submit" class="btn btn-primary btn-sm">Submit</button> 
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection