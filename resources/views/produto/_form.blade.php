@csrf

<div class="grid gap-5 md:grid-cols-2">
    <div class="md:col-span-2">
        <label for="nome" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-200">Nome Produto</label>
        <input type="text" id="nome" name="nome" value="{{ old('nome', $produto->nome ?? '') }}" required class="block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 shadow-xs outline-none transition focus:border-zinc-500 focus:ring-2 focus:ring-zinc-200 dark:border-zinc-700 dark:bg-zinc-950 dark:text-zinc-100 dark:focus:border-zinc-400 dark:focus:ring-zinc-800">
    </div>

    <div>
        <label for="quantidade" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-200">Quantidade</label>
        <input type="number" id="quantidade" name="quantidade" value="{{ old('quantidade', $produto->quantidade ?? '') }}" required class="block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 shadow-xs outline-none transition focus:border-zinc-500 focus:ring-2 focus:ring-zinc-200 dark:border-zinc-700 dark:bg-zinc-950 dark:text-zinc-100 dark:focus:border-zinc-400 dark:focus:ring-zinc-800">
    </div>

    <div>
        <label for="preco" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-200">Preco</label>
        <input type="number" step="0.01" id="preco" name="preco" value="{{ old('preco', $produto->preco ?? '') }}" required class="block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 shadow-xs outline-none transition focus:border-zinc-500 focus:ring-2 focus:ring-zinc-200 dark:border-zinc-700 dark:bg-zinc-950 dark:text-zinc-100 dark:focus:border-zinc-400 dark:focus:ring-zinc-800">
    </div>

    <div>
        <label for="marca" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-200">Marca</label>
        <input type="text" id="marca" name="marca" value="{{ old('marca', $produto->marca ?? '') }}" required class="block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 shadow-xs outline-none transition focus:border-zinc-500 focus:ring-2 focus:ring-zinc-200 dark:border-zinc-700 dark:bg-zinc-950 dark:text-zinc-100 dark:focus:border-zinc-400 dark:focus:ring-zinc-800">
    </div>

    <div>
        <label for="tamanho" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-200">Tamanho</label>
        <input type="text" id="tamanho" name="tamanho" value="{{ old('tamanho', $produto->tamanho ?? '') }}" required class="block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 shadow-xs outline-none transition focus:border-zinc-500 focus:ring-2 focus:ring-zinc-200 dark:border-zinc-700 dark:bg-zinc-950 dark:text-zinc-100 dark:focus:border-zinc-400 dark:focus:ring-zinc-800">
    </div>

    <div class="md:col-span-2">
        <label for="fornecedor_id" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-200">Fornecedor ID</label>
        <input type="number" id="fornecedor_id" name="fornecedor_id" value="{{ old('fornecedor_id', $produto->fornecedor_id ?? '') }}" required class="block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 shadow-xs outline-none transition focus:border-zinc-500 focus:ring-2 focus:ring-zinc-200 dark:border-zinc-700 dark:bg-zinc-950 dark:text-zinc-100 dark:focus:border-zinc-400 dark:focus:ring-zinc-800">
    </div>
</div>

<div class="flex items-center gap-3">
    <flux:button variant="primary" type="submit">{{ $buttonText ?? 'Salvar' }}</flux:button>
    <flux:button :href="route('produto.index')" wire:navigate>{{ __('Cancelar') }}</flux:button>
</div>
