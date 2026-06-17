<x-layouts.app.sidebar :title="__('Carrinho de Compras')">
    <div class="mx-auto flex w-full max-w-4xl flex-col gap-6">
        
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <flux:heading size="xl">{{ __('Seu Carrinho') }}</flux:heading>
                <flux:subheading>{{ __('Revise os itens antes de finalizar') }}</flux:subheading>
            </div>
        </div>

        @if ($itens->isEmpty())
            <div class="rounded-lg border border-zinc-200 bg-white p-6 text-center text-sm text-zinc-500 dark:border-zinc-700 dark:bg-zinc-900">
                {{ __('Seu carrinho está vazio.') }}
                <div class="mt-4">
                    <flux:button :href="route('loja.produtos.index')" variant="primary">
                        {{ __('Voltar às Compras') }}
                    </flux:button>
                </div>
            </div>
        @else
            <div class="overflow-hidden rounded-lg border border-zinc-200 bg-white shadow-xs dark:border-zinc-700 dark:bg-zinc-900">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-b border-zinc-200 bg-zinc-50 text-xs uppercase text-zinc-500 dark:border-zinc-700 dark:bg-zinc-800 dark:text-zinc-400">
                            <tr>
                                <th class="px-4 py-3">{{ __('Produto') }}</th>
                                <th class="px-4 py-3 text-center">{{ __('Quantidade') }}</th>
                                <th class="px-4 py-3 text-right">{{ __('Preço Unitário') }}</th>
                                <th class="px-4 py-3 text-right">{{ __('Subtotal') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                            @foreach ($itens as $item)
                                <tr>
                                    <td class="px-4 py-3 font-medium">
                                        <div class="flex items-center">
                                            @if ($item['produto']->imagem)
                                                <img src="{{ asset('storage/' . $item['produto']->imagem) }}" alt="{{ $item['produto']->nome }}" class="h-12 w-12 object-cover rounded mr-3">
                                            @endif
                                            <span>{{ $item['produto']->nome }}</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-center text-zinc-500">
                                        {{ $item['quantidade'] }}
                                    </td>
                                    <td class="px-4 py-3 text-right text-zinc-500">
                                        R$ {{ number_format($item['produto']->preco, 2, ',', '.') }}
                                    </td>
                                    <td class="px-4 py-3 text-right font-medium">
                                        R$ {{ number_format($item['subtotal'], 2, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-zinc-50 dark:bg-zinc-800">
                            <tr>
                                <th colspan="3" class="px-4 py-3 text-right text-lg font-semibold text-zinc-900 dark:text-white">
                                    {{ __('Total:') }}
                                </th>
                                <th class="px-4 py-3 text-right text-lg font-bold text-emerald-600 dark:text-emerald-400">
                                    R$ {{ number_format($total, 2, ',', '.') }}
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <div class="flex flex-wrap gap-2 justify-end">
                <flux:button :href="route('loja.produtos.index')" variant="secondary">
                    {{ __('Continuar Comprando') }}
                </flux:button>
                <flux:button variant="primary">
                    {{ __('Finalizar Compra') }}
                </flux:button>
            </div>
        @endif
    </div>
</x-layouts.app.sidebar>   