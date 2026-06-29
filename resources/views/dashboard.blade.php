<x-layouts::app.sidebar :title="__('Dashboard')">

<div class="min-h-screen bg-zinc-950">

    <div class="mx-auto max-w-7xl px-8 py-10">

        <!-- Header -->
        <section
            class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 via-zinc-900 to-indigo-950 p-10 shadow-2xl border border-zinc-800">

            <div class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-indigo-500/10 blur-3xl"></div>

            <div class="absolute -left-20 bottom-0 h-56 w-56 rounded-full bg-blue-500/10 blur-3xl"></div>

            <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between">

                <div>

                    <p class="uppercase tracking-[5px] text-indigo-400 font-semibold">
                        Painel Administrativo
                    </p>

                    <h1 class="mt-3 text-5xl font-bold text-white">
                        Bem-vindo 
                    </h1>

                    <p class="mt-4 max-w-xl text-zinc-400 text-lg">
                        Gerencie produtos, categorias e fornecedores através
                        de um painel moderno e intuitivo.
                    </p>

                    <div class="mt-8 flex gap-4">

                        <a href="{{ route('produto.index') }}"
                           class="rounded-xl border border-zinc-700 px-6 py-3 text-zinc-200 hover:bg-zinc-800 transition">

                            Produtos

                        </a>

                        <a href="{{ route('categoria.index') }}"
                           class="rounded-xl border border-zinc-700 px-6 py-3 text-zinc-200 hover:bg-zinc-800 transition">

                            Categorias

                        </a>

                    </div>

                </div>

                <div class="hidden lg:flex">

                    <div
                        class="h-72 w-72 rounded-full bg-gradient-to-br from-indigo-500 via-blue-500 to-cyan-400 opacity-80 blur-sm">
                    </div>

                </div>

            </div>

        </section>

        <!-- Cards -->

        <section class="mt-10 grid gap-8 md:grid-cols-2 xl:grid-cols-4">

<!-- Card Produtos -->
<div
    class="group rounded-3xl border border-zinc-800 bg-zinc-900/70 p-7 backdrop-blur transition-all duration-300 hover:-translate-y-2 hover:border-indigo-500 hover:shadow-2xl hover:shadow-indigo-500/20">

    <div class="flex items-center justify-between">

        <div>

            <p class="text-sm uppercase tracking-wider text-zinc-500">
                Produtos
            </p>

            <h2 class="mt-4 text-5xl font-bold text-white">
                0
            </h2>

        </div>

        <div
            class="flex h-16 w-16 items-center justify-center rounded-2xl bg-indigo-500/20 text-3xl">

            📦

        </div>

    </div>

    <div class="mt-8 h-2 rounded-full bg-zinc-800 overflow-hidden">

        <div class="h-full w-2/3 rounded-full bg-indigo-500"></div>

    </div>

</div>

<!-- Card Categorias -->
<div
    class="group rounded-3xl border border-zinc-800 bg-zinc-900/70 p-7 backdrop-blur transition-all duration-300 hover:-translate-y-2 hover:border-cyan-500 hover:shadow-2xl hover:shadow-cyan-500/20">

    <div class="flex items-center justify-between">

        <div>

            <p class="text-sm uppercase tracking-wider text-zinc-500">
                Categorias
            </p>

            <h2 class="mt-4 text-5xl font-bold text-white">
                0
            </h2>

        </div>

        <div
            class="flex h-16 w-16 items-center justify-center rounded-2xl bg-cyan-500/20 text-3xl">

            📂

        </div>

    </div>

    <div class="mt-8 h-2 rounded-full bg-zinc-800 overflow-hidden">

        <div class="h-full w-1/2 rounded-full bg-cyan-500"></div>

    </div>

</div>

<!-- Card Fornecedores -->
<div
    class="group rounded-3xl border border-zinc-800 bg-zinc-900/70 p-7 backdrop-blur transition-all duration-300 hover:-translate-y-2 hover:border-emerald-500 hover:shadow-2xl hover:shadow-emerald-500/20">

    <div class="flex items-center justify-between">

        <div>

            <p class="text-sm uppercase tracking-wider text-zinc-500">
                Fornecedores
            </p>

            <h2 class="mt-4 text-5xl font-bold text-white">
                0
            </h2>

        </div>

        <div
            class="flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-500/20 text-3xl">

            🚚

        </div>

    </div>

    <div class="mt-8 h-2 rounded-full bg-zinc-800 overflow-hidden">

        <div class="h-full w-1/3 rounded-full bg-emerald-500"></div>

    </div>

</div>

