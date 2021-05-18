<?php

namespace App\Repositories;

use http\Env\Request;
use App\Models\Post;

class PostRepository
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;

    }
    
    public function show()
    {
        return $this->post->with('comments')->get();

    }

    public function store($data)
    {
        return $this->post->create($data);

    }

    public function getPostById($id)
    {
        $post = $this->post->findOrFail($id);
        return $post;
    }

    public function destroy($id)
    {
        $this->post->delete($id);
    }
}
