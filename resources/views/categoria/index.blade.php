<x-layouts::app.sidebar :title="__('Categorias')">
    <div class="mx-auto flex w-full max-w-7xl flex-col gap-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <flux:heading size="xl">{{ __('Categorias') }}</flux:heading>
                <flux:subheading>{{ __('Organize os produtos por categoria') }}</flux:subheading>
            </div>

            <flux:button variant="primary" icon="plus" :href="route('categoria.create')" wire:navigate>
                {{ __('Nova categoria') }}
            </flux:button>
        </div>

        <div class="overflow-hidden rounded-lg border border-zinc-200 bg-white shadow-xs dark:border-zinc-700 dark:bg-zinc-900">
            @if ($categoria->isEmpty())
                <div class="p-6 text-sm text-zinc-500">{{ __('Nenhuma categoria cadastrada ainda.') }}</div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-b border-zinc-200 bg-zinc-50 text-xs uppercase text-zinc-500 dark:border-zinc-700 dark:bg-zinc-800 dark:text-zinc-400">
                            <tr>
                                <th class="px-4 py-3">{{ __('Nome') }}</th>
                                <th class="px-4 py-3">{{ __('Criado em') }}</th>
                                <th class="px-4 py-3 text-right">{{ __('Acoes') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                            @foreach ($categoria as $item)
                                <tr>
                                    <td class="px-4 py-3 font-medium">{{ $item->nome }}</td>
                                    <td class="px-4 py-3 text-zinc-500">{{ $item->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex justify-end gap-2">
                                            <flux:button size="sm" icon="pencil" :href="route('categoria.edit', $item)" wire:navigate>{{ __('Editar') }}</flux:button>
                                            <form action="{{ route('categoria.destroy', $item) }}" method="POST" onsubmit="return confirm('Deseja excluir esta categoria?');">
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
