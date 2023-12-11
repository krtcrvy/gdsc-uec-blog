<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use GrahamCampbell\Markdown\Facades\Markdown;
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
            'body' => 'required',
            'post_image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'tag_id' => 'required',
        ]);

        if ($request->hasFile('post_image_path')) {
            $validatedData['post_image_path'] = $request->file('post_image_path')->store('images', 'public');
        }

        $tag = Tag::findOrFail($validatedData['tag_id']);

        $post = Post::create([
            'user_id' => auth()->user()->id,
            'title' => $validatedData['title'],
            'slug' => Str::slug($validatedData['title'], '-'),
            'body' => Markdown::convert($validatedData['body'])->getContent(),
            'post_image_path' => $validatedData['post_image_path'],
        ]);

        $post->tags()->sync([$tag->id]);

        session()->flash('success', 'Your post has been published!');

        return redirect()->route('posts.show', $post);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tags = Tag::all();

        return view('posts.create', [
            'tags' => $tags,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        return view('posts.show', [
            'post' => $post,
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
