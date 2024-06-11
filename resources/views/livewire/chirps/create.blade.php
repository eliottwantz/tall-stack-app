<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Validate;

new class extends Component {
    #[Validate('required|string|min:1|max:255')]
    public string $message = '';

    public function store(): void
    {
        $validated = $this->validate();

        auth()->user()->posts()->create($validated);

        $this->message = '';
    }
};
?>

<div>
    <form wire:submit='store'>
        <textarea wire:model='message' placeholder="What's on your mind?"
            class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>

        <x-input-error :messages="$errors->get('message')" class="mt-2" />
        <x-primary-button class="mt-4">Post</x-primary-button>
    </form>
</div>
