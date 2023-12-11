@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4><a href="{{route('category.create')}}" class="btn btn-primary btn-sm float-end">Back</a></h4>
            </div>
            <div class="card-body">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @else
                @endif
               <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class=" col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{old('name',$category->name)}}" name="name" > 
                    </div>
                    <div class=" col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control " name="slug"  value="{{old('name',$category->slug)}}"> 
                    </div>

                </div>
                <div class="row">
                    <div class=" col-md-6 mb-3">
                        <label for="">Description</label>
                        <input type="text" class="form-control" name="description"  value="{{old('name',$category->description)}}"> 
                    </div>
                    <div class=" col-md-6 mb-3">
                        <label for="">Image</label>
                        <input type="file" class="form-control " name="image" value="{{old('name',$category->image)}}" > 
                    </div>

                </div>
                <h4>Seo Section</h4>
                    <div class="  mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{old('name',$category->meta_title)}}"> 
                    </div>
                    <div class=" mb-3">
                        <label for="">Meta_keyword</label>
                        <input type="text" class="form-control " name="meta_keywords" value="{{old('name',$category->meta_keywords)}}"> 
                    </div>

                    <div class=" mb-3">
                        <label for="">Meta_Description</label>
                        <input type="text" class="form-control " name="meta_description" value="{{old('name',$category->meta_description)}}"> 
                    </div>

                    <div class=" mb-3">
                        <label for="">Status</label>
                        <input type="number" class="form-control" placeholder="It Should be 0 or 1" name="status" value="{{old('name',$category->status)}}"> 
                    </div>
                    <div class=" mb-3">
                        <label for="">Popular</label>
                        <input type="number" class="form-control" placeholder="It Should be 0 or 1" name="popular" value="{{old('name',$category->popular)}}" > 
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