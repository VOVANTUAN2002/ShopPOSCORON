<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request , $categories_id)
    {
        $products = Product::paginate(10);
        $search = $request->search;
        $categories_id = $request->categories_id;

        $products = Product::select('*');

        if ($categories_id) {
            $products = $products->where('categories_id', $categories_id);
        }

        if ($search) {
            $products = $products->where('name', 'like', '%' . $search . '%')->orwhere('id', $search);
        }

        $products = $products->paginate(10);

        $categories = Category::all();
        return view('backend.admin.products.index', compact('products', 'categories'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        // dd($categories);
        $products = Product::all();
        // dd($products);
        return view('backend.admin.products.create', compact('categories', 'products'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->des = $request->des;
        $product->quantity = $request->quantity;
        $product->categories_id  = $request->input('categories_id');
        // dd($product);
        $product->save();
   
        return redirect()->route('backend.admin.products.index')->with('success', 'Th??m d??? li???u th??nh c??ng');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        $params = [
            'product ' => $products
        ];
        return view('backend.admin.products.show', $params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('backend.admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|unique:products,name,' . $id . '|max:255',
                'quantity' => 'required|max:255',
                'price' => 'required|max:255',
                'des' => 'required|max:255',
                'categories_id' => 'required|max:255',
            ],
            [
                'name.unique' => 'T??n s???n ph???m ???? c?? ',
                'name.required' => 'Ph???i c?? t??n s???n ph???m',
                'quantity.required' => 'Ph???i c?? s??? l?????ng',
                'price.required' => 'Ph???i c?? gi??',
                'des.required' => 'Ph???i c?? t??n m?? t???',
                'categories_id.required' => 'Ph???i c?? categories_id',
            ]
        );
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->image = $request->input('image');
        $product->des = $request->input('des');
        $product->quantity = $request->input('quantity');
        $product->categories_id = $request->input('categories_id');
        $product->save();

        Session::flash('success', 'C???p nh???t th??nh c??ng');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        Session::flash('success', 'X??a th??nh c??ng');
        return back();
    }
}
