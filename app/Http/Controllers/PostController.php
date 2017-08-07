<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
    public function index() {

    	$posts = Post::orderBy('updated_at', 'desc')->paginate(10);
        return view('user.post.index', compact('posts'));
    }

    public function store(Request $request) {

    	$post = new Post;

        if ($request->content != "")
            if ($request->username == "") {
            	$post->username = "Anonymous";
                $post->content = $request->content;
                
                $post->save();
            } else if ($request->username != "HugoteraLau") {
                $post->username = $request->username;
                $post->content = $request->content;
                
                $post->save();
            }

    	return redirect('/');
    }
}
