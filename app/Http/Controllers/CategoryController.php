<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Tool;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $tools = Tool::where('category_id', $category->id)->where('status', 1)->get();
        return view('category.show', compact('tools', 'category'));
    }
}
