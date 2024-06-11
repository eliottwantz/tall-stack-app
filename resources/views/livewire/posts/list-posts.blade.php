<div class='flex flex-col mt-6 rounded-lg gap-y-3 mg-white'>
    @foreach ($posts as $post)
    <div class="flex p-6 space-x-2 bg-white rounded-lg shadow-sm" wire:key='{{ $post->id }}'>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
        </svg>
        <div class="flex-1">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-gray-800">{{ $post->user->name }}</span>
                    <small class="ml-2 text-sm text-gray-600">{{ $post->created_at->format('j M Y, g:i a') }}
                    </small>
                    @unless ($post->created_at->eq($post->updated_at))
                    <small>&middot; {{ __('edited') }}</small>
                    @endunless
                </div>

                @if ($post->user->is(auth()->user()))
                <x-dropdown>
                    <x-slot name="trigger">
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link wire:click='edit({{ $post->id }})'>
                            {{ __('Edit') }}
                        </x-dropdown-link>
                        <x-dropdown-link wire:click="delete({{ $post->id }})" wire:confirm="Are you sure to delete this post?">
                            {{ __('Delete') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
                @endif
            </div>
            @if ($post->is($editing))
            <livewire:posts.edit-post :post="$post" :key="$post->id">
                @else
                <p class="mt-4 text-lg text-gray-900">{{ $post->message }}</p>
                @endif
        </div>
    </div>
    @endforeach
</div>