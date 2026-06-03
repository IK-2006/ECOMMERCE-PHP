<x-layouts::app.sidebar :title="__('Editar Categoria')">
    <div class="mx-auto w-full max-w-2xl">
        <div class="mb-6">
            <flux:heading size="xl">{{ __('Editar Categoria') }}</flux:heading>
            <flux:subheading>{{ __('Atualize os dados da categoria') }}</flux:subheading>
        </div>

        <div class="rounded-lg border border-zinc-200 bg-white p-6 shadow-xs dark:border-zinc-700 dark:bg-zinc-900">
            <form action="{{ route('categoria.update', $categoria) }}" method="POST" class="space-y-5">
                @method('PUT')
                @include('categoria._form', ['buttonText' => 'Salvar alteracoes'])
            </form>
        </div>
    </div>
</x-layouts::app.sidebar>
