<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use function Pest\Laravel\delete;

class AdminController extends Controller
{
    public function category_view()
    {
        $data=Category::all();
        return view('admin.category',compact('data'));
    }
    public function add_category(Request $request)
    {
        $request->validate([
            'category_name' => 'required|regex:/^[\pL\s]+$/u|max:255', //regex:/^[\pL\s]+$/u ensures the field contains only letters (including unicode letters) and spaces.
        ]);
        $category=new Category();
        $category->category_name=$request->category_name;
        $category->save();
        return back()->withSuccess('Product Category Created Successfully!!!');
    }

    public function delete_category($id)
    {
        $category=Category::find($id);
        $category->delete();
        return back()->withSuccess('Product Category Deleted Successfully!!!');


    }
    public function edit_category($id)
    {
        $data=Category::find($id);
        return view('admin.edit_category',compact('data'));
    }

    public function update_category(Request $request,$id)
    {
        $request->validate([
            'category_name' => 'required|regex:/^[\pL\s]+$/u|max:255', //regex:/^[\pL\s]+$/u ensures the field contains only letters (including unicode letters) and spaces.
        ]);
        $category=Category::find($id);
        $category->category_name=$request->category_name;
        $category->save();

        return redirect('/category_view')->withSuccess('Product Category Updated Successfully!!!');
    }
    
}
