<?php
 namespace App\Services;

 use App\Repositories\CommentRepository;

 class CommentService
 {
     protected $commentRepository;

     public function __construct(CommentRepository $commentRepository)
     {
      $this->commentRepository = $commentRepository;
     }

     public function store($request,$id)
     {
         $comment = $request->comment;

         $this->commentRepository->store($comment,$id);

     }

 }
