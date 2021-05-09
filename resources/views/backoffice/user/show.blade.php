@include('.inc._header')

<body>
<main>
    @include('inc._adminMenu', ['selected' => 'user'])

    <div class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <a class="text-muted" href="{{ route('user.index') }}" role="button"> Retour </a>
                <div class="col-md-9">
                    <h1> Clients détails </h1>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-primary float-right"
                       href="{{ route('user.edit', ["user" => $user]) }}">Modifier</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <div class="row mt-4">
            <div class="col">
                <table class="table table-striped">
                    <tr>
                        <td> Prénom</td>
                        <td> {{ $user->firstname }} </td>
                    </tr>
                    <tr>
                        <td> Nom</td>
                        <td> {{ $user->lastname }} </td>
                    </tr>
                    <tr>
                        <td> Email</td>
                        <td> {{ $user->email }} </td>
                    </tr>
                    <tr>
                        <td> Adresse</td>
                        <td> {{ $user->address }} </td>
                    </tr>
                    <tr>
                        <td> Mot de passe</td>
                        <td> {{ $user->password }} </td>
                    </tr>
                    <tr>
                        <td> Est administrateur ?</td>
                        <td> {{ $user->is_admin }} </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@include('.inc._footer')
