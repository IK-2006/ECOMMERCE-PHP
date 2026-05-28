@extends('layouts.app')

@section('title', 'Nova Categoria')

@section('content')
    <h1>Nova Categoria</h1>

    <form action="{{ route('categoria.store') }}" method="POST">
        @include('categoria._form', ['buttonText' => 'Criar categoria'])
    </form>
@endsection