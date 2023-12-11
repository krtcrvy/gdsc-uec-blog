<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class BlogGrid extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.blog-grid', [
            'posts' => Post::latest()->paginate(10),
        ]);
    }
}
