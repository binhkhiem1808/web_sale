<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Components\Recusive;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\Auth;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $product;



    public function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;
    }
    public function index()
    {
        $products = $this->product->latest()->paginate(4);
        return view('admin.product.index', compact('products'));
    }

    // public function showCart(){
    //     $products = Product::with('user');
    // }


    public function showCreate()
    {
        // $products = $this->product;
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive();
        return view('admin.product.create', compact('htmlOption'));
    }

    public function store(Request $request)
    {
        
        // $dataProductCreate = Product::create([$request->all(), 'user_id' => auth()->id()]);
        // $dataProductCreate = Product::create($request->all());
        // dd($dataProductCreate);
        $avatar = $request->file('feature_image_path');
        // dd($request->file('feature_image_path'));
        // $user_id = Auth::find($id);
        $data = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'content'=> $request->input('content'),
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'feature_image_path' => 'product',
            'feature_image_name' => $avatar->getClientOriginalName()
        ];

        // dd($data);

        Product::create($data);
        $avatar->storeAs('', $avatar->getClientOriginalName(), 'public');
        return redirect('admin/product/index');
    }

    public function edit($id){
        $product = $this->product->find($id);
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive();
        return view('admin.product.edit', compact('product', 'htmlOption'));
    }

    public function update(Request $request,$id)
    {
        $product = Product::find($id);
         // $dataProductCreate = Product::create([$request->all(), 'user_id' => auth()->id()]);
        // $dataProductCreate = Product::create($request->all());
        // dd($dataProductCreate);
        $avatar = $request->file('feature_image_path');
        // dd($request->file('feature_image_path'));
        $data = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'content'=> $request->input('content'),
            'feature_image_path' => 'product',
            'feature_image_name' => $avatar->getClientOriginalName()
        ];

        $product->update($data);
        $avatar->storeAs('', $avatar->getClientOriginalName(), 'public');
        return redirect('admin/product/index');
    }

    public function delete($id)
    {
        Product::destroy($id);
        return redirect('admin/product/index');
    }
}
