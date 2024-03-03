@props(['tag' => null, 'icon' => null])
@php
    $baseClass = 'flex items-center justify-center w-8 h-8 bg-white rounded-full shadow-lg ';
    $clicableClass = $baseClass . 'hover:shadow-none hover:bg-green-100 disabled:bg-gray-100 disabled:cursor-not-allowed';
    $divClass = $baseClass . 'bg-gray-100 cursor-not-allowed';
@endphp

@switch($tag)
    @case('a')
        <a {!! $attributes->merge(['class' => $clicableClass]) !!}>
            <span class="material-symbols-outlined fill">
                {{ $icon }}
            </span>
        </a>
    @break

    @case('d')
        <div {!! $attributes->merge(['class' => $divClass]) !!}>
            <span class="material-symbols-outlined fill">
                {{ $icon }}
            </span>
        </div>
    @break

    @default
        <button {!! $attributes->merge(['class' => $clicableClass]) !!}>
            <span class="material-symbols-outlined fill">
                {{ $icon }}
            </span>
        </button>
@endswitch
