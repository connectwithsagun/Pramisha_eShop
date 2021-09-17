<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Category;

use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = new Cart();
    //  $abc =$id;

        $cart->product_id = $request->input('product_id');
        // $category->subcategory_id = $request->input('subcategory_id');
        // $category->slug = $request->input('slug');
        $cart->save();
        return redirect()->route('home');
    }

    public function index()
    {
        $viewCart = Cart::latest()->get();
        $categories = Category::all();

        // return view('cart', ['viewCart' => $viewCart] );
        return view('cart', compact('viewCart','categories'));


    }


    public function delete($id)
    {
        DB::delete('delete from carts where id = ?',[$id]);
        return redirect()->route('viewCart');
        echo "product deleted successfully.
        ";
    }

    public function update(Request $request, $id)
    {
        $input = $request -> all();
        $task = Cart::find($id);
 

        $task->quantity = $input['quantity'];
  
 
        $task -> save();
    
        echo "Record updated successfully.";
        return redirect()->route('viewCart');
    
        return redirect()->back();
    }
}
