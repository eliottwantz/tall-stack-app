<?php

namespace App\Livewire\Chirps;

use Livewire\Component;

class Create extends Component
{
    public string $message = '';

    public function store(): void
    {
        $validated = $this->validate([
            'message' => ['required', 'string', 'min:3', 'max:255'],
        ]);

        auth()->user()->posts()->create($validated);

        $this->message = '';
    }

    public function render()
    {
        return view('livewire.chirps.create');
    }
}
