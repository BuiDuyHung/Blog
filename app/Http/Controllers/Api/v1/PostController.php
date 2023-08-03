<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category')->orderBy('id', 'desc')->get();
        return view('layouts.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('layouts.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->short_desc = $request->short_desc;
        $post->desc = $request->desc;
        $post->category_id = $request->category_id;
        if($request->image){
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $name = time().'_'.$image->getClientOriginalName();
            Storage::disk('public')->put($name, File::get($image));
            $post->image = $name;
        }else{
            $post->image = 'default.jpg';
        }
        $post->save();

        return redirect()->route('post.index')->with('msg', 'Thêm bài viết thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($postId)
    {   
        $path = 'uploads/';
        $post = Post::find($postId);
        unlink($path.$post->image);
        $post->delete();
        
        return redirect()->back()->with('msg', 'Xóa bài viết thành công');
    }
}
