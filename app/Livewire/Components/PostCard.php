<?php

namespace App\Livewire\Components;

use App\Livewire\Post\Index;
use App\Traits\Livewire\FavoriteTrait;
use Livewire\Component;

class PostCard extends Component
{
    use FavoriteTrait;

    public array $post;

    public function render()
    {
        return view('livewire.components.post-card');
    }

    public function mount(array $post)
    {
        $this->post = $post;
    }

    public function favorite(): void
    {
        $res = $this->toggleFavorite($this->post['id']);
        $this->post['is_favorited'] = !$this->post['is_favorited'];
    }
}
