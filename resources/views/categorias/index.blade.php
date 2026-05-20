@extends('layouts.app')

@section('title', 'Categorias')

@section('content')
    <h1>Lista de Categorias</h1>

    <div class="actions">
        <a href="{{ route('categorias.create') }}" class="btn">Nova categoria</a>
    </div>

    @if ($categorias->isEmpty())
        <p>Nenhuma categoria cadastrado ainda.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Criado em</th>
                    <th>Acoes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->nome }}</td>
                        <td>{{ $categoria->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-warning">Editar</a>
                            <form
                                action="{{ route('categorias.destroy', $categoria) }}"
                                method="POST"
                                class="inline-form"
                                onsubmit="return confirm('Deseja excluir este categoria?');"
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