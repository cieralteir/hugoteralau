<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use App\Post;

class CommentController extends Controller
{
    public function store(Request $request) {

    	$comment = new Comment;

        $comment->post_id = $request->post_id;

        if ($request->content != "") {

            $post = Post::find($request->post_id);
            $post->updated_at = date('Y-m-d H:i:s');
            $post->save();

            if ($request->username == "") {
                $comment->username = "Anonymous";
                $comment->content = $request->content;
                
                $comment->save();
            } else if ($request->username != "HugoteraLau") {
                $comment->username = $request->username;
                $comment->content = $request->content;
                
                $comment->save();
            }
        }

    	return redirect('/');
    }
}
