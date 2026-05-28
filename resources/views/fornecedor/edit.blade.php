@extends('layouts.app')

@section('title', 'Editar fornecedor')

@section('content')
    <h1>Editar fornecedor</h1>

    <form action="{{ route('fornecedor.update', $fornecedor) }}" method="POST">
        @method('PUT')
        @include('fornecedor._form', ['buttonText' => 'Salvar alteracoes'])
    </form>
@endsection