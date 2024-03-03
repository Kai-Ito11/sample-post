<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('New Post') }}
    </h2>
</x-slot>
<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <form wire:submit="save" enctype="multipart/form-data">
                <div class="mb-3">
                    <x-input-label value="Title" for="title" />
                    <x-text-input name="title" id="title" type="text" class="block w-full" wire:model="form.title" />
                    <x-input-error :messages="$errors->get('form.title')" />
                </div>
                <div class="mb-3">
                    <div class="flex items-end gap-x-3">

                        @if ($form->thumbnail && $form->thumbnail->temporaryUrl())
                            <div>
                                <img src="{{ $form->thumbnail->temporaryUrl() }}" alt="thumbnail preview" width="100" height="100" class="object-fit max-w-[100px] max-h-[100px]">
                            </div>
                        @else
                            <x-input-label for="thumbnail">
                                <x-input-file />
                            </x-input-label>
                        @endif
                        <x-primary-button type="button" wire:click="resetImage">reset</x-primary-button>
                    </div>
                    <input name="thumbnail" id="thumbnail" type="file" class="hidden" aria-label="sr-only" wire:model="form.thumbnail" />
                    <x-input-error :messages="$errors->get('form.thumbnail')" />
                </div>
                <div class="mb-3">
                    <x-input-label value="Content" for="content" />
                    <x-textarea name="content" id="content" type="text" class="block w-full" wire:model="form.content" />
                    <x-input-error :messages="$errors->get('form.content')" />
                </div>
                <div class="flex gap-x-3">
                    <x-primary-button>Create</x-primary-button>
                    <x-secondary-button link href="{{ route('users.posts.index') }}">Cancel</x-secondary-button>
                </div>
            </form>
        </div>
    </div>
</div>
