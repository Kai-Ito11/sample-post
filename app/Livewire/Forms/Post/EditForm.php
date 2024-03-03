<?php

namespace App\Livewire\Forms\Post;

use Livewire\Attributes\Validate;
use Livewire\Form;

class EditForm extends Form
{
    #[Validate('required|string|max:30')]
    public string $title = '';

    /** @var TemporaryUploadedFile $thumbnail */
    #[Validate('nullable|file|mimes:jpg,jpeg,png,gif')]
    public $thumbnail;

    #[Validate('required|string')]
    public string $content = '';

    public function validatedValues(): array
    {
        $this->validate();
        return [
            'title' => $this->title,
            'thumbnail' => $this->thumbnail,
            'content' => $this->content
        ];
    }

    public function initValues(array $values): void
    {
        $this->title = $values['title'] ?? '';
        $this->content = $values['content'] ?? '';
    }
}
