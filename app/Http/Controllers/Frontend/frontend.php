<?php

namespace App\Http\Controllers\Frontend;
use App\Models\newsletter;
use App\Models\Contact;
// use App\Models\newsletter;
use Laravel\Scout\Searchable;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\products;
use Illuminate\Http\Request;

class frontend extends Controller
{
    use Searchable;
    public function index(Request $request)
    {
        $query = $request->input('query'); // Get the search query from the request

        $product = Products::where('status', '1')->where('trending', '1')->get();
        $newArrivals = Products::where('status', '1')->where('trending', '1')->orderBy('created_at', 'desc')->get();
        $category = Categories::where("status", "1")->where("popular", "1")->get();

        // Check if a search query is provided
        if ($query) {
            // Use the search method on an instance of the Products model
            $searchResults = (new Products)->search($query)->get();
            return view("frontend.index", compact("product", "newArrivals", "category", "searchResults"));
        }

        return view("frontend.index", compact("product", "newArrivals", "category"));
    }

    public function aboutus()
    {
        return view('frontend.aboutus');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function contactus(Request $request)
    {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        return redirect('/contact')->with("status", "We will Contact You in 24 Hours");


    }

    public function categories()
    {
        $category = Categories::where("status", "1")->get();
        return view('frontend.category', compact('category'));
    }
    public function viewcategory($slug)
    {
        if (Categories::where("slug", $slug)->exists()) {
            $category = Categories::where("slug", $slug)->first();
            $product = products::where("cate_id", $category->id)->where("status", "1")->get();
            return view('frontend.product.index', compact("category", "product"));
        } else {

            return redirect("/")->with("status", "Slug link was broken");
        }
    }

    public function newsletter(Request $request){
        $news=new newsletter;
        $news->email=$request->newsletter;
        $news->save();
        $request->Session()->flash('status', 'Subscribes Successfully');
        return redirect()->route('/');
        // return redirect()->back()->with('status','Subscribes Successfully');
    }
    public function productview($cate_slug, $prod_slug)
    {

        if (Categories::where("slug", $cate_slug)->exists()) {
            if (products::where("slug", $prod_slug)->exists()) {
                $product = products::where("slug", $prod_slug)->where('status', '1')->first();
                return view('frontend.product.view', compact('product'));

            } else {
                return redirect("/")->with("status", "no Such Product Found");
            }
        } else {
            return redirect("/")->with("status", "No such category found");
        }
    }

    public function productviewdetail($slug)
    {
        // dd('okk');
        $product = products::where('slug', $slug)->first();
        return view('frontend.product.view', compact('product'));


    }

    public function searchproductajax()
    {
        $product = Products::select('name')->where('status', 1)->get();
        $data = [];
        foreach ($product as $item) {
            $data[] = $item['name'];
        }
        return $data;
    }

    public function frontsearchproduct(Request $request)
    {
        $searched_product = $request->searched;
        if ($searched_product) {

            $product = Products::where("name", "LIKE", "%$searched_product%")->first();
            if ($product) {
                return redirect('/view-product/' . $product->slug);
            } else {
                return redirect()->back()->with('status', "No Such Product Found");
            }
        } else {
            return redirect()->back();
        }
    }
}
