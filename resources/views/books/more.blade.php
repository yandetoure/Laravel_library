<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD IN LARAVEL 11</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .side h4, .side h5 {
      text-align: left;
      padding-left: 50px;
    }
    .btn-group-custom .btn {
      flex: 1;
      margin-right: 5px;
    }
    .btn-group-custom .btn:last-child {
      margin-right: 0;
    }
    .card {
      cursor: pointer;
      transition: transform 0.2s;
    }
    .card:hover {
      transform: scale(1.05);
    }
    .navbar{
        padding-left: 270px;
        padding-right: 150px;
        li{
            padding-left: 50px;
        }
    }.side{
      margin-top: 100px;
      h4{
        font-weight: bold;
        margin-bottom: 15px;
      }
      .card-desc{
        margin-top: 25px;
      }
    }
  </style>
</head>

<body>
<nav class="navbar navbar-dark bg-dark navbar navbar-expand-lg navbar-light bg-light w-100">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav me-auto mb-4 mb-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('books.show') }}">Accueil</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="{{ route('categories.show') }}">Categories</a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link" href="{{ route('shelves.show') }}">Rayons</a>

      </li>
      <li class="nav-item">
      <a class="nav-link" href="{{ route('autors.show') }}">Auteurs</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="{{ route('publishers.show') }}">Maisons d'édition</a>
      </li>
    </ul>
    @if(Auth::user())
    <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
    @csrf
    @method('delete')
    <button class="btn btn-danger" type="submit">Logout</button>
</form>
@endif
  </div>
</nav>

  <div class="container text-center">
    <div class="row">
      <div class="col">
        <hr>
        @if(session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif

        <div class="row">
          <div class="col-md-4 mb-2">
            <div class="card h-100">
              <img src="{{ $book->image }}" class="card-img-top" alt="{{ $book->title }}" height="500">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $book->title }}</h5>
                <h6 class="card-text"><small class="text-muted">Catégorie : {{ $book->category->title }}</small></h6>
                <div class="btn-group mt-auto btn-group-custom" role="group">
                  @if(Auth::user())
                  <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">Modifier</a>
                  <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    @endif
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="side col-md-6 mb-2">

            <h4 class="card-text"><small class="text-muted">Rayon : {{ $book->shelf->title }}</small></h4>
            <h4 class="card-text"><small class="text-muted">Titre : {{ $book->title }}</small></h4>
            <h5 class="card-text"><small class="text-muted">Auteur  :  {{ $book->autor->name }}</small></h5>
            <h5 class="card-text"><small class="text-muted">Publié en  : {{ $book->publication_date }}</small></h5>
            <h5 class="card-text"><small class="text-muted">Par la maison d'édition : {{ $book->publisher->name }}</small></h5>
            <h5 class="card-desc"><small class="text-muted">Résumé : {{ $book->description }}</small></h5>
          </div>
          <div class="categories col-md-2">
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
