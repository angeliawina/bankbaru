<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return view('admin.category.index', compact('categories'));
    }
    
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        Category::create([
            'name'=> $request->name,
            'slug'=> Str::slug($request->name),
        ]);

        return redirect('admin/category')->with('message','Category Added');
    }

    public function destroy(int $category_id)
    {
        Category::findOrFail($category_id)->delete();
        return redirect('admin/category')->with('message','Category Deleted with all its product');
    }
}
