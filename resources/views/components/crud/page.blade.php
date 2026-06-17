@props([
    'title',
    'description' => null,
])

<x-layouts.app :title="$title">
    <div class="mx-auto flex w-full max-w-6xl flex-col gap-6">
        <div class="flex flex-col gap-4 border-b border-zinc-200 pb-6 dark:border-zinc-700 md:flex-row md:items-start md:justify-between">
            <div class="space-y-1">
                <h1 class="text-2xl font-semibold tracking-normal text-zinc-950 dark:text-white">{{ $title }}</h1>

                @if ($description)
                    <p class="max-w-2xl text-sm text-zinc-600 dark:text-zinc-400">{{ $description }}</p>
                @endif
            </div>

            @isset($actions)
                <div class="flex flex-wrap items-center gap-2">
                    {{ $actions }}
                </div>
            @endisset
        </div>

        @if (session('success'))
            <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800 dark:border-emerald-900/60 dark:bg-emerald-950/40 dark:text-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800 dark:border-red-900/60 dark:bg-red-950/40 dark:text-red-200">
                <p class="font-medium">Revise os campos destacados e tente novamente.</p>
            </div>
        @endif

        {{ $slot }}
    </div>
</x-layouts.app>