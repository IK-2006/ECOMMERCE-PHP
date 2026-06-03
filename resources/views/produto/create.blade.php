<x-layouts::app.sidebar :title="__('Novo Produto')">
    <div class="mx-auto w-full max-w-3xl">
        <div class="mb-6">
            <flux:heading size="xl">{{ __('Novo Produto') }}</flux:heading>
            <flux:subheading>{{ __('Cadastre um novo item no catalogo') }}</flux:subheading>
        </div>

        <div class="rounded-lg border border-zinc-200 bg-white p-6 shadow-xs dark:border-zinc-700 dark:bg-zinc-900">
            <form action="{{ route('produto.store') }}" method="POST" class="space-y-5">
                @include('produto._form', ['buttonText' => 'Criar produto'])
            </form>
        </div>
    </div>
</x-layouts::app.sidebar>
