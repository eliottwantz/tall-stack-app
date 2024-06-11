<div class='flex flex-col mt-6 gap-y-6'>
    <div class='flex flex-col rounded-lg gap-y-3'>
        @foreach ($posts as $post)
        <div>
            <livewire:posts.show-post :post="$post" :key="$post->id" />
        </div>
        @endforeach
    </div>

    {{ $posts->links() }}
</div>
