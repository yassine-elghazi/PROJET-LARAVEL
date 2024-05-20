<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD IN LARAVEL 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  

    <div class="container">
        <div class="row">
          <div class="col s12">
            <h1>AJOUTER UN EMPLOYE </h1>
            <hr>

            @if (session('status'))
              <div class="alert alert-success">
                {{(session('status'))}}
              </div>
            @endif
         <ul>
            @foreach ($errors ->all() as $error)
              <li class="alert alert-danger"> {{$error}} </li>  
            @endforeach
        </ul>

            <form action="/ajouter/traitement" method="POST"  class="form-group">
                @csrf

                <div class="from-group">
                  <label for="Nom">Nom</label>
                  <input type="text" class="form-control" id="Nom" name="nom">
                </div>

                <div class="from-group">
                    <label for="Prenom">Prenom</label>
                    <input type="text" class="form-control" id="Prenom" name="prenom">
                  </div>

                  <div class="from-group">
                    <label for="Grade">Grade</label>
                    <input type="text" class="form-control" id="Grade" name="grade">
                  </div>
                <br>

                <button type="submit" class="btn btn-primary">AJOUTER UN EMPLOYE</button>

                <br><br/>
                <a href="/Employe" class="btn btn-danger"> Revenir à liste des employés</a>

              </form>
                  
                
          </div>
         
        </div>
      </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>