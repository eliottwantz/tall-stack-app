<div class='flex flex-col mt-6 rounded-lg gap-y-3 mg-white'>
    @foreach ($posts as $post)
    <div>
        <livewire:posts.show-post :post="$post" :key="$post->id" />
    </div>
    @endforeach
</div>
