<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 20px;
            font-family: Arial, sans-serif;
        }
        .table-container {
            margin: 20px 0;
        }
        .table {
            background-color: #E0F7FA; /* Light blue color */
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .btn-group .btn {
            margin: 0 5px;
        }
        .btn-group {
            display: flex;
            justify-content: center;
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
  </div>
</nav>
    <div class="container">
        <h1 class="text-center">Categories</h1>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('categories.create') }}" class="btn btn-primary"> Ajouter</a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-container">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Libelle</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $categorie)
                        <tr>
                            <td>{{ $categorie->id }}</td>
                            <td>{{ $categorie->title }}</td>
                            <td>{{ $categorie->description }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-primary">Modofier</a>
                                    <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
