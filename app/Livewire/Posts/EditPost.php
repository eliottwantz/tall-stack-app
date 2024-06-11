<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditPost extends Component
{
    public Post $post;

    #[Validate('required|string|min:3|max:255')]
    public string $message = '';

    public function mount(): void
    {
        $this->message = $this->post->message;
    }

    public function update(): void
    {
        $this->authorize('update', $this->post);

        $validated = $this->validate([
            'message' => ['required', 'string', 'min:3', 'max:255'],
        ]);

        $this->post->update($validated);

        $this->dispatch('post-updated');
    }

    public function cancel(): void
    {
        $this->dispatch('post-edit-canceled');
    }

    public function render()
    {
        return view('livewire.posts.edit-post');
    }
}
