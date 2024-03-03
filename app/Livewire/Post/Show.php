<?php

namespace App\Livewire\Post;

use App\Models\{Post};
use Livewire\Attributes\{Layout};
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class Show extends Component
{
    use WithPagination;

    public function render()
    {
        $post = Post::paginate(1);
        return view('livewire.pages.post.show', ['post' => $post])
            ->title('Show Post');
    }
}
