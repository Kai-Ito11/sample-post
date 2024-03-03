<?php

namespace App\Livewire\Post;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\{Post};
use Livewire\Attributes\On;
use Livewire\Attributes\Title;

#[Layout('layouts.app')]
#[Title('All Posts')]
class Index extends Component
{
    public Collection $posts;

    public function render()
    {
        return view('livewire.pages.post.index');
    }

    public function mount()
    {
        $this->posts = Post::with(['user', 'cookingPost', 'readingPost'])->get();
    }
}
