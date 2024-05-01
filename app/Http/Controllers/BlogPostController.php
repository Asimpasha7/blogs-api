<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

use App\Http\Controllers\Controller;


class BlogPostController extends Controller
{
    public function index()
    {

        // dd('index');
        $blogPosts = BlogPost::paginate(10);

        // dd($blogPosts);
        return response()->json($blogPosts);
    }

    public function store(Request $request)
    {

        // dd($request);
        // dd($user);
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            // 'author_id' => 'required',
            'author_id' => 'required|exists:users,id',
        ]);

        // dd($request);
        $blogPost = new BlogPost();
        $blogPost->title = $request->title;
        $blogPost->content = $request->content;
        $blogPost->author_id = $request->author_id; 
        $blogPost->save();

        return response()->json($blogPost, 201);
    }

    public function show($id)
    {
        $blogPost = BlogPost::findOrFail($id);
        return response()->json($blogPost);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $blogPost = BlogPost::findOrFail($id);
        $blogPost->title = $request->title;
        $blogPost->content = $request->content;
        $blogPost->save();

        return response()->json($blogPost);
    }

    public function destroy($id)
    {
        $blogPost = BlogPost::findOrFail($id);
        $blogPost->delete();

        return response()->json(null, 204);
    }
}
