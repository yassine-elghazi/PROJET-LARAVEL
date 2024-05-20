<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESTION DES EMPLOYES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://images.pexels.com/photos/5673502/pexels-photo-5673502.jpeg?auto=compress&cs=tinysrgb&w=600'); /* استبدل 'URL_OF_YOUR_IMAGE' برابط الصورة التي تريد استخدامها */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh; 
            display: flex;
            flex-direction: column;
        }

        footer.bg-light {
            background-color: blue;
        }
        .content {
            flex: 1; /* يتيح للمحتوى النمو لملء المساحة المتبقية */
        }

        footer {
            background-color: white;
        }
        .custom-color {
            color: #FF5733; /* استبدل هذا بالقيمة اللونية التي تريدها */
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <div class="row">
            <div class="col s12">
                
                <h1><a class="text-reset fw-bold" href="https://mdbootstrap.com/">GESTION DES EMPLOYES</a></h1>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-primary float-right">
                        <a :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('logout ') }}
                        </a>
                    </button>
                </form>
                <hr>
                <a href="/ajouter" class="btn btn-primary">ajouter un employe</a>
                <hr>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Search Form -->
                <form action="{{ route('search') }}" method="GET" class="mb-4">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control"
                            placeholder="Search by name or surname" required>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Grade</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $ide = 1 @endphp
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $ide }}</td>
                                <td>{{ $employee->nom }}</td>
                                <td>{{ $employee->prenom }}</td>
                                <td>{{ $employee->grade }}</td>
                                <td>
                                    <a href="/update-employee/{{ $employee->id }}" class="btn btn-info">Update</a>
                                    <a href="/delete-employee/{{ $employee->id }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @php $ide += 1 @endphp
                        @endforeach
                    </tbody>
                </table>
                {{ $employees->links() }}
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<br>
<br>
<br>

<footer class="text-center p-4" style="background-color: white;">
    © 2024 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">YASSINE EL-GHAZI </a>
</footer>
</body>
</html>
