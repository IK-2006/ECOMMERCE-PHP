@csrf

<div class="grid gap-2">
    <label for="produto_id">Produto</label>

    <select id="produto_id" name="produto_id" required>
        <option value="">Selecione um produto</option>

        @foreach ($produtos as $produto)
            <option
                value="{{ $produto->id }}"
                {{ (int) old('produto_id', $categoriaproduto->produto_id ?? 0) === $produto->id ? 'selected' : '' }}
            >
                {{ $produto->nome }}
            </option>
        @endforeach
    </select>

    @error('produto_id')
        <div class="alert alert-error">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="grid gap-2">
    <label for="categoria_id">Categoria</label>

    <select id="categoria_id" name="categoria_id" required>
        <option value="">Selecione uma categoria</option>

        @foreach ($categorias as $categoria)
            <option
                value="{{ $categoria->id }}"
                {{ (int) old('categoria_id', $categoriaproduto->categoria_id ?? 0) === $categoria->id ? 'selected' : '' }}
            >
                {{ $categoria->nome }}
            </option>
        @endforeach
    </select>

    @error('categoria_id')
        <div class="alert alert-error">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="actions">
    <button type="submit" class="btn">
        {{ $buttonText ?? 'Salvar' }}
    </button>

    <a href="{{ route('categoriaprodutos.index') }}" class="btn">
        Cancelar
    </a>
</div>