@extends('layouts.app')

@section('title', 'Lista de Livros')

@section('content')
    <h1 class="mb-4">Lista de Livros</h1>

    <form method="GET" action="{{ route('books.index') }}" class="form-inline mb-4">
        <a href="{{ route('books.create') }}" class="btn btn-secondary mr-2" />Cadastrar</a>
        <input type="text" name="search" class="form-control mr-2" placeholder="Buscar pelo título"
            value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <table class="table table-striped table-responsive-sm">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm">Editar</a>

                        <button type="button" class="btn btn-danger btn-sm delete-btn"
                            data-id="{{ $book->id }}">Deletar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $books->appends(['search' => request('search')])->links() }}
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.delete-btn').on('click', function() {
                let bookId = $(this).data('id');
                if (confirm('Tem certeza que deseja deletar este livro?')) {
                    $.ajax({
                        url: '/books/' + bookId,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log(response)
                            //window.location.reload();

                        },
                        error: function(xhr) {
                            alert('Erro ao deletar o livro. Por favor, tente novamente.');
                        }
                    });
                }
            });
        });
    </script>
@endsection
