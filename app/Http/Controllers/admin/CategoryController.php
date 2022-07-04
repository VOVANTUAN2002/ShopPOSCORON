<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::paginate(10);
        $search = $request->search;
        if ($search) {
            $categories = $categories->where('name', 'like', '%' . $search . '%')->where('id', $search);
        }
        
        return view ('backend.admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate(
            [
                'name' => 'required|unique:categories|max:255',
            ],
            [
                'name.unique' => 'Tên thể loại đã có ',
                'name.required' => 'Phải có tên thể loại',
            ]
        );
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        // Session::flash('success', 'Tạo mới thể loại thành công');
        return redirect()->route('categories.index')->with('status','Tạo mới thể loại thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo __METHOD__;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorys = Category::findOrFail($id);
        return view('backend.admin.categories.edit',compact('categorys'));
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
                'name' => 'required|unique:categories,name,'.$id.'|max:255',
            ],
            [
                'name.unique' => 'Tên thể loại đã có ',
                'name.required' => 'Phải có tên thể loại',
            ]
        );
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('categories.index')->with('status','Cập nhật thể loại thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        Session::flash('success', 'Xóa thành công');
        return redirect()->route('categories.index');
    }
}