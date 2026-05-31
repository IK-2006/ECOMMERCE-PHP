@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
    <h1>Lista de Produtos</h1>

    <div class="actions">
        <a href="{{ route('produto.create') }}" class="btn">Novo Produto</a>
    </div>

    @if ($produtos->isEmpty())
        <p>Nenhum produto cadastrado ainda.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Tamanho</th>
                    <th>Marca</th>
                    <th>Fornecedor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->quantidade }}</td>
                        <td>{{ $produto->preco }}</td>
                        <td>{{ $produto->tamanho }}</td>
                        <td>{{ $produto->marca }}</td>
                        <td>{{ $produto->fornecedor->nome ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('produto.edit', $produto) }}" class="btn btn-warning">Editar</a>
                            <form
                                action="{{ route('produto.destroy', $produto) }}"
                                method="POST"
                                class="inline-form"
                                onsubmit="return confirm('Deseja excluir este produto?');"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection