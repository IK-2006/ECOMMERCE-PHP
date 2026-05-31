@extends('layouts.app')

@section('title', 'Editar produto')

@section('content')
    <h1>Editar produto</h1>

    <form action="{{ route('produto.update', $produto) }}" method="POST">
        @method('PUT')
        @include('produto._form', ['buttonText' => 'Salvar alteracoes'])
    </form>
@endsection