<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::has('products')->get();
        
        return view('categories', [
            'categories' => $categories
        ]);
    }

    public function adminIndex()
    {
        $categories = Category::get();
        
        return view('admin.categories', [
            'categories' => $categories
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminCreate()
    {
         return view('admin.add-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adminStore(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'pic_path' => 'required|image',
        ]);

        $attributes['pic_path'] = $request->file('pic_path')->store('categories');
        Category::create($attributes);
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::with('products')->find($id);
        
        return view('category', [
            'category' => $category
        ]);
    }

    public function adminShow($id)
    {
        $category = Category::with('products')->find($id);
        
        return view('admin.category', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function adminEdit(Category $category)
    {
        return view('admin.edit-category', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function adminUpdate(Request $request, Category $category)
    {
         $attributes = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'pic_path' => 'image',
        ]);

        if(isset($attributes['pic_path'])) {
            $attributes['pic_path'] = $request->file('pic_path')->store('categories');
        }

        $category->update($attributes);
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function adminDestroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
