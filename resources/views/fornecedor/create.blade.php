@extends('layouts.app')

@section('title', 'Novo fornecedor')

@section('content')
    <h1>Novo fornecedor</h1>

    <form action="{{ route('fornecedor.store') }}" method="POST">
        @include('fornecedor._form', ['buttonText' => 'Criar fornecedor'])
    </form>
@endsection