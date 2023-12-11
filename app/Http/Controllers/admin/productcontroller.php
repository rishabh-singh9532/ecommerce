<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;
use App\Models\Categories;
use File;

class productcontroller extends Controller
{
    public function index()
    {
        $product = products::all();
        return view("admin.product.index", compact('product'));
    }
    public function create()
    {
        $category = Categories::all();
        return view("admin.product.create", compact("category"));
    }
    public function store(Request $request)
    {
        $product = new products;
        $product->cate_id = $request['cate_id'];
        $product->name = $request["name"];
        $product->slug = $request["slug"];
        $product->image = $request["image"];

        $product->small_description = $request["small_description"];

        $product->description = $request["description"];

        $product->original_price = $request["original_price"];

        $product->selling_price = $request["selling_price"];
        $product->quantity = $request["quantity"];
        $product->trending = $request["trending"];
        $product->status = $request["status"];
        $product->meta_title = $request["meta_title"];
        $product->meta_keywords = $request["meta_keywords"];
        $product->meta_description = $request["meta_description"];

        $product->save();
        if ($request->image) {
            $ext = $request->image->getClientOriginalExtension();
            $newfilename = time() . '.' . $ext;
            $request->image->move(public_path('/uploads/product'), $newfilename);
            $product->image = $newfilename;
            $product->save();
        }
        //    return with session message 
        $request->Session()->flash('success', 'Product Added Successfully');
        return redirect()->route('product.index');


    }
    public function edit($id){
        $product=products::find($id);
        $category=Categories::all();
        return view('admin.product.edit',compact('product','category'));
    }
    public function update($id,Request $request){
        $product=products::find($id);
        $product->cate_id = $request['cate_id'];
        $product->name = $request["name"];
        $product->slug = $request["slug"];
        $product->image = $request["image"];

        $product->small_description = $request["small_description"];

        $product->description = $request["description"];

        $product->original_price = $request["original_price"];

        $product->selling_price = $request["selling_price"];
        $product->quantity = $request["quantity"];
        $product->trending = $request["trending"];
        $product->status = $request["status"];
        $product->meta_title = $request["meta_title"];
        $product->meta_keywords = $request["meta_keywords"];
        $product->meta_description = $request["meta_description"];

        $product->Update();
           //image updated by this code 
           if ($request->image) {
            $oldimg = $product->image;
            $ext = $request->image->getClientOriginalExtension();
            $newfilename = time() . '.' . $ext;
            $request->image->move(public_path('/uploads/product'), $newfilename);
            $product->image = $newfilename;
            file::delete(public_path('/uploads/product') . $oldimg);
            $product->save();
        }
        $request->Session()->flash('success', 'Category Updated Successfully');
        return redirect()->route('product.index');
    }
    public function destroy($id){
        Products::find($id)->delete();
        return redirect()->back();
    }
}
