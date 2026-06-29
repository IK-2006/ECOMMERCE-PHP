<x-layouts::app.sidebar :title="__('Fornecedores')">

<div class="mx-auto max-w-7xl space-y-8">

    <!-- Cabeçalho -->
    <div class="rounded-3xl bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 p-8 shadow-xl">

        <div class="flex items-center justify-between">

            <div>

                <h1 class="text-4xl font-bold text-white">
                    Fornecedores
                </h1>

                <p class="mt-2 text-emerald-100">
                    Gerencie todos os fornecedores do seu e-commerce.
                </p>

            </div>

            <flux:button
                variant="primary"
                icon="plus"
                :href="route('fornecedor.create')"
                wire:navigate
                class="!bg-white !text-emerald-700 hover:scale-105 transition">

                Novo fornecedor

            </flux:button>

        </div>

    </div>

    <!-- Card -->
    <div class="overflow-hidden rounded-3xl border border-zinc-800 bg-zinc-900 shadow-xl">

        <div class="flex items-center justify-between border-b border-zinc-800 p-6">

            <div>

                <h2 class="text-xl font-bold text-white">
                    Lista de Fornecedores
                </h2>

                <p class="mt-1 text-sm text-zinc-400">
                    {{ $fornecedores->count() }} fornecedor(es) cadastrado(s)
                </p>

            </div>

        </div>

        @if ($fornecedores->isEmpty())

            <div class="py-20 text-center">

                <div class="text-6xl">
                    🚚
                </div>

                <h2 class="mt-6 text-2xl font-bold text-white">
                    Nenhum fornecedor encontrado
                </h2>

                <p class="mt-2 text-zinc-400">
                    Cadastre seu primeiro fornecedor.
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
                            Telefone
                        </th>

                        <th class="px-8 py-5 text-left text-xs uppercase tracking-wider text-zinc-400">
                            Endereço
                        </th>

                        <th class="px-8 py-5 text-right text-xs uppercase tracking-wider text-zinc-400">
                            Ações
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($fornecedores as $fornecedor)

                        <tr class="border-b border-zinc-800 transition hover:bg-zinc-800/40">

                            <td class="px-8 py-6">

                                <div class="font-semibold text-white">

                                    {{ $fornecedor->nome }}

                                </div>

                            </td>

                            <td class="px-8 py-6 text-zinc-400">

                                {{ $fornecedor->telefone }}

                            </td>

                            <td class="px-8 py-6 text-zinc-400">

                                {{ $fornecedor->endereco }}

                            </td>

                            <td class="px-8 py-6">

                                <div class="flex justify-end gap-3">

                                    <flux:button
                                        size="sm"
                                        icon="pencil"
                                        :href="route('fornecedor.edit',$fornecedor)"
                                        wire:navigate
                                        class="!bg-amber-500 hover:!bg-amber-400">

                                        Editar

                                    </flux:button>

                                    <form
                                        action="{{ route('fornecedor.destroy',$fornecedor) }}"
                                        method="POST"
                                        onsubmit="return confirm('Deseja excluir este fornecedor?')">

                                        @csrf
                                        @method('DELETE')

                                        <flux:button
                                            size="sm"
                                            variant="danger"
                                            icon="trash"
                                            type="submit">

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