<?php

namespace App\Livewire;

use App\Models\Post as Posts;
use Livewire\Component;
use Livewire\WithPagination;

class BlogGrid extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.blog-grid', [
            'posts' => Posts::with('tags')->paginate(6),
        ]);
    }
}
