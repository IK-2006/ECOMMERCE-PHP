@csrf

<label for="nome">Nome Categoria</label>
<input
    type="text"
    id="nome"
    name="nome"
    {{-- Old mantem o que foi digitado quando ocorrer erro (Não obrigatório) --}}
    value="{{ old('nome', $categoria->nome ?? '') }}"
    required
>


<button type="submit" class="btn">{{ $buttonText ?? 'Salvar' }}</button>
<a href="{{ route('categoria.index') }}" style="margin-left: 8px;">Cancelar</a>