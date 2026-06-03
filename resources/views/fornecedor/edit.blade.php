<x-layouts::app.sidebar :title="__('Editar Fornecedor')">
    <div class="mx-auto w-full max-w-2xl">
        <div class="mb-6">
            <flux:heading size="xl">{{ __('Editar Fornecedor') }}</flux:heading>
            <flux:subheading>{{ __('Atualize os dados do fornecedor') }}</flux:subheading>
        </div>

        <div class="rounded-lg border border-zinc-200 bg-white p-6 shadow-xs dark:border-zinc-700 dark:bg-zinc-900">
            <form action="{{ route('fornecedor.update', $fornecedor) }}" method="POST" class="space-y-5">
                @method('PUT')
                @include('fornecedor._form', ['buttonText' => 'Salvar alteracoes'])
            </form>
        </div>
    </div>
</x-layouts::app.sidebar>
