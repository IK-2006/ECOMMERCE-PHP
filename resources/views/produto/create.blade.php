@extends('layouts.app')

@section('title', 'Novo Produto')

@section('content')
    <h1>Novo Produto</h1>

    <form action="{{ route('produto.store') }}" method="POST">
        @include('produto._form', ['buttonText' => 'Criar produto'])
    </form>
@endsection