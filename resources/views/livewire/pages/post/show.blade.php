<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Show Post') }}
    </h2>
</x-slot>
<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center justify-evenly">
            @if ($post->onFirstPage())
                <x-btn.icon tag="d" icon="arrow_back" />
            @else
                <x-btn.icon icon="arrow_back" wire:click="previousPage('{{ $post->getPageName() }}')" />
            @endif

            <div class="w-[80%] lg:w-2/3 p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg h-[50vh]">
                <div class="flex justify-between w-full">
                    <x-btn.icon tag="a" icon="arrow_back" href="{{ route('users.posts.index') }}" class="shadow-none" />
                    <h2 class="text-lg text-center capitalize">{{ $post[0]->title }}</h2>
                    <x-btn.icon tag="a" icon="edit" href="{{ route('users.posts.edit', $post['0']->id) }}" class="shadow-none" />
                </div>
                @if ($post[0]->thumbnail)
                    <img src="{{ asset('/storage/' . $post[0]->thumbnail) }}" alt="thumbnail image">
                @else
                @endif
            </div>

            @if (!$post->hasMorePages())
                <x-btn.icon tag="d" icon="arrow_forward" />
            @else
                <x-btn.icon icon="arrow_forward" wire:click="nextPage('{{ $post->getPageName() }}')" />
            @endif
        </div>
        <div class="mt-10 text-center">
            <p class="text-sm leading-5 text-gray-700">
                <span>{!! __('Showing') !!}</span>
                <span class="font-medium">{{ $post->firstItem() }}</span>
                <span>{!! __('of') !!}</span>
                <span class="font-medium">{{ $post->total() }}</span>
                <span>{!! __('results') !!}</span>
            </p>
        </div>
    </div>
</div>
