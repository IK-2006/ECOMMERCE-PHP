@extends('layouts.app')

@section('title', 'Editar categoria')

@section('content')
    <h1>Editar Categoria</h1>

    <form action="{{ route('categorias.update', $categoria) }}" method="POST">
        @method('PUT')
        @include('categorias._form', ['buttonText' => 'Salvar alteracoes'])
    </form>
@endsection