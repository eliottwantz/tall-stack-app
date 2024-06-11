<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ListPosts extends Component
{
    use WithPagination;

    #[On('post-created')]
    public function refresh()
    {
        $this->redirect(route('posts.index'));
    }

    public function render()
    {
        return view('livewire.posts.list-posts', [
            'posts' => Post::with('user')
                ->latest()
                ->paginate(10)
        ]);
    }
}
