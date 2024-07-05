<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bibliothèque Laravel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMV7WH0E3QtTWv0e49N8+TmkYh0kOhjcvR64qBk" crossorigin="anonymous">
  <style>
    .card {
      cursor: pointer;
      transition: transform 0.2s;
      font-size: 20px;
    }
    .card:hover {
      transform: scale(1.05);
      font-size: 18px;
    }
    .navbar{
        padding-left: 270px;
        padding-right: 150px;
        li{
            padding-left: 50px;
        }
    }
    h5{
      margin-top: 20px;
      margin-bottom: 20px;
    }
    .btn-connect{
      color: white;
      padding-right: 15px;
    }
  </style>
</head>

<body>
<nav class="navbar navbar-dark bg-dark navbar navbar-expand-lg navbar-light bg-light w-100">
  <a class="navbar-brand" href="#">ÉliteBiblio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav me-auto mb-4 mb-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('books.show') }}">Accueil</a>
      </li>
      @if(Auth::user())
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
      <li><a href="{{ route('books.create') }}" class=" nav-link">Enregistrer un livre</a></li>
    </ul>
    
    <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
    @csrf
    @method('delete')
    <button class="btn btn-danger" type="submit">Logout</button>
</form> @else
<button class="btn btn-outline "><a href="{{route('login')}}" class="btn-connect">Connexion</a></button>
@endif

  </div>
</nav>

<div class="container my-5">
  @if(Auth::user())
<h5>Bonjour {{ Auth::user()->name }} Bienvenue dans le gestion de votre bibliothéque </h5>
@endif
  <div class="row">
    <div class="col text-center">
        <div class="banner d-flex">
        <form class="d-flex col-md-12"  method="GET">
      <input class="form-control me-4" type="search" placeholder="Rechercher par livre, auteur, catégorie..." aria-label="Search" name="query">
      <button class="btn btn-outline-primary" type="submit">Rechercher</button>
    </form>
        </div>
      <hr>
      @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif
      <div class="row row-cols-1 row-cols-md-6 g-4">
        @foreach($books as $book)
          <div class="col">
            <a href="{{ route('books.more', $book->id) }}" class="text-decoration-none text-dark">
              <div class="card h-100">
                <img src="{{ $book->image }}" class="card-img-top" alt="{{ $book->title }}" style="height: 300px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title">{{ $book->title }}</h5>
                  <p class="flex-grow-1">
    <small class="text-muted">
        Nom de l'auteur : {{ $book->autor ? $book->autor->name : 'Unknown' }}
    </small>
</p>
                  <p class="card-text"><small class="text-muted">Catégorie : {{ $book->category->title }}</small></p>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" integrity="sha384-lZN37fLxoqAC6ABzH8E8XK4X3/AdHmy8Tlfk2Pz34uV1oLxefs/FiqFE5vNE6uZ9" crossorigin="anonymous"></script>
</body>
</html>
