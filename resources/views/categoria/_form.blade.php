@csrf

<div>
    <label for="nome" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-200">Nome Categoria</label>
    <input
        type="text"
        id="nome"
        name="nome"
        value="{{ old('nome', $categoria->nome ?? '') }}"
        required
        class="block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 shadow-xs outline-none transition focus:border-zinc-500 focus:ring-2 focus:ring-zinc-200 dark:border-zinc-700 dark:bg-zinc-950 dark:text-zinc-100 dark:focus:border-zinc-400 dark:focus:ring-zinc-800"
    >
</div>

<div class="flex items-center gap-3">
    <flux:button variant="primary" type="submit">{{ $buttonText ?? 'Salvar' }}</flux:button>
    <flux:button :href="route('categoria.index')" wire:navigate>{{ __('Cancelar') }}</flux:button>
</div>
