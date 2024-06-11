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
                    <small class="ml-2 text-sm text-gray-600">{{ $post->created_at->format('j M Y, g:i a') }}</small>
                </div>
            </div>
            <p class="mt-4 text-lg text-gray-900">{{ $post->message }}</p>
        </div>
    </div>
    @endforeach
</div>