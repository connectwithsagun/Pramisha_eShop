<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;


use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewProduct = Product::latest()->get();
        return view('admin.products.index', ['viewProduct' => $viewProduct] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('admin.products.create', compact('categories','subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|max:255|unique:products',
            'product_desc' => 'required',
            'price' => 'required',
            'old_price' => 'required',
            'discount' => 'required',
             'category_id' => 'required|integer|min:1',
             'sub_category_id' => 'required|integer|min:1',
            'image' => 'required',



        ],
        [
            'required' => ':attribute is required',
            'category_id.required' => 'Category must be selected.',
            'sub_category_id.required' => 'Sub-Category must be selected.'

        ]
        );
        $product = new Product;
        $product->product_name = $request->input('product_name');
        $product->product_desc = $request->input('product_desc');
        $product->old_price = $request->input('old_price');
        $product->discount = $request->input('discount');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->sub_category_id = $request->input('sub_category_id');

        // if ($request->hasFile('image_upload')) {
        //     // uploading image to images folder
        //     $name = $request->file('image_upload')->getClientOriginalName();
        //     $request->file('image_upload')->storeAs('public/images', $name);
        //     // croping the image and saving it to thumbnail folder inside images folder
        //     // $image_resize = Image::make(storage_path('app/public/images/'.$name));
        //     // $image_resize->resize(550, 750);
        //     // $image_resize->save(storage_path('app/public/images/thumbnail/'.$name));
        //     image_crop($name, 550, 750);
        //     $product->image = $name;
 
        // }
        if ($request->hasFile('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $name);
             image_crop($name, 300, 450);
            $product->image = $name;
        }
        // if ($request->hasFile('image_upload')) {
        //     $name = $request->file('image_upload')->getClientOriginalName();
        //     $request->file('image_upload')->storeAs('public/images', $name);
        //    //image_crop($name, 550, 750);
        //     $product->image = $name;
        // }

        // return $product;
        if($product->save()){
            return redirect()->route('product_list');
        }else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        // $viewCategory = Category::findOrFail($id);

        // return view('admin.product.edit', ['viewCategory' => $viewCategory] );
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $products = Product::findOrFail($id);

        return view('admin.products.edit', compact('products','categories','subcategories'));
        
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
        
        $input = $request -> all();
        $task = Product::find($id);
      //  $category = new Category();

        $task->product_name = $input['product_name'];
        $task->product_desc = $input['product_desc'];
        $task->old_price = $input['old_price'];
        $task->discount = $input['discount'];
        $task->price = $input['price'];
       $task->category_id = $input['category_id'];
       $task->sub_category_id = $input['sub_category_id'];



    //     $request->validate([
    //         'name' => 'required|max:255|unique:categories',
    //         'description' => 'required',

    //     ],
    //     [
    //         'required' => ':attribute is required',

    //     ]
    // );
    
        // $input = $request->all();
    
        // $task->fill($input)->save();
        $task -> save();
    
        echo "Record updated successfully.";
        return redirect()->route('product_list');
    
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from products where id = ?',[$id]);
        return redirect()->route('product_list');
        echo "product deleted successfully.
        ";
    }


	public function findProductName(Request $request){

		
	    //if our chosen id and products table prod_cat_id col match the get first 100 data 

        //$request->id here is the id of our chosen option id
        $data=SubCategory::select('name','id')->where('category_id',$request->id)->take(100)->get();
        return response()->json($data);//then sent this data to ajax success
	}
  
    // $data=Product::select('productname','id')->where('prod_cat_id',$request->id)->take(100)->get();
    // return response()->json($data);//then sent this data to ajax success


}
