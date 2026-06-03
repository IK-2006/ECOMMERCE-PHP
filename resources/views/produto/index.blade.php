<x-layouts::app.sidebar :title="__('Produtos')">
    <div class="mx-auto flex w-full max-w-7xl flex-col gap-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <flux:heading size="xl">{{ __('Produtos') }}</flux:heading>
                <flux:subheading>{{ __('Gerencie o catalogo do ecommerce') }}</flux:subheading>
            </div>

            <flux:button variant="primary" icon="plus" :href="route('produto.create')" wire:navigate>
                {{ __('Novo produto') }}
            </flux:button>
        </div>

        <div class="overflow-hidden rounded-lg border border-zinc-200 bg-white shadow-xs dark:border-zinc-700 dark:bg-zinc-900">
            @if ($produtos->isEmpty())
                <div class="p-6 text-sm text-zinc-500">{{ __('Nenhum produto cadastrado ainda.') }}</div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-b border-zinc-200 bg-zinc-50 text-xs uppercase text-zinc-500 dark:border-zinc-700 dark:bg-zinc-800 dark:text-zinc-400">
                            <tr>
                                <th class="px-4 py-3">{{ __('Nome') }}</th>
                                <th class="px-4 py-3">{{ __('Quantidade') }}</th>
                                <th class="px-4 py-3">{{ __('Preco') }}</th>
                                <th class="px-4 py-3">{{ __('Tamanho') }}</th>
                                <th class="px-4 py-3">{{ __('Marca') }}</th>
                                <th class="px-4 py-3">{{ __('Fornecedor') }}</th>
                                <th class="px-4 py-3 text-right">{{ __('Acoes') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                            @foreach ($produtos as $produto)
                                <tr>
                                    <td class="px-4 py-3 font-medium">{{ $produto->nome }}</td>
                                    <td class="px-4 py-3 text-zinc-500">{{ $produto->quantidade }}</td>
                                    <td class="px-4 py-3 text-zinc-500">{{ $produto->preco }}</td>
                                    <td class="px-4 py-3 text-zinc-500">{{ $produto->tamanho }}</td>
                                    <td class="px-4 py-3 text-zinc-500">{{ $produto->marca }}</td>
                                    <td class="px-4 py-3 text-zinc-500">{{ $produto->fornecedor->nome ?? 'N/A' }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex justify-end gap-2">
                                            <flux:button size="sm" icon="pencil" :href="route('produto.edit', $produto)" wire:navigate>{{ __('Editar') }}</flux:button>
                                            <form action="{{ route('produto.destroy', $produto) }}" method="POST" onsubmit="return confirm('Deseja excluir este produto?');">
                                                @csrf
                                                @method('DELETE')
                                                <flux:button size="sm" variant="danger" icon="trash" type="submit">{{ __('Excluir') }}</flux:button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-layouts::app.sidebar>
