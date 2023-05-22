<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::all();
        return view('admin.product.index', compact('products'));
    }
    
    public function create()
    {
        $categories=Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $category = Category::findOrFail($request->category_id);
        $product = new Product;
        $product->name = $request->name;
        $product->slug = Str::slug($request->slug);
        $product->price = $request->price;

        $category->products()->save($product);


        // $category->products()->create([
        //     'name'=> $request->name,
        //     'slug'=> Str::slug($request->slug),
        //     'price'=> $request->price,
        // ]);

        return redirect('admin/products')->with('message', 'Product Created');
    }
    
    public function edit(int $product)
    {
        $categories = Category::all();
        $product =Product::findOrFail($product);
        return view('admin.product.edit', compact('categories', 'product'));
    }

    public function update(Request $request, $product_id)
    {
        // $product = Category::findOrFail($request->category_id)
        //                 ->products()->where('id',$product_id)->first();
        
        // $product->name = $request->name;
        // $product->slug = Str::slug($request->slug);
        // $product->price = $request->price;

        // $product->update();

        $category = Category::findOrFail($request->category_id);
        $category->products()->where('id',$product_id)->update([
            'name'=> $request->name,
            'slug'=> Str::slug($request->slug),
            'price'=> $request->price,
        ]);

        return redirect('admin/products')->with('message', 'Product Updated');
    }
}
