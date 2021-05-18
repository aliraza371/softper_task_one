<?php

namespace App\Services;

use App\Repositories\PostRepository;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
     $this->postRepository = $postRepository;
    }

    public function show()
    {
        return $this->postRepository->show();
    }

    public function getPostById($id)
    {
        $posts = $this->postRepository->getPostById($id);
        return $posts;
    }

    public function store($request)
    {
        $this->postRepository->store($request);
    }

}
