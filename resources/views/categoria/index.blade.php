<x-layouts::app.sidebar :title="__('Categorias')">

<div class="mx-auto max-w-7xl space-y-8">

    <!-- Cabeçalho -->

    <div class="rounded-3xl bg-gradient-to-r from-indigo-600 via-blue-600 to-cyan-600 p-8 shadow-xl">

        <div class="flex items-center justify-between">

            <div>

                <h1 class="text-4xl font-bold text-white">
                    Categorias
                </h1>

                <p class="mt-2 text-blue-100">
                    Organize todos os produtos da sua loja.
                </p>

            </div>

            <a href="{{ route('categoria.create') }}"
               class="rounded-xl bg-white px-6 py-3 font-semibold text-indigo-700 transition hover:scale-105">

                + Nova Categoria

            </a>

        </div>

    </div>

    <!-- Card -->

    <div class="rounded-3xl border border-zinc-800 bg-zinc-900 shadow-xl">

        <div class="flex items-center justify-between border-b border-zinc-800 p-6">

            <div>

                <h2 class="text-xl font-bold text-white">

                    Lista de Categorias

                </h2>

                <p class="text-sm text-zinc-400">

                    {{ $categoria->count() }} categoria(s) cadastrada(s)

                </p>

            </div>

        </div>

        @if($categoria->isEmpty())

            <div class="py-20 text-center">

                <div class="text-6xl">

                    📂

                </div>

                <h2 class="mt-6 text-2xl font-bold text-white">

                    Nenhuma categoria encontrada

                </h2>

                <p class="mt-3 text-zinc-400">

                    Clique em "Nova Categoria" para começar.

                </p>

            </div>

        @else

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="border-b border-zinc-800 bg-zinc-950">

                    <tr>

                        <th class="px-8 py-5 text-left text-xs uppercase tracking-wider text-zinc-400">
                            Nome
                        </th>

                        <th class="px-8 py-5 text-left text-xs uppercase tracking-wider text-zinc-400">
                            Criado em
                        </th>

                        <th class="px-8 py-5 text-right text-xs uppercase tracking-wider text-zinc-400">
                            Ações
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($categoria as $item)

                    <tr class="border-b border-zinc-800 transition hover:bg-zinc-800/40">

                        <td class="px-8 py-6">

                            <div class="font-semibold text-white">

                                {{ $item->nome }}

                            </div>

                        </td>

                        <td class="px-8 py-6 text-zinc-400">

                            {{ $item->created_at->format('d/m/Y H:i') }}

                        </td>

                        <td class="px-8 py-6">

                            <div class="flex justify-end gap-3">

                                <a href="{{ route('categoria.edit',$item) }}"
                                   class="rounded-lg bg-amber-500 px-4 py-2 text-sm font-semibold text-white transition hover:bg-amber-400">

                                    Editar

                                </a>

                                <form action="{{ route('categoria.destroy',$item) }}"
                                      method="POST"
                                      onsubmit="return confirm('Deseja excluir esta categoria?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-red-500">

                                        Excluir

                                    </button>

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