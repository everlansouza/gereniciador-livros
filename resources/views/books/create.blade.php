@extends('layouts.app')

@section('title', 'Cadastrar Livro')

@section('content')
    <h1>Cadastrar Novo Livro</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        @include('books._form')
    </form>
@endsection
