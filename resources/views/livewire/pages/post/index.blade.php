<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('All Posts') }}
    </h2>
</x-slot>
<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="mb-5 text-end">
                <x-primary-button link href="{{ route('users.posts.create') }}">
                    <span class="material-symbols-outlined fill me-1">
                        add
                    </span>
                    Create New Post
                </x-primary-button>
            </div>
            <div class="grid grid-cols-3 gap-x-6 gap-y-4">
                @foreach ($posts as $post)
                    <livewire:components.post-card :post="$post->toArray()" :key="'post-' . $post->id">
                @endforeach
            </div>
        </div>
    </div>
</div>
