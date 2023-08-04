<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryControllerV1 extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {   
        $posts = Post::with('category')->where('category_id', $id)->get();
        $categories = Category::all();
        $title_category = Category::find($id);
        $views_category = Post::with('category')->orderBy('views', 'DESC')->where('category_id', $id)->limit(5)->get();
        $category_recomment = Category::whereNotIn('id',[$id])->get();

        return view('pages.category', compact('categories', 'posts', 'title_category', 'views_category', 'category_recomment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
