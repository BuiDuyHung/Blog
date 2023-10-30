<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Paginator::useBootstrap();
        $posts = Post::with('category')->orderBy('id', 'desc')->paginate(5);
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
        $post->views = $request->views;
        $post->short_desc = $request->short_desc;
        $post->desc = $request->desc;
        $post->category_id = $request->category_id;
        $post->post_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');

        if($request->image){
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $name = time().'_'.$image->getClientOriginalName();
            Storage::disk('public')->put($name, File::get($image));
            $post->image = $name;
        }
        // else{
        //     $post->image = 'default.jpg';
        // }
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
    public function edit($postId)
    {
        $post = Post::find($postId);
        $categories = Category::all();

        return view('layouts.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $postId)
    {
        $post = Post::find($postId);
        $post->title = $request->title;
        $post->views = $request->views;
        $post->short_desc = $request->short_desc;
        $post->desc = $request->desc;
        $post->category_id = $request->category_id;
        $post->post_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');

        if($request->image){
            unlink('uploads/'.$post->image);
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $name = time().'_'.$image->getClientOriginalName();
            Storage::disk('public')->put($name, File::get($image));
            $post->image = $name;
        }
        $post->save();

        return redirect()->route('post.index')->with('msg', 'Cập nhật bài viết thành công');
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
