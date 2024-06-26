<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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

    // Category End



    // Product Start
    public function add_product()

    {
        $categories=Category::all();
        return view('admin.add_product',compact('categories'));
    }


    public function store_product(Request $request)

    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|string',
            'quantity' => 'required|numeric|between:0.01,999999.99',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048', // Allowing image files with a maximum size of 2MB
        ]);
    
        $product = new Product();
        $product->title = $validatedData['title'];
        $product->category_id = $validatedData['category_id'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->quantity = $validatedData['quantity'];
    
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('pro'), $imageName);
            $product->image = $imageName;
        }
    
        $product->save();
        return redirect('/show_product')->withSuccess('Product Created Successfully!!!');
    
        // Redirect or return a response
    }




    public function show_product()
    {
        $products=Product::paginate(2);
        return view('admin.show_product',compact('products'));
    }


    public function delete_product($id)
    {
        $product=Product::find($id);

        $image_path=public_path('pro/'.$product->image);

        if(file_exists($image_path))
        {
            unlink($image_path);
        }

        $product->delete();
        return back()->withSuccess('Product  Deleted Successfully!!!');
        // return redirect('show_product')->withSuccess('Product  Deleted Successfully!!!');
    }


    public function edit_product($id)
    {
        $categories=Category::all();
        $data=Product::find($id);
        
        return view('admin.edit_product',compact('data','categories'));
    }

    public function update_product(Request $request,$id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|string',
            'quantity' => 'required|numeric|between:0.01,999999.99',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048', // Allowing image files with a maximum size of 2MB
        ]);
    
        $product = Product::find($id);
        $product->title = $validatedData['title'];
        $product->category_id = $validatedData['category_id'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->quantity = $validatedData['quantity'];
    
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('pro'), $imageName);
            $product->image = $imageName;
        }
    
        $product->save();
        return redirect('/show_product')->withSuccess('Product Updated Successfully!!!');
    
        // Redirect or return a response
    }

    public function product_search(Request $request)
    {
        $search=$request->search;
        $products=Product::where('title','LIKE','%'.$search.'%')->paginate(2);
        // orWhere()
        return view('admin.show_product',compact('products'));
    }


    public function view_orders()
    {

        $data=Order::all();
        return view('admin.orders',compact('data'));
    }
    public function on_the_way($id)
    {

        $data=Order::find($id);
        $data->status='On the Way';
        $data->save();
        return redirect('/view_orders');
       
    }
    public function delivered($id)
    {

        $data=Order::find($id);
        $data->status='Delivered';
        $data->save();
        return redirect('/view_orders');
       
    }
    public function print_pdf($id)
    {

        $data=Order::find($id);
        $pdf = Pdf::loadView('admin.invoice',compact('data'));
        return $pdf->download('invoice.pdf');
       
    }

}
