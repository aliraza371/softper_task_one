<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService, $data;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index() //show form and all comments
    {
        $posts = $this->postService->show();
        return view('welcome', compact('posts'));
    }

    public function createPost(Request $request) // create new post and redirect to home.
    {

        $this->postService->store($request->all());
        return redirect()->route('home');
    }
}
