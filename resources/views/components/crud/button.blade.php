@props([
    'href' => null,
    'variant' => 'primary',
    'type' => 'button',
])

@php
    $classes = [
        'primary' => 'bg-zinc-900 text-white hover:bg-zinc-700 dark:bg-white dark:text-zinc-900 dark:hover:bg-zinc-200',
        'secondary' => 'border border-zinc-300 bg-white text-zinc-800 hover:bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-100 dark:hover:bg-zinc-800',
        'warning' => 'bg-amber-500 text-white hover:bg-amber-600',
        'danger' => 'bg-red-600 text-white hover:bg-red-700',
    ][$variant];
@endphp

@if ($href)
    <a {{ $attributes->merge(['href' => $href, 'class' => 'inline-flex min-h-9 items-center justify-center rounded-md px-3 py-2 text-sm font-medium transition '.$classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => $type, 'class' => 'inline-flex min-h-9 items-center justify-center rounded-md px-3 py-2 text-sm font-medium transition '.$classes]) }}>
        {{ $slot }}
    </button>
@endif