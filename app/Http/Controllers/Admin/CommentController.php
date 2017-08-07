<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Comment;
use App\Post;

class CommentController extends Controller
{
    public function store(Request $request) {

    	$comment = new Comment;

    	$comment->post_id = $request->post_id;
    	$comment->username = "HugoteraLau";
    	$comment->content = $request->content;

    	$comment->save();

    	$post = Post::find($request->post_id);
    	$post->updated_at = date('Y-m-d H:i:s');
    	$post->save();

    	return redirect('/admin');
    }
}
