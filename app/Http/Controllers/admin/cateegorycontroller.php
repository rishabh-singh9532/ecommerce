<?php

namespace App\Http\Controllers\admin;
use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class cateegorycontroller extends Controller
{
    public function index()
    {
        $category = Categories::orderBy('id', 'Desc')->paginate(5);
        return view("admin.category.index", compact("category"));
    }
    public function create()
    {

        return view("admin.category.create");
    }
    public function store(Request $request)
    {
        $category = new Categories;
      

        $category->name = $request['name'];
        $category->slug = $request['slug'];
        $category->description = $request['description'];
        $category->image = $request['image'];
        $category->meta_title = $request['meta_title'];
        $category->meta_keywords = $request['meta_keywords'];
        $category->meta_description = $request['meta_description'];
        $category->Status = $request['status'];
        $category->popular = $request['status'];
        $category->save();
        if ($request->image) {
            $ext = $request->image->getClientOriginalExtension();
            $newfilename = time() . '.' . $ext;
            $request->image->move(public_path('/uploads/category'), $newfilename);
            $category->image = $newfilename;
            $category->save();
        }
        //    return with session message 
        $request->Session()->flash('success', 'Record Added Successfully');
        return redirect()->route('category.index');
    }
    public function edit($id)
    {
        $category = Categories::find($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Categories::find($id);
        $category->name = $request['name'];
        $category->slug = $request['slug'];
        $category->description = $request['description'];
        $category->image = $request['image'];
        $category->meta_title = $request['meta_title'];
        $category->meta_keywords = $request['meta_keywords'];
        $category->meta_description=$request['meta_description'];
        $category->status = $request['status'];
        $category->popular = $request['status'];

        $category->update();
        //   image updated by this code 
        if ($request->image) {
            $oldimg = $category->image;
            $ext = $request->image->getClientOriginalExtension();
            $newfilename = time() . '.' . $ext;
            $request->image->move(public_path('/uploads/category'), $newfilename);
            $category->image = $newfilename;
            file::delete(public_path('/uploads/category') . $oldimg);
            $category->save();
        }
        $request->Session()->flash('status', 'Category Updated Successfully');
        return redirect()->route('category.index');
    }
    public function destroy($id,Request $request){
        Categories::find($id)->delete();
        return redirect()->back();
    }
}
