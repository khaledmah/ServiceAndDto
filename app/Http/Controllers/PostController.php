<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use App\DTO\PostDTO;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->listPosts();
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = $this->postService->getPostById($id);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
        ]);

        $postDTO = new PostDTO($validated['title'], $validated['content'], $validated['author']);
        $this->postService->createPost($postDTO);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
        ]);

        $postDTO = new PostDTO($validated['title'], $validated['content'], $validated['author']);
        $this->postService->updatePost($post, $postDTO);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $this->postService->deletePost($post);
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
