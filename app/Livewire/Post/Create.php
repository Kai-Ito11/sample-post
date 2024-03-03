<?php

namespace App\Livewire\Post;

use App\Livewire\Actions\PostAction;
use App\Livewire\Forms\Post\CreateForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\{Layout, Title};
use Livewire\{Component, WithFileUploads};

#[Layout('layouts.app')]
#[Title('new Post')]
class Create extends Component
{
    use WithFileUploads;

    public CreateForm $form;
    protected PostAction $action;

    public function __construct()
    {
        $this->action = new PostAction;
    }

    public function render()
    {
        return view('livewire.pages.post.create');
    }

    public function save()
    {
        $validated = $this->form->validatedValues();
        if ($validated['thumbnail']) {
            $this->action->saveThumbnail($validated['thumbnail']);
        }

        /** @var User $user */
        $user = Auth::user();
        $user->posts()->create($validated);

        return to_route('users.posts.index');
    }

    public function resetImage()
    {
        $this->form->thumbnail = null;
    }
}
