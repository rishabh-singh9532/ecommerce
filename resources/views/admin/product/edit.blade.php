@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4><a href="{{route('product.index')}}" class="btn btn-primary btn-sm float-end">Back</a></h4>
            </div>
            <div class="card-body">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @else
                @endif
               <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class=" col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name"  value="{{$product->name}}"> 
                    </div>
                    <div class=" col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control " name="slug" value="{{$product->slug}}" > 
                    </div>

                </div>
                <div class="row">
                    <div class=" col-md-6 mb-3">
                        <label for="">Name</label>
                        <select class="form-select" name="cate_id" aria-label="Default select example" value="{{$product->cate_id}}"> 
                            <option selected>Open this select menu</option>
                            @foreach ($category as $item)
                                
                            
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                          </select> 
                    </div>
                    <div class=" col-md-6 mb-3">
                        <label for="">Small Description</label>
                        <input type="text" class="form-control " name="small_description"  value="{{$product->small_description}}"> 
                    </div>

                </div>
                <div class="row">
                    <div class=" col-md-6 mb-3">
                        <label for="">Description</label>
                        <input type="text" class="form-control" name="description" value="{{$product->description}}" > 
                    </div>
                    <div class=" col-md-6 mb-3">
                        <label for="">Image</label>
                        <input type="file" class="form-control " name="image"  value="{{$product->image}}"> 
                    </div>

                </div>
                <div class="row">
                    <div class=" col-md-6 mb-3">
                        <label for="">original_price</label>
                        <input type="text" class="form-control" name="original_price" value="{{$product->original_price}}"> 
                    </div>
                    <div class=" col-md-6 mb-3">
                        <label for="">selling_price</label>
                        <input type="text" class="form-control " name="selling_price" value="{{$product->selling_price}}" > 
                    </div>

                </div>
                <div class="row">
                    <div class=" col-md-6 mb-3">
                        <label for="">quantity</label>
                        <input type="text" class="form-control" name="quantity" value="{{$product->quantity}}"> 
                    </div>
                    <div class=" col-md-6 mb-3">
                        <label for="">trending</label>
                        <input type="integer" class="form-control " name="trending" placeholder="it should be 0 or 1" value="{{$product->trending}}"> 
                    </div>

                </div>
                <h4>Seo Section</h4>
                    <div class="  mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{$product->meta_title}}"> 
                    </div>
                    <div class=" mb-3">
                        <label for="">Meta_keyword</label>
                        <input type="text" class="form-control " name="meta_keywords" value="{{$product->meta_keywords}}"> 
                    </div>

                    <div class=" mb-3">
                        <label for="">Meta_Description</label>
                        <input type="text" class="form-control " name="meta_description" value="{{$product->meta_description}}"> 
                    </div>

                    <div class=" mb-3">
                        <label for="">Status</label>
                        <input type="number" class="form-control" placeholder="It Should be 0 or 1" name="status" value="{{$product->status}}"> 
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