<!-- Card Usuários -->
<div
    class="group rounded-3xl border border-zinc-800 bg-zinc-900/70 p-7 backdrop-blur transition-all duration-300 hover:-translate-y-2 hover:border-orange-500 hover:shadow-2xl hover:shadow-orange-500/20">

    <div class="flex items-center justify-between">

        <div>

            <p class="text-sm uppercase tracking-wider text-zinc-500">
                Usuários
            </p>

            <h2 class="mt-4 text-5xl font-bold text-white">
                1
            </h2>

        </div>

        <div
            class="flex h-16 w-16 items-center justify-center rounded-2xl bg-orange-500/20 text-3xl">

            👤

        </div>

    </div>

    <div class="mt-8 h-2 rounded-full bg-zinc-800 overflow-hidden">

        <div class="h-full w-3/4 rounded-full bg-orange-500"></div>

    </div>

</div>

</section>

<!-- Acesso Rápido -->
<section class="mt-12">

    <div class="flex items-center justify-between">

        <h2 class="text-3xl font-bold text-white">
            Acesso rápido
        </h2>

        <span class="text-zinc-500">
            Gerencie seu sistema
        </span>

    </div>

    <div class="mt-8 grid gap-8 lg:grid-cols-3">

    <!-- Produtos -->
<a href="{{ route('produto.index') }}"
    class="group rounded-3xl border border-zinc-800 bg-zinc-900 p-8 transition duration-300 hover:-translate-y-2 hover:border-indigo-500 hover:shadow-2xl hover:shadow-indigo-500/20">

    <div class="flex items-center justify-between">

        <div>

            <p class="text-zinc-400">
                Gerenciar
            </p>

            <h3 class="mt-2 text-2xl font-bold text-white">
                Produtos
            </h3>

            <p class="mt-4 text-sm text-zinc-500">
                Cadastre, edite e exclua produtos da loja.
            </p>

        </div>

        <div
            class="flex h-20 w-20 items-center justify-center rounded-2xl bg-indigo-500/20 text-5xl transition group-hover:scale-110">

            📦

        </div>

    </div>

</a>

<!-- Categorias -->
<a href="{{ route('categoria.index') }}"
    class="group rounded-3xl border border-zinc-800 bg-zinc-900 p-8 transition duration-300 hover:-translate-y-2 hover:border-cyan-500 hover:shadow-2xl hover:shadow-cyan-500/20">

    <div class="flex items-center justify-between">

        <div>

            <p class="text-zinc-400">
                Organize
            </p>

            <h3 class="mt-2 text-2xl font-bold text-white">
                Categorias
            </h3>

            <p class="mt-4 text-sm text-zinc-500">
                Organize os produtos por categorias.
            </p>

        </div>

        <div
            class="flex h-20 w-20 items-center justify-center rounded-2xl bg-cyan-500/20 text-5xl transition group-hover:scale-110">

            📂

        </div>

    </div>

</a>

<!-- Fornecedores -->
<a href="{{ route('fornecedor.index') }}"
    class="group rounded-3xl border border-zinc-800 bg-zinc-900 p-8 transition duration-300 hover:-translate-y-2 hover:border-emerald-500 hover:shadow-2xl hover:shadow-emerald-500/20">

    <div class="flex items-center justify-between">

        <div>

            <p class="text-zinc-400">
                Controle
            </p>

            <h3 class="mt-2 text-2xl font-bold text-white">
                Fornecedores
            </h3>

            <p class="mt-4 text-sm text-zinc-500">
                Gerencie os fornecedores cadastrados.
            </p>

        </div>

        <div
            class="flex h-20 w-20 items-center justify-center rounded-2xl bg-emerald-500/20 text-5xl transition group-hover:scale-110">

            🚚

        </div>

    </div>

</a>

</div>

</section>

<!-- Resumo -->

<section class="mt-12 grid gap-8 xl:grid-cols-2">

<!-- Resumo -->
<div class="rounded-3xl border border-zinc-800 bg-zinc-900 p-8 shadow-xl">

    <div class="flex items-center justify-between">

        <h2 class="text-2xl font-bold text-white">
            Resumo do Sistema
        </h2>

        <span
            class="rounded-full bg-indigo-500/20 px-4 py-2 text-sm font-semibold text-indigo-300">

            Dashboard

        </span>

    </div>

    <div class="mt-8 space-y-6">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-white font-medium">
                    Cadastro de Produtos
                </p>

                <p class="text-sm text-zinc-500">
                    Controle completo dos produtos.
                </p>

            </div>

            <span class="text-green-400 font-semibold">
                 Ativo
            </span>

        </div>

        <div class="flex items-center justify-between">

            <div>

                <p class="text-white font-medium">
                    Categorias
                </p>

                <p class="text-sm text-zinc-500">
                    Organização dos produtos.
                </p>

            </div>

            <span class="text-green-400 font-semibold">
                 Ativo
            </span>

        </div>

        <div class="flex items-center justify-between">

            <div>

                <p class="text-white font-medium">
                    Fornecedores
                </p>

                <p class="text-sm text-zinc-500">
                    Gestão de fornecedores.
                </p>

            </div>

            <span class="text-green-400 font-semibold">
                 Ativo
            </span>

        </div>

    </div>

</div>


</x-layouts::app.sidebar>