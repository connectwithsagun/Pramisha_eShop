<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewCategory = Category::latest()->get();
        return view('admin.category.index', ['viewCategory' => $viewCategory] );
        return view('admin.sub_category.create', compact('subcategories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $subcategories = SubCategory::all();
        // return view('admin.category.create', compact('subcategories'));
        return view('admin.category.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories',
            'description' => 'required',

        ],
        [
            'required' => ':attribute is required',

        ]
    );

        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        // $category->subcategory_id = $request->input('subcategory_id');
        // $category->slug = $request->input('slug');
        $category->save();
        return redirect()->route('category_list');
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
        // $viewCategory = Category::latest()->get();
        $viewCategory = Category::findOrFail($id);

        return view('admin.category.edit', ['viewCategory' => $viewCategory] );
       // return view('admin.sub_category.create', compact('subcategories'));

    //    $task = Task::findOrFail($id);

    // return view('tasks.edit')->withTask($task);

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
        $task = Category::find($id);
      //  $category = new Category();

        $task->name = $input['name'];
        $task->description = $input['description'];

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
        return redirect()->route('category_list');
    
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
        DB::delete('delete from categories where id = ?',[$id]);
        return redirect()->route('category_list');
        echo "Record deleted successfully.
        ";
    }
}
