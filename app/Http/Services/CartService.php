<?php


namespace App\Http\Services;

use Illuminate\Support\Facades\Session;
use App\Http\Services\Arr;
use App\Models\Customer;
use Illuminate\Support\Arr as SupportArr;
use App\Models\Product;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Redis;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

// use Illuminate\Support\Arr;

class CartService
{
    public function create($request)
    {
        $qty = (int)$request->input('num_product');
        $product_id = (int)$request->input('product_id');

        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'So luong hoac san pham khong chinh xac');
            return false;
        }

        $carts = Session::get('carts');

        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }


        $exists = SupportArr::exists($carts, $product_id);
        if ($exists) {
            // $qtyNew = $carts[$product_id] + $qty;
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);

            return true;
        }


        $carts[$product_id] = $qty;
        Session::put('carts', $carts);



        // dd($carts);
        return true;
    }


    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $productId = array_keys($carts);
        return Product::select('id', 'name', 'price', 'feature_image_path', 'feature_image_name', 'content')
            ->whereIn('id', $productId)
            ->get();
    }

    public function update($request) 
    {
        Session::put('carts', $request->input('num_product'));
        return true;

    }

    public function remove($id) 
    {
        $carts = Session::get('carts');
        unset($carts[$id]);

        Session::put('carts', $carts);
        return true;

    }

    public function buy($request)
    {
        try {
            DB::beginTransaction();
            $carts = Session::get('carts');
            if (is_null($carts)) return false;

            $customer = Customer::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'note' => $request->input('note'),
        ]);

// dd($customer);

            $this->informationProductCart($carts, $customer->id);
            DB::commit();
            Session::flash('success', 'Dat hang thanh cong');
            Session::forget('carts');

        }catch(\Exception $err){
            DB::rollBack();
            Session::flash('success', 'Dat hang that bai');
            return false;

        }
        return true;

    }

    protected function informationProductCart($carts, $customer_id)
    {
        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'price', 'feature_image_path', 'feature_image_name', 'content')
            ->whereIn('id', $productId)
            ->get();

            $data = [];

            foreach ($products as $product){
                $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $product->id,
                'quantity' => $carts[$product->id],
                'price' => $product->price

                ];
        };

        // dd($data);

        return Cart::insert($data);
    }
}
