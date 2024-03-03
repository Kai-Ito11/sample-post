<div class="relative block p-5 border rounded shadow-lg hover:shadow-none">
    <div class="flex w-full">
        <div class="flex items-center justify-start gap-x-1">
            <a href="{{ route('users.posts.edit', $post['id']) }}" class="flex items-center justify-center w-10 h-10 text-sm rounded-full hover:bg-gray-100">
                <span class="material-symbols-outlined fill">edit</span>
            </a>
            <h4 class="text-xl font-bold capitalize">
                {{ $post['title'] }}
            </h4>
        </div>
        <button type="button" class="flex items-center justify-center w-10 h-10 m-2 rounded-full ms-auto hover:bg-gray-100" wire:click="favorite" wire:loading.attr="disabled">
            <span class="material-symbols-outlined animate-spin" wire:loading>
                favorite
            </span>
            @if ($post['is_favorited'])
                <span class="material-symbols-outlined fill" wire:loading.remove>
                    favorite
                </span>
            @else
                <span class="material-symbols-outlined line" wire:loading.remove>
                    favorite
                </span>
            @endif
        </button>
    </div>

    <div class="flex justify-between mb-3 text-sm text-gray-400">
        <span>{{ $post['user']['name'] }}</span>
        <span>{{ $post['created_at'] }}</span>
    </div>
    <a href="{{ route('users.posts.show') }}">
        <div class="bg-slate-400 mb-3 min-h-[150px] w-full flex items-center justify-center text-white">
            @if ($post['thumbnail'])
                <img src="{{ asset('storage' . $post['thumbnail']) }}" alt="post image" width="100" height="100" class="w-full h-[150px] object-cover">
            @else
                <span>No image</span>
            @endif
        </div>
        <p class="h-[3rem] line-clamp-1">{{ $post['content'] }}</p>
    </a>
</div>
