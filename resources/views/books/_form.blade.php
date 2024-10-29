<div class="form-group">
    <label for="title">Título</label>
    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $book->title ?? '') }}" required>
</div>

<div class="form-group">
    <label for="author">Autor</label>
    <input type="text" name="author" id="author" class="form-control" value="{{ old('author', $book->author ?? '') }}" required>
</div>

<div class="form-group">
    <label for="description">Descrição</label>
    <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $book->description ?? '') }}</textarea>
</div>

<button type="submit" class="btn btn-primary">
    {{ isset($book) ? 'Atualizar Livro' : 'Cadastrar Livro' }}
</button>
