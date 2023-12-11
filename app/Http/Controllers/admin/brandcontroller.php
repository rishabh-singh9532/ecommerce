<?php

namespace App\Http\Controllers\admin;
// use App\Models\Brands;
use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;

class brandcontroller extends Controller
{
    public function index(){
        $brand = Brands::orderBy('id', 'Desc')->paginate(5);
        return view('admin.brands.index',compact('brand'));
    }
    public function create(){
        return view('admin.brands.create');
    }
    public function store(Request $request){
        $brand=new Brands();
        $brand->name=$request['name'];
        $brand->slug=$request['slug'];
        $brand->status=$request['status'];
        $brand->save();

        return redirect('admin/brands')->with('success','brand added successfully');

    }
    public function edit($id,Request $request){
        $brand=Brands::find($id);
        return view('admin.brands.edit',compact('brand'));
    }

    public function update(Request $request, $id){
     $brand=Brands::find($id);
        
     $brand->name=$request['name'];
     $brand->slug=$request['slug'];
     $brand->status=$request['status'];
     $brand->Update();

     return redirect('admin/brands')->with('success','Brand Updated Successfully');
    }
    public function destroy($id){
    Brands::find($id)->delete();
    return redirect()->back();
    }
    
}
