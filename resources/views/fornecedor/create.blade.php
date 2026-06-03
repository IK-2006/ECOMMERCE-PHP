<x-layouts::app.sidebar :title="__('Novo Fornecedor')">
    <div class="mx-auto w-full max-w-2xl">
        <div class="mb-6">
            <flux:heading size="xl">{{ __('Novo Fornecedor') }}</flux:heading>
            <flux:subheading>{{ __('Cadastre um novo fornecedor') }}</flux:subheading>
        </div>

        <div class="rounded-lg border border-zinc-200 bg-white p-6 shadow-xs dark:border-zinc-700 dark:bg-zinc-900">
            <form action="{{ route('fornecedor.store') }}" method="POST" class="space-y-5">
                @include('fornecedor._form', ['buttonText' => 'Criar fornecedor'])
            </form>
        </div>
    </div>
</x-layouts::app.sidebar>
