<?php

namespace App\Http\Controllers;

use App\Http\Services\CartService;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
// use App\Http\Services\CartService;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;


    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    
    public function addCart(Request $request)
    {

        $result = $this->cartService->create($request);
        // dd(Session::get('carts'));
        if($result == false){
            return redirect()->back();
        }else {
            return redirect('user/cart');
        }
    }

    
    public function cart()
    {
        $products = $this->cartService->getProduct();

        // dd($products);
        return view('layouts.pages.cart', [
            'title' => "Cart",
            'products' => $products,
            'carts' => Session::get('carts')
        ]);


    }


    public function updateCart(Request $request)
    {
        // dd($request->all());
        $this->cartService->update($request);
        return redirect('/user/cart');
    }

    public function deleteCart($id = 0)
    {
        $this->cartService->remove($id);
        return redirect('/user/cart');
    }

    public function buyProducts(Request $request)
    {
        $result = $this->cartService->buy($request);
        return redirect()->back();
    }
}
