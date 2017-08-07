<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;

class PostController extends Controller
{
    public function __construct() {
        
        $this->middleware('auth');
    }

    public function index() {

    	$posts = Post::orderBy('updated_at', 'desc')->paginate(10);

    	return view('admin.post.index', compact('posts'));
    }

    public function store(Request $request) {

    	$post = new Post;

    	$post->username = "HugoteraLau";
    	$post->content = $request->content;

    	$post->save();

    	return redirect('/admin');
    }
}
