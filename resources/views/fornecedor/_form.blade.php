@csrf

<label for="nome">Nome Fornecedor</label>
<input
    type="text"
    id="nome"
    name="nome"
    {{-- Old mantem o que foi digitado quando ocorrer erro (Não obrigatório) --}}
    value="{{ old('nome', $fonecedor->nome ?? '') }}"
    required
>

<label for="telefone">Telefone Fornecedor</label>
<input
    type="int"
    id="telefone"
    name="telefone"
    {{-- Old mantem o que foi digitado quando ocorrer erro (Não obrigatório) --}}
    value="{{ old('telefone', $fornecedor->telefone ?? '') }}"
    required
>

<label for="endereco">Endereço Fornecedor</label>
<input
    type="text"
    id="endereco"
    name="endereco"
    {{-- Old mantem o que foi digitado quando ocorrer erro (Não obrigatório) --}}
    value="{{ old('endereco', $fornecedor->endereco ?? '') }}"
    required
>


<button type="submit" class="btn">{{ $buttonText ?? 'Salvar' }}</button>
<a href="{{ route('fornecedor.index') }}" style="margin-left: 8px;">Cancelar</a>