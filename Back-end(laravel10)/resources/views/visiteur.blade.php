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


    <table></table>

    <div class="container text-center">
        <div class="row s12">
            <div class="col">
                <h1>Gestion de Visiteur</h1>
                <hr>
                <a href="/ajouter" class="btn btn-primary">Ajouter un etudiant</a>
                <hr>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>N° visiteur</th>
                            <th>Nom</th>
                            <th>Nombre de jour</th>
                            <th>Tarif journer</th>
                            <th>Tarif total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                           $ide = 1;
                        @endphp
                        @foreach($visiteurs as $visiteur)
                        <tr>
                            <td>{{$ide}}</td>
                            <td>{{$visiteur->numero_visiteur}}</td>
                            <td>{{$visiteur->nom}}</td>
                            <td>{{$visiteur->nombre_jour}}</td>
                            <td>{{$visiteur->tarif  }}</td>
                            <td>
                                <a href="/update/{{$visiteur->id}}" class="btn btn-info">Update</a>
                                <a href="/delete/{{$visiteur->id}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @php
                            $ide += 1;
                        @endphp
                        @endforeach

                    </tbody>
                </table>
                    {{ $visiteurs->links() }}
            </div>
        </div>
    </div>

    <script src="<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>"></script>
</body>
</html>
