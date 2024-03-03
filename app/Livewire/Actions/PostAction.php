<?php

namespace App\Livewire\Actions;

use Illuminate\Support\Facades\Storage;

/**
 * @method string saveThumbnail()
 */
class PostAction
{
    public function saveThumbnail($file): string
    {
        $name = time() . '.' . $file->getClientOriginalExtension();
        $path = '/posts/';
        $file->storeAs(path: $path, name: $name, options: ['disk' => 'public']);
        return $path . $name;
    }

    public function deleteImage($imageUrl): void
    {
        if (Storage::disk('public')->exists($imageUrl)) {
            Storage::disk('public')->delete($imageUrl);
        }
    }
}
