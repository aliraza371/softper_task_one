<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use App\Services\SendEmailService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentService;
    protected $sendEmailService;

    public function __construct(CommentService $commentService,
                                SendEmailService $sendEmailService)
    {
        $this->commentService = $commentService;
        $this->sendEmailService = $sendEmailService;
    }

    public function store(Request $request, $id) // store the comments again specific post
    {
        $this->commentService->store($request, $id);
        return redirect()->route('home');
    }

    public function sendEmail()
    {
        $this->sendEmailService->sendEmail($this->sendEmailService->fetch());
    }

}
