@csrf

<label for="nome">Nome Produto</label>
<input
    type="text"
    id="nome"
    name="nome"
    {{-- Old mantem o que foi digitado quando ocorrer erro (Não obrigatório) --}}
    value="{{ old('nome', $produto->nome ?? '') }}"
    required
>

<label for="quantidade">Quantidade</label>
<input
    type="int"
    id="quantidade"
    name="quantidade"
    {{-- Old mantem o que foi digitado quando ocorrer erro (Não obrigatório) --}}
    value="{{ old('quantidade', $produto->quantidade ?? '') }}"
    required
>

<label for="preco">Preço</label>
<input
    type="decimal"
    id="preco"
    name="preco"
    {{-- Old mantem o que foi digitado quando ocorrer erro (Não obrigatório) --}}
    value="{{ old('preco', $produto->preco ?? '') }}"
    required
>

<label for="marca">Marca</label>
<input
    type="text"
    id="marca"
    name="marca"
    {{-- Old mantem o que foi digitado quando ocorrer erro (Não obrigatório) --}}
    value="{{ old('marca', $produto->marca ?? '') }}"
    required
>

<label for="tamanho">Tamanho</label>
<input
    type="text"
    id="tamanho"
    name="tamanho"
    {{-- Old mantem o que foi digitado quando ocorrer erro (Não obrigatório) --}}
    value="{{ old('tamanho', $produto->tamanho ?? '') }}"
    required
>

<label for="fornecedor_id">Fornecedor ID</label>
<input
    type="number"
    id="fornecedor_id"
    name="fornecedor_id"
    value="{{ old('fornecedor_id', $produto->fornecedor_id ?? '') }}"
    required
>

<button type="submit" class="btn">{{ $buttonText ?? 'Salvar' }}</button>
<a href="{{ route('fornecedor.index') }}" style="margin-left: 8px;">Cancelar</a>