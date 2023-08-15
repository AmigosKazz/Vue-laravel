<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>CRUD VuejS</title>
</head>
<body>


    <div class="container">
        <div class="row s12">
            <h1>Modifier un etudiant</h1>
            <hr>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif

                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>

            <form class="form-group" action="/update/traitement" method="POST">
                @csrf

                <input type="text" name="id" style="display: none;" value="{{$visiteurs->id}}">

                <div class="mb-2">
                  <label for="numero" class="form-label">Numero visiteur</label>
                  <input type="text" class="form-control"  id="numero-visiteur" name="numero_visiteur" value="{{$visiteurs->numero_visiteur}}">
                </div>

                <div class="mb-2">
                    <label for="nom" class="form-label">Nom de visiteur</label>
                    <input type="text" class="form-control"  id="nom" name="nom" value="{{$visiteurs->nom}}">
                  </div>

                  <div class="mb-2">
                    <label for="nombrejour" class="form-label">Nombre de jour</label>
                    <input type="text" class="form-control"  id="numero-visiteur" name="nombre_jour" value="{{$visiteurs->nombre_jour}}">
                  </div>

                  <div class="mb-2">
                    <label for="tarif" class="form-label">Tarif journalier</label>
                    <input type="text" class="form-control"  id="numero-visiteur" name="tarif" value="{{$visiteurs->tarif}}">
                  </div>
                  <br>
                  <br>
                <button type="submit" class="btn btn-primary">Modifier un visiteur</button>
                  <br> <br> <br> <br>

                <a href="/visiteur" class="btn btn-danger">Revenir à la liste</a>
              </form>
        </div>
    </div>

    <script src="<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>"></script>
</body>
</html>
