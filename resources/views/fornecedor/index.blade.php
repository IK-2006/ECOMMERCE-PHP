@extends('layouts.app')

@section('title', 'fornecedores')

@section('content')
    <h1>Lista de fornecedores</h1>

    <div class="actions">
        <a href="{{ route('fornecedor.create') }}" class="btn">Nova fornecedor</a>
    </div>

    @if ($fornecedores->isEmpty())
        <p>Nenhum fornecedor cadastrado ainda.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fornecedores as $fornecedor)
                    <tr>
                        <td>{{ $fornecedor->nome }}</td>
                        <td>{{ $fornecedor->telefone }}</td>
                        <td>{{ $fornecedor->endereco}}</td>
                        <td>
                            <a href="{{ route('fornecedor.edit', $fornecedor) }}" class="btn btn-warning">Editar</a>
                            <form
                                action="{{ route('fornecedor.destroy', $fornecedor) }}"
                                method="POST"
                                class="inline-form"
                                onsubmit="return confirm('Deseja excluir este fornecedor?');"
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