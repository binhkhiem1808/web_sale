<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Facades\Date;

class CategoryController extends Controller
{
    public $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }


    public function index()
    {
        $categories = Category::with('products')->get();
        // dd($categories);->latest()->paginate(4)
        return view('admin.category.index', compact('categories'));
    }

    public function showCreate()
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive();
        return view('admin.category.create', compact('htmlOption'));

    }

    public function create(Request $request)
    {
        Category::create($request->all());
        return redirect('admin/categories/index');

    }

    public function edit($id)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive();
        $category = Category::find($id);
        return view('admin.category.edit', compact('category', 'htmlOption'));

    }

    public function update(Request $request,$id)
    {
        $category = Category::find($id);
        $category->update($request->all());
        return redirect('admin/categories/index');
    }

    public function delete($id){
        Category::destroy($id);
        return redirect('admin/categories/index');
    }



}
