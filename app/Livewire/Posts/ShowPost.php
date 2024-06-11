<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowPost extends Component
{
    public Post $post;
    public bool $editing = false;

    public function edit(): void
    {
        $this->editing = true;
    }

    #[On('post-updated')]
    #[On('post-edit-canceled')]
    public function disableEditing(): void
    {
        $this->editing = false;
    }

    public function delete(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.posts.show-post');
    }
}
