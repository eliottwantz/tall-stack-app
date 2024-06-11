<x-app-layout>
    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        <livewire:posts.create-post />

        {{-- Another way to do it with @livewire --}}
        @livewire('posts.list-posts')
    </div>
</x-app-layout>
