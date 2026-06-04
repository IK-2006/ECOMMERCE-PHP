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
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

    @foreach ($produtos as $produto)
        <div class="overflow-hidden rounded-2xl bg-white shadow-md transition duration-300 hover:-translate-y-1 hover:shadow-xl">

            <div class="aspect-square overflow-hidden bg-gray-100">
                <img
                    src="{{ asset('storage/' . $produto->imagem) }}"
                    alt="{{ $produto->nome }}"
                    class="h-full w-full object-cover transition duration-500 hover:scale-110"
                >
            </div>

            <div class="p-4">
                <p class="text-xs uppercase tracking-wider text-gray-500">
                    {{ $produto->marca }}
                </p>

                <h3 class="mt-1 text-lg font-semibold text-gray-900">
                    {{ $produto->nome }}
                </h3>

                <p class="mt-1 text-sm text-gray-500">
                    Tamanho: {{ $produto->tamanho }}
                </p>

                <div class="mt-3 flex items-center justify-between">
                    <span class="text-xl font-bold text-black">
                        R$ {{ number_format($produto->preco, 2, ',', '.') }}
                    </span>

                    <div class="flex gap-2">
                        <a href="{{ route('produto.edit', $produto) }}"
                           class="rounded-lg bg-black px-3 py-2 text-white text-sm">
                            Editar
                        </a>

                        <form action="{{ route('produto.destroy', $produto) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Deseja excluir este produto?')"
                                class="rounded-lg bg-red-600 px-3 py-2 text-white text-sm">
                                Excluir
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    @endforeach

</div>
            @endif
        </div>
    </div>
</x-layouts::app.sidebar>
