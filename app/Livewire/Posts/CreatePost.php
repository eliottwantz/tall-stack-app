<?php

namespace App\Livewire\Posts;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreatePost extends Component
{
    public string $message = '';

    public function store(): void
    {
        $validated = $this->validate([
            'message' => ['required', 'string', 'min:3', 'max:255'],
        ]);

        auth()->user()->posts()->create($validated);

        $this->message = '';

        $this->dispatch('post-created');
    }

    public function render()
    {
        return view('livewire.posts.create-post');
    }
}
