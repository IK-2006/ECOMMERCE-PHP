@extends('layouts.app')

@section('title', 'Editar categoria')

@section('content')
    <h1>Editar Categoria</h1>

    <form action="{{ route('categoria.update', $categoria) }}" method="POST">
        @method('PUT')
        @include('categoria._form', ['buttonText' => 'Salvar alteracoes'])
    </form>
@endsection