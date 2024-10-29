@extends('layouts.app')

@section('title', 'Editar Livro')

@section('content')
    <h1>Editar Livro</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('books._form', ['book' => $book])
    </form>
@endsection
