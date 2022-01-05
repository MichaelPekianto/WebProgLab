<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\categories;
use App\Models\Products;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use function Sodium\increment;

class ProductController extends Controller
{
    public function index()
    {
        return view('insertproduct', [
        ]);
    }

    public function insertProduct(Request $request)
    {
        $rules = [
            'title' => 'required|min:5|max:25',
            'desc' => 'required|min:10|max:100',
            'price' => 'required|gte:1000|lte:10000000',
            'stock' => 'required|gte:1',
            'image' => 'required'
        ];
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return back()->withErrors($validation);
        }

        $product = new Products();
        $product->category = $request->category;
        $product->title = $request->title;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $file = $request->file('image');
        $imageName = time() . '.' . $file->getClientOriginalExtension();
        Storage::putFileAs('public/image', $file, $imageName);
        $product->image = 'image/' . $imageName;
        $product->save();

        return redirect('/');
    }

    public function viewProduct()
    {
        $products = Products::paginate(6);
        return view('item')->with('products', $products);
    }

    public function viewUpdate($id)
    {
        return view('updateproduct')->with('id', $id);
    }

    public function updateProduct(Request $request, $id)
    {
        $products = Products::where('id', $id)->first();

        $rules = [
            'title' => 'required|min:5|max:25',
            'desc' => 'required|min:10|max:100',
            'price' => 'required|gte:1000|lte:10000000',
            'stock' => 'required|gte:1',
        ];

        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return back()->withErrors($validation);
        }

        $file = $request->file('image');
        if ($file != null) {
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            Storage::putFileAs('public/image', $file, $imageName);
            $products->image = 'image/' . $imageName;
        }

        $products->category = $request->category;
        $products->title = $request->title;
        $products->desc = $request->desc;
        $products->price = $request->price;
        $products->stock = $request->stock;
        $products->save();

        return redirect('/');
    }

    public function search(Request $request)
    {
        $search_query = $request->search;
        $category_query=$request->category;
//        $category = Products::where('category', "like", '%')->paginate(6)->appends(['category' => $category]);
        $products = Products::where('title', "LIKE", "%$search_query%")
        ->where('category',"LIKE","%$category_query")
        ->paginate(6);
        return view('item')->with('products', $products);
    }

    public function details($id){
        $products = Products::where('id', $id)->first();
        return view('detail')->with('products', $products);
    }

//    public function categories($id){
//        $categories = categories::all();
//        $book = books::where('category_id',"LIKE", $id)->paginate(5)->appends(['id'=>$id]);
//        return view('template') -> with('id', $id)->with('categories', $categories) -> with('book', $book);
//    }
}
