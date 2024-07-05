<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 20px;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; 
        }
        .container {
            max-width: 600px;
            background-color: #ffffff; 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #fff;
            border: 2 solid #0148AD;
            border-radius: 10px;
            padding: 10px 20px;
            margin-left: 0px;
            margin-top: 20px;
            margin-bottom: 15px;
            width: 100%;
            color: #0148AD;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0148AD;
        }
        .text-center a {
            text-decoration: none;
        }
        span{
            color: #1E4C72;
        }
        .text{
            display: flex;
            flex-direction: column;
        }
        a{
            text-decoration: none;
            margin-left: 140px;
        }
        
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Connexion</h2>
      <div class="card-body">
      @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error') }}
        </div>
        @endif
        <form action="{{route('login')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="label-form">Nom email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="exemple@gmail.com" >
            </div>
            <div class="mb-3">
                <label for="password" class="label-form">Mot de passe</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="*******" >
            </div>
            <div class="flex items-center justify-end mt-4 text">

            <button type="submit" class="btn btn-primary" name="submit">Connexion</button>

            <div class="bouton"><a href="{{route('signup') }} ">Vous n'avez pas encore de compte ? <span>S'inscrire</span> </a> </div>
            </div>
        </form>
      </div>
 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
