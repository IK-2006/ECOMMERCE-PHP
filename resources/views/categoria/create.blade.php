<x-layouts::app.sidebar :title="__('Nova Categoria')">
    <div class="mx-auto w-full max-w-2xl">
        <div class="mb-6">
            <flux:heading size="xl">{{ __('Nova Categoria') }}</flux:heading>
            <flux:subheading>{{ __('Cadastre uma nova categoria de produtos') }}</flux:subheading>
        </div>

        <div class="rounded-lg border border-zinc-200 bg-white p-6 shadow-xs dark:border-zinc-700 dark:bg-zinc-900">
            <form action="{{ route('categoria.store') }}" method="POST" class="space-y-5">
                @include('categoria._form', ['buttonText' => 'Criar categoria'])
            </form>
        </div>
    </div>
</x-layouts::app.sidebar>
