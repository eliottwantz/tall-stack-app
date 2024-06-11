<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class ListPosts extends Component
{
    public Collection $posts;
    public ?Post $editing = null;

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

    public function edit(Post $post): void
    {
        $this->editing = $post;

        $this->getPosts();
    }

    #[On('post-updated')]
    #[On('post-edit-canceled')]
    public function disableEditing(): void
    {
        $this->editing = null;

        $this->getPosts();
    }

    public function delete(Post $post): void
    {
        $this->authorize('delete', $post);

        $post->delete();

        $this->getPosts();
    }

    public function render()
    {
        return view('livewire.posts.list-posts');
    }
}
