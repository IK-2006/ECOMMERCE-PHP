@extends('layouts.app')

@section('title', 'Nova Categoria')

@section('content')
    <h1>Nova Categoria</h1>

    <form action="{{ route('categorias.store') }}" method="POST">
        @include('categorias._form', ['buttonText' => 'Criar categoria'])
    </form>
@endsection