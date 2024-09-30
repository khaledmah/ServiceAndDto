<?php
namespace App\Services;

use App\Models\Post;
use App\DTO\PostDTO;

class PostService
{
    public function listPosts()
    {
        return Post::all();
    }

    public function getPostById($id)
    {
        return Post::findOrFail($id);
    }

    public function createPost(PostDTO $postDTO)
    {
        return Post::create($postDTO->toArray());
    }

    public function updatePost(Post $post, PostDTO $postDTO)
    {
        $post->update($postDTO->toArray());
        return $post;
    }

    public function deletePost(Post $post)
    {
        return $post->delete();
    }
}
