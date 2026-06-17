<x-layouts.app.sidebar :title="__('Produtos')">
    <div class="mx-auto flex w-full max-w-7xl flex-col gap-6">
        
        {{-- Cabeçalho --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <flux:heading size="xl">{{ __('Nossa Loja') }}</flux:heading>
                <flux:subheading>{{ __('Confira nossos produtos disponíveis') }}</flux:subheading>
            </div>

            {{-- Mantive o botão de criar apenas para você (admin), se quiser esconder dos clientes, remova esta div --}}
            <flux:button variant="primary" icon="plus" :href="route('produto.create')" wire:navigate>
                {{ __('Novo produto') }}
            </flux:button>
        </div>

        {{-- Grid de Produtos (Estilo E-commerce) --}}
        @if ($produtos->isEmpty())
            <div class="rounded-lg border border-zinc-200 bg-white p-6 text-center text-sm text-zinc-500 dark:border-zinc-700 dark:bg-zinc-900">
                {{ __('Nenhum produto cadastrado ainda.') }}
            </div>
        @else
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($produtos as $produto)
                    <div class="flex flex-col overflow-hidden rounded-lg border border-zinc-200 bg-white shadow-sm transition-shadow hover:shadow-md dark:border-zinc-700 dark:bg-zinc-900">
                        
                        {{-- Imagem do Produto --}}
                        <div class="aspect-square w-full overflow-hidden bg-zinc-100 dark:bg-zinc-800">
                            @if ($produto->imagem)
                                <img src="{{ asset('storage/' . $produto->imagem) }}" alt="{{ $produto->nome }}" class="h-full w-full object-cover">
                            @else
                                <div class="flex h-full items-center justify-center text-zinc-400">
                                    <svg class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                        </div>

                        {{-- Informações do Produto --}}
                        <div class="flex flex-1 flex-col p-4">
                            <h3 class="text-lg font-medium text-zinc-900 dark:text-white">{{ $produto->nome }}</h3>
                            
                            <div class="mt-2 space-y-1 text-sm text-zinc-600 dark:text-zinc-400">
                                <p><span class="font-medium">Marca:</span> {{ $produto->marca }}</p>
                                <p><span class="font-medium">Tamanho:</span> {{ $produto->tamanho }}</p>
                            </div>

                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-xl font-bold text-emerald-600 dark:text-emerald-400">
                                    R$ {{ number_format($produto->preco, 2, ',', '.') }}
                                </span>
                                <span class="text-xs text-zinc-500">
                                    Estoque: {{ $produto->quantidade }}
                                </span>
                            </div>

                           <form action="{{ route('carrinho.adicionar') }}" method="POST" class="mt-4"> <!-- Use 'carrinho.adicionar' -->
                                @csrf
                                <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                                <input type="hidden" name="quantidade" value="1">
                                <flux:button type="submit" variant="primary" icon="shopping-cart" class="w-full justify-center">
                                    Adicionar ao Carrinho
                                </flux:button>
                            </form>   
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layouts.app.sidebar>   