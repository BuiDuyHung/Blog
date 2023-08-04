<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function search(){
        $keywords = $_GET['keywords'];
        $posts = Post::with('category')
            ->where('title','LIKE','%'.$keywords.'%')
            ->orWhere('short_desc','LIKE','%'.$keywords.'%')
            ->orWhere('desc','LIKE','%'.$keywords.'%')
            ->get();

        $categories = Category::all();

        return view('pages.search', compact('categories', 'posts', 'keywords'));
    }

    public function index()
    {
        Paginator::useBootstrap();
        $posts = Post::inRandomOrder()->paginate(5);

        $news = Post::inRandomOrder()->limit(5)->get();
        $views = Post::orderBy('views', 'DESC')->limit(5)->get();
        $categories = Category::all();

        return view('pages.main', compact('categories', 'posts', 'news', 'views'));
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
    public function show(string $id)
    {
        //
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
