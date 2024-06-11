<div class='flex flex-col mt-6 gap-y-6'>

    <div id="posts" class='flex flex-col rounded-lg gap-y-3'>
        @foreach ($posts as $post)
        <div>
            <livewire:posts.show-post :post="$post" :key="$post->id" />
        </div>
        @endforeach
    </div>

    {{ $posts->links(data: ['scrollTo' => '#posts']) }}
    <button class="scroll-to-top" x-data @click="window.scrollTo({ top: 0, behavior: 'smooth' })">
        Scroll to Top
    </button>
</div>
