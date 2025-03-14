<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'body' => 'required|string|max:255',
            'commentable_id' => 'required|exists:posts,id',
            'commentable_type' => 'required|string|in:App\Models\Post',
        ]);

        $post=Post::find($request->commentable_id);
        $post->comments()->create([
            'body' => $request->body,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully');
    }
    public function destroy(Comment $comment){
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully');
    }
}
