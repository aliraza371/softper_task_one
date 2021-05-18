<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
    $this->commentService = $commentService;
    }

    public function store(Request $request,$id) // store the comments again specific post
    {
      $this->commentService->store($request,$id);
        return redirect()->route('home');
    }
}
