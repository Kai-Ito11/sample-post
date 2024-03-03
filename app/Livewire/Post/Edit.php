<?php

namespace App\Livewire\Post;

use App\Livewire\Actions\PostAction;
use App\Livewire\Forms\Post\EditForm;
use App\Models\{Post};
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\{Layout, Title};
use Livewire\{Component, WithFileUploads};

#[Layout('layouts.app')]
#[Title('Edit Post')]
class Edit extends Component
{
    use WithFileUploads;

    public EditForm $form;
    public Post $post;
    protected PostAction $action;
    public string | null $tmpImage = null;

    public function render()
    {
        return view('livewire.pages.post.edit');
    }

    public function __construct()
    {
        $this->action = new PostAction;
    }

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->tmpImage = $post->thumbnail;
        $this->form->initValues($this->post->toArray());
    }

    public function resetImage()
    {
        $this->form->thumbnail = null;
        $this->tmpImage = null;
    }

    public function save()
    {
        $validated = $this->form->validatedValues();
        if ($validated['thumbnail']) {
            $validated['thumbnail'] = $this->action->saveThumbnail($validated['thumbnail']);
        }
        if ($this->tmpImage === null && $this->post->thumbnail) {
            $this->action->deleteImage($this->post->thumbnail);
        }
        $this->post->update($validated);
        return to_route('users.posts.index');
    }
}
