<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|max:50|min:1',
            'post_image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'post-trixFields' => 'required',
            'attachment-post-trixFields' => 'nullable',
        ]);

        if ($request->hasFile('post_image_path')) {
            $validatedData['post_image_path'] = $request->file('post_image_path')->store('images', 'public');
        }

        $post = Post::create([
            'user_id' => $request->user()->id,
            'title' => $validatedData['title'],
            'slug' => Str::slug($validatedData['title'], '-'),
            'post_image_path' => $validatedData['post_image_path'],
            'post-trixFields' => $validatedData['post-trixFields'],
            'attachment-post-trixFields' => $validatedData['attachment-post-trixFields'],
        ]);

        session()->flash('success', 'Your post has been published!');

        return redirect()->route('posts.show', $post);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('posts.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        $post_content = $post->trix_rich_texts->first()->content;

        return view('posts.show', [
            'post' => $post,
            'post_content' => $post_content,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
