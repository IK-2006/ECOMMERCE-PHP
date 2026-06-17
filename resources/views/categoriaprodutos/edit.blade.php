@extends('layouts.app')

@section('title', 'Editar Categoria de Produto')

@section('content')
    <h1>Editar Categoria de Produto</h1>

    <form action="{{ route('categoriaprodutos.update', $categoriaproduto) }}" method="POST">
        @csrf
        @method('PUT')

        @include('categoriaprodutos._form', [
            'buttonText' => 'Salvar Alterações'
        ])
    </form>
@endsection