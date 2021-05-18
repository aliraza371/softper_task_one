<?php
 namespace App\Repositories;

 use App\Models\Comment;
 use App\Models\Post;

 class CommentRepository
 {
     protected $comment;

     public function __construct(Comment $comment)
     {
         $this->comment = $comment;

     }

     public function store($data,$id)
     {
         $this->comment->create(['comment'=>$data, 'post_id'=>$id]);
     }
 }
