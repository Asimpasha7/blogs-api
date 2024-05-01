<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\BlogPost;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();

        // dd($comments);
        return response()->json($comments, 200);
    }

    public function store(Request $request)
    {

        // dd($request);
        $validator = Validator::make($request->all(), [
            'content' => 'required|string',
            'blog_post_id' => 'required|exists:blog_posts,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // $user = Auth::user();

        $user = DB::table('blog_posts')
        ->where('id',$request->blog_post_id)
        ->first()->author_id;

        // dd($user);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = $user;
        $comment->blog_post_id = $request->blog_post_id;
        $comment->save();

        return response()->json($comment, 201);
    }

    public function show($id)
    {
        // dd($id);
        $comment = Comment::findOrFail($id);

        // dd($comment);
        return response()->json($comment, 200);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $comment->content = $request->content;
        $comment->save();

        return response()->json($comment, 200);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully'], 200);
    }
}
