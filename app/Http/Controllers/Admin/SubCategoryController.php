<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory = SubCategory::latest()->get();
       

        return view('admin.sub_category.index', ['subcategory' => $subcategory] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.sub_category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          // return $request;
           $validated = $request->validate([
            'name' => 'required|max:255|unique:sub_categories',
            'description' => 'required',
            'category_id' => 'required|integer|min:1',
        ],
        [
            'required' => ':attribute is required',
            // 'name.required' => 'Sub Category Name is required. Please input it.'
        ]
        );
        $subcategories = new SubCategory();
        $subcategories->name = $request->input('name');
        $subcategories->description = $request->input('description');
        $subcategories->category_id = $request->input('category_id');

      

        // return $product;
        if($subcategories->save()){
            // return redirect()->route('admin.sub_category.index');subcategory_list
            return redirect()->route('subcategory_list');
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
        $categories = Category::all();
        $subcategories = SubCategory::findOrFail($id);

        return view('admin.sub_category.edit', compact('categories','subcategories'));
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
        $task = SubCategory::find($id);
      //  $category = new Category();

        $task->name = $input['name'];
        $task->description = $input['description'];
       $task->category_id = $input['category_id'];
     //  $task->sub_category_id = $input['sub_category_id'];



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
        return redirect()->route('subcategory_list');
    
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
        DB::delete('delete from sub_categories where id = ?',[$id]);
        echo "Record deleted successfully.
        ";
    }
}
