<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class ListPosts extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.posts.list-posts', [
            'posts' => Post::with('user')->paginate(10),
        ]);
    }
}
