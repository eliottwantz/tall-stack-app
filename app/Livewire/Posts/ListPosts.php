<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class ListPosts extends Component
{
    public Collection $posts;

    public function mount(): void
    {
        $this->getPosts();
    }

    #[On('post-created')]
    public function getPosts(): void
    {
        $this->posts = Post::with('user')
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.posts.list-posts');
    }
}
