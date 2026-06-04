@csrf

<div class="grid gap-2">
    <label for="produto_id" class="text-sm font-medium text-zinc-800 dark:text-zinc-200">Produto</label>
    <select id="produto_id" name="produto_id" required class="rounded-md border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-950 shadow-sm focus:border-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-200 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white dark:focus:ring-zinc-700">
        <option value="">Selecione um produto</option>
        @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}" {{ (int) old('produto_id', $categoriaproduto->produto_id ?? 0) === $produto->id ? 'selected' : '' }}>
                {{ $produto->nome }}
            </option>
        @endforeach
    </select>
    <x-error name="produto_id" />
</div>


<div class="grid gap-2">
    <label for="categoria_id" class="text-sm font-medium text-zinc-800 dark:text-zinc-200">Categoria</label>
    <select id="categoria_id" name="categoria_id" required class="rounded-md border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-950 shadow-sm focus:border-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-200 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white dark:focus:ring-zinc-700">
        <option value="">Selecione uma categoria</option>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}" {{ (int) old('categoria_id', $categoriaproduto->categoria_id ?? 0) === $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nome }}
            </option>
        @endforeach
    </select>
    <x-error name="categoria_id" />
</div>


<div class="flex flex-wrap gap-2">
    <x-crud.button type="submit">{{ $buttonText ?? 'Salvar' }}</x-crud.button>
    <x-crud.button :href="route('matriculas.index')" variant="secondary">Cancelar</x-crud.button>
</div>