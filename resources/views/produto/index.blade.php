<x-layouts::app.sidebar :title="__('Produtos')">

<div class="mx-auto max-w-7xl space-y-8">

    <!-- Cabeçalho -->
    <div class="rounded-3xl bg-gradient-to-r from-violet-600 via-indigo-600 to-blue-600 p-8 shadow-xl">

        <div class="flex items-center justify-between">

            <div>

                <h1 class="text-4xl font-bold text-white">
                    Produtos
                </h1>

                <p class="mt-2 text-indigo-100">
                    Gerencie o catálogo da sua loja.
                </p>

            </div>

            <flux:button
                variant="primary"
                icon="plus"
                :href="route('produto.create')"
                wire:navigate
                class="!bg-white !text-indigo-700 hover:scale-105 transition">

                Novo Produto

            </flux:button>

        </div>

    </div>

    <!-- Lista -->
    <div class="rounded-3xl border border-zinc-800 bg-zinc-900 shadow-xl">

        <div class="flex items-center justify-between border-b border-zinc-800 p-6">

            <div>

                <h2 class="text-xl font-bold text-white">
                    Catálogo
                </h2>

                <p class="text-sm text-zinc-400 mt-1">
                    {{ $produtos->count() }} produto(s) cadastrado(s)
                </p>

            </div>

        </div>

        @if ($produtos->isEmpty())

            <div class="py-24 text-center">

                <div class="text-7xl">
                    📦
                </div>

                <h2 class="mt-6 text-2xl font-bold text-white">
                    Nenhum produto cadastrado
                </h2>

                <p class="mt-3 text-zinc-400">
                    Cadastre seu primeiro produto.
                </p>

            </div>

        @else

        <div class="grid gap-8 p-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

            @foreach ($produtos as $produto)

            <div class="group overflow-hidden rounded-3xl border border-zinc-800 bg-zinc-950 transition duration-300 hover:-translate-y-2 hover:border-indigo-500 hover:shadow-2xl hover:shadow-indigo-500/20">

                <!-- Imagem -->

                <div class="relative aspect-square overflow-hidden">

                    <img
                        src="{{ asset('storage/'.$produto->imagem) }}"
                        alt="{{ $produto->nome }}"
                        class="h-full w-full object-cover transition duration-500 group-hover:scale-110">

                    <div class="absolute left-4 top-4 rounded-full bg-white/90 px-3 py-1 text-xs font-bold text-black">

                        {{ $produto->marca }}

                    </div>

                </div>

                <!-- Conteúdo -->

                <div class="space-y-4 p-6">

                    <div>

                        <h3 class="text-xl font-bold text-white">

                            {{ $produto->nome }}

                        </h3>

                        <p class="mt-2 text-sm text-zinc-400">

                            Tamanho {{ $produto->tamanho }}

                        </p>

                    </div>

                    <div class="flex items-center justify-between">

                        <span class="text-2xl font-bold text-emerald-400">

                            R$ {{ number_format($produto->preco,2,',','.') }}

                        </span>

                    </div>

                    <div class="flex gap-2 pt-2">

                        <a
                            href="{{ route('produto.edit',$produto) }}"
                            class="flex-1 rounded-xl bg-amber-500 py-2 text-center text-sm font-semibold text-white transition hover:bg-amber-400">

                            Editar

                        </a>

                        <form
                            class="flex-1"
                            action="{{ route('produto.destroy',$produto) }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Deseja excluir este produto?')"
                                class="w-full rounded-xl bg-red-600 py-2 text-sm font-semibold text-white transition hover:bg-red-500">

                                Excluir

                            </button>

                        </form>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

        @endif

    </div>

</div>

</x-layouts::app.sidebar>