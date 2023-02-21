<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class UserProductController extends Controller
{
    private $category;
    private $product;



    public function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;
    }
    public function index()
    {
        $products = $this->product->latest()->paginate(8);
        $categories = Category::with('products')->get();
        return view('user.product.index', compact('products', 'categories'));
    }
    
    
    public function main()
    {
        $carts = Session::get('carts');
        $products = $this->product->latest()->paginate(4);
        $categories = Category::with('products')->get();
        return view('layouts.pages.main', compact('products', 'categories', 'carts'));
    }

    public function watch($id)
    {
        $products =$this->product->latest()->paginate(6);
        $categories = Category::with('products')->get();
        $category = Category::find($id);
        $product = Product::where('category_id', $category->id)->get();
        
        // // dd($categories);
        // foreach($product as $item){
        //     echo $item->id;
        // }
        return view('layouts.productLayouts.main', compact('category', 'categories', 'product'));

    }

    public function detail($id, $ID)
    {
        $product = Product::find($ID);
        $category = $product->category_id;
        // dd($category);
        $productRelative = Product::where('category_id', $category)->get();
        // dd($product->id);
        // echo $product->id;
        return view('layouts.productLayouts.detail', compact('product', 'productRelative'));
    }

    // public function cart(User $user)
    // {
    //     return view('layouts.pages.cart', compact('user'));
    // }


    // public function deleteCart($id)
    // {
    //     Product::destroy($id);
    //     // dd($user->products->id);
    //     return redirect("/user/cart/{id}");
    // }


    public function showCheckout(User $user)
    {
        return view('layouts.pages.checkout', compact('user'));
    }



    public function checkout(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required | min: 10',
            'number_phone' => 'required | min: 9 | max: 11',
            'DOB' => 'required',
            'CCCD' => 'required | size: 12',
            'email' => 'required | email'
        ]);
        // dd($user->id);
        return redirect('/index', compact('user'));




    }


}
