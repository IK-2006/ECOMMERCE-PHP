<x-layouts::app.sidebar :title="__('Categoria Produto')">
    <div class="mx-auto flex w-full max-w-7xl flex-col gap-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <flux:heading size="xl">{{ __('Categoria Produto') }}</flux:heading>
                <flux:subheading>
                    {{ __('Vincule categorias aos produtos') }}
                </flux:subheading>
            </div>

            <flux:button
                variant="primary"
                icon="plus"
                :href="route('categoriaprodutos.create')"
                wire:navigate
            >
                {{ __('Nova Categoria Produto') }}
            </flux:button>
        </div>

        <div class="overflow-hidden rounded-lg border border-zinc-200 bg-white shadow-xs dark:border-zinc-700 dark:bg-zinc-900">
            @if ($categoriaprodutos->isEmpty())
                <div class="p-6 text-sm text-zinc-500">
                    {{ __('Nenhuma vinculação cadastrada ainda.') }}
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-b border-zinc-200 bg-zinc-50 text-xs uppercase text-zinc-500 dark:border-zinc-700 dark:bg-zinc-800 dark:text-zinc-400">
                            <tr>
                                <th class="px-4 py-3">Categoria</th>
                                <th class="px-4 py-3">Produto</th>
                                <th class="px-4 py-3 text-right">Ações</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                            @foreach ($categoriaprodutos as $categoriaproduto)
                                <tr>
                                    <td class="px-4 py-3 font-medium">
                                        {{ $categoriaproduto->categoria->nome }}
                                    </td>

                                    <td class="px-4 py-3 text-zinc-500">
                                        {{ $categoriaproduto->produto->nome }}
                                    </td>

                                    <td class="px-4 py-3">
                                        <div class="flex justify-end gap-2">
                                            <flux:button
                                                size="sm"
                                                icon="pencil"
                                                :href="route('categoriaprodutos.edit', $categoriaproduto)"
                                                wire:navigate
                                            >
                                                Editar
                                            </flux:button>

                                            <form
                                                action="{{ route('categoriaprodutos.destroy', $categoriaproduto) }}"
                                                method="POST"
                                                onsubmit="return confirm('Deseja excluir esta vinculação?');"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <flux:button
                                                    size="sm"
                                                    variant="danger"
                                                    icon="trash"
                                                    type="submit"
                                                >
                                                    Excluir
                                                </flux:button>
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