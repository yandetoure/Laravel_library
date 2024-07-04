<!-- resources/views/books/edit.blade.php -->

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modifier livre</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-5">
    <h1>Edit Book</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" required>{{ $book->description }}</textarea>
      </div>
      <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="text" class="form-control" id="image" name="image" value="{{$book->image}}" required>
  </div>
      <div class="mb-3">
        <label for="isbn" class="form-label">ISBN</label>
        <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $book->isbn }}" required>
      </div>
      <div class="form-group">
    <label for="publication_date" class="form-label">Date de publication</label>
    <input type="date" class="form-control" id="publication_date" name="publication_date"value="{{ $book->publication_date }}" required>
  </div> 
      <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select class="form-control" id="category_id" name="category_id" required>
          @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>{{ $category->title }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="shelf_id" class="form-label">Shelf</label>
        <select class="form-control" id="shelf_id" name="shelf_id" required>
          @foreach($shelves as $shelf)
            <option value="{{ $shelf->id }}" {{ $shelf->id == $book->shelf_id ? 'selected' : '' }}>{{ $shelf->title }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="publisher_id" class="form-label">Publisher</label>
        <select class="form-control" id="publisher_id" name="publisher_id" required>
          @foreach($publishers as $publisher)
            <option value="{{ $publisher->id }}" {{ $publisher->id == $book->publisher_id ? 'selected' : '' }}>{{ $publisher->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="autor_id" class="form-label">Autor</label>
        <select class="form-control" id="autor_id" name="autor_id" required>
          @foreach($autors as $autor)
            <option value="{{ $autor->id }}" {{ $autor->id == $book->autor_id ? 'selected' : '' }}>{{ $autor->name }}</option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
