<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function category_view()
    {
        $data=Category::all();
        return view('admin.category',compact('data'));
    }
    public function add_category(Request $request)
    {
        $category=new Category();
        $category->category_name=$request->category;
        $category->save();
        return back()->withSuccess('Product Category Created Successfully!!!');
        return redirect()->back();
    }
}
