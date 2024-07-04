<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Livre</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Auteur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 20px;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Light gray background */
        }
        .container {
            max-width: 600px;
            background-color: #ffffff; /* White background for the form */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff; /* Bootstrap primary color */
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue for hover */
            border-color: #004085;
        }
        .form-control {
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row align-items-start">
      <div class="col">
        <h1>Ajouter un Livre</h1>

        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <ul>
          @foreach($errors->all() as $error)
          <li class="alert alert-danger">{{ $error }}</li>
          @endforeach
        </ul>

        <form action="{{ route('books.store') }}" method="POST" class="form-group"> 
          @csrf
          @method('POST')
          <div class="form-group">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>
          <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description">
          </div>
       <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="text" class="form-control" id="image" name="image"  required>
  </div>
  <div class="form-group">
    <label for="isbn" class="form-label">Numéro du livre (isbn)</label>
    <input type="text" class="form-control" id="isbn" name="isbn">
  </div>  
  <div class="form-group">
    <label for="publication_date" class="form-label">Date de publication</label>
    <input type="date" class="form-control" id="publication_date" name="publication_date">
  </div>  
  <br>
  <div class="form-group">
            <label for="autor_id">Categorie</label>autors
            <select name="autor_id" class="form-control" required>
                @foreach($autors as $autor)
                    <option value="{{ $autor->id }}">{{ $autor->name }}</option>
                @endforeach
            </select>
        </div>
          <div class="form-group">
            <label for="category_id">Categorie</label>autors
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="shelf_id">Rayon</label>
            <select name="shelf_id" class="form-control" required>
                @foreach($shelves as $shelf)
                    <option value="{{ $shelf->id }}">{{ $shelf->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="publisher_id">Maison d'édition</label>
            <select name="publisher_id" class="form-control" required>
                @foreach($publishers as $publisher)
                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                @endforeach
            </select>
        </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <a href="{{ route('books.show') }}" class="btn btn-secondary">Liste des livres</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
