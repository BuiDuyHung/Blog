<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $categories = Category::all();
        return view('layouts.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->title = $request->title;
        $category->save();

        return redirect()->route('category.index')->with('msg', 'Thêm danh mục bài viết thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $category = Category::find($category->id);

        return view('layouts.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $foundCategory = Category::find($category->id);
        if ($foundCategory) {
            $foundCategory->title = $request->title;
            $foundCategory->update();
        }

        return redirect()->route('category.index')->with('msg', 'Cập nhật danh mục bài viết thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($categoryId)
    {
        $category = Category::find($categoryId);
        $category->delete();

        return redirect()->back()->with('msg', 'Xóa danh mục bài viết thành công');
    }
}
