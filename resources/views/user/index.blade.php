@include('inc._header')

<body>
<main>

    @include('inc._menu')

    <div class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1> Clients </h1>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-primary float-right" href="{{ route('user.create') }}" role="button"><i
                            class="fa fa-plus-circle"></i> Ajouter un utilisateur </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <div class="row">
            <table class="table table-striped">
                <thead class="thead">
                <tr>
                    <th scope="col"> ID</th>
                    <th scope="col"> Prénom</th>
                    <th scope="col"> Nom</th>
                    <th scope="col"> Email</th>
                    <th scope="col"> Adresse</th>
                    <th scope="col"> Mot de passe</th>
                    <th scope="col"> Est administrateur ?</th>
                    <th scope="col"> Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $key => $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->is_admin }}</td>
                        <td>
                            <a class="btn btn-small btn-outline-dark"
                               href="{{ route('user.show', ["user" => $user]) }}">Details</a>

                            <a class="btn btn-small btn-outline-primary"
                               href="{{ route('user.edit', ["user" => $user]) }}">Modifier</a>

                            <form class="mt-1" method="POST"
                                  action="{{route('user.destroy', ["user" => $user])}}">
                                @csrf
                                @method('DELETE')

                                <div class="form-group">
                                    <input type="submit" class="btn btn-outline-danger delete-user"
                                           value="Supprimer">
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@include('inc._footer')
