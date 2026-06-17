@extends('layouts.app')

@section('title', 'Nova Categoria de Produto')

@section('content')
    <h1>Nova Categoria de Produto</h1>

    <form action="{{ route('categoriaprodutos.store') }}" method="POST">
        @include('categoriaprodutos._form', [
            'buttonText' => 'Criar Categoria do Produto'
        ])
    </form>
@endsection