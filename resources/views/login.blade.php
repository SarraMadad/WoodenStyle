@include('.inc._header')

<body>
<main>

    @include('inc._menu', ['selected' => ''])

    <div class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1> Connexion </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <div class="row">
            <form class="padding-md-4" method="POST" action="{{ route('client.login.store') }}">
                @method('POST')
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail" name="email"
                           aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="exampleInputPassword" name="password">
                </div>
                <button type="submit" class="btn btn-primary ">Se connecter</button>
            </form>
            <a type="submit" class="btn btn-link" href="{{ route('client.register.create') }}"> Créer un compte </a>
        </div>
    </div>


@include('.inc._footer')
