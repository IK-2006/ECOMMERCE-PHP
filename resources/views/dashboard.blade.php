<x-layouts::app.sidebar :title="__('Dashboard')">
    <div class="mx-auto flex w-full max-w-7xl flex-col gap-6">
        <div>
            <flux:heading size="xl">{{ __('Dashboard') }}</flux:heading>
            <flux:subheading>{{ __('Visao geral do ecommerce') }}</flux:subheading>
        </div>

        <div class="grid gap-4 md:grid-cols-3">
            <div class="rounded-lg border border-zinc-200 bg-white p-5 shadow-xs dark:border-zinc-700 dark:bg-zinc-900">
                <flux:text class="text-sm text-zinc-500">{{ __('Categorias') }}</flux:text>
                <div class="mt-2 text-3xl font-semibold">0</div>
                <flux:text class="mt-1 text-sm text-zinc-500">{{ __('Itens cadastrados') }}</flux:text>
            </div>

            <div class="rounded-lg border border-zinc-200 bg-white p-5 shadow-xs dark:border-zinc-700 dark:bg-zinc-900">
                <flux:text class="text-sm text-zinc-500">{{ __('Produtos') }}</flux:text>
                <div class="mt-2 text-3xl font-semibold">0</div>
                <flux:text class="mt-1 text-sm text-zinc-500">{{ __('Itens cadastrados') }}</flux:text>
            </div>

            <div class="rounded-lg border border-zinc-200 bg-white p-5 shadow-xs dark:border-zinc-700 dark:bg-zinc-900">
                <flux:text class="text-sm text-zinc-500">{{ __('Fornecedores') }}</flux:text>
                <div class="mt-2 text-3xl font-semibold">0</div>
                <flux:text class="mt-1 text-sm text-zinc-500">{{ __('Itens cadastrados') }}</flux:text>
            </div>
        </div>

        <div class="rounded-lg border border-zinc-200 bg-white p-5 shadow-xs dark:border-zinc-700 dark:bg-zinc-900">
            <flux:heading size="lg">{{ __('Atalhos') }}</flux:heading>
            <div class="mt-4 flex flex-wrap gap-3">
                <flux:button :href="route('categoria.index')" icon="tag" wire:navigate>{{ __('Categorias') }}</flux:button>
                <flux:button :href="route('produto.index')" icon="shopping-bag" wire:navigate>{{ __('Produtos') }}</flux:button>
                <flux:button :href="route('fornecedor.index')" icon="truck" wire:navigate>{{ __('Fornecedores') }}</flux:button>
            </div>
        </div>
    </div>
</x-layouts::app.sidebar>
