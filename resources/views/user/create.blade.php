@include('inc._header')

<body>
<main>
    @include('inc._menu')

    <div class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <a class="text-muted" href="{{ route('user.index') }}" role="button"> Retour </a>
                <div class="col-md-9">
                    <h1> Clients </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <div class="row">
            <form name="add-user-post-form" id="add-user-post-form" method="post"
                  action="{{route('user.store')}}">
                @csrf
                <div class="mb-3">
                    <label for="userFirstNameInput" class="form-label">Prénom</label>
                    <input type="text" id="firstname" name="firstname" class="form-control" required="required"
                           placeholder="">
                </div>
                <div class="mb-3">
                    <label for="userLastNameInput" class="form-label">Nom</label>
                    <input type="text" id="lastname" name="lastname" class="form-control" required="required"
                           placeholder="">
                </div>
                <div class="mb-3">
                    <label for="userEmailInput" class="form-label">Email</label>
                    <input type="text" id="email" name="email" class="form-control" required="required"
                           placeholder="">
                </div>
                <div class="mb-3">
                    <label for="userAddressInput" class="form-label">Adresse</label>
                    <input type="text" id="email" name="email" class="form-control" required="required"
                           placeholder="">
                </div>
                <div class="mb-3">
                    <label for="userPasswordInput" class="form-label">Mot de passe</label>
                    <input type="text" id="password" name="password" class="form-control" required="required"
                           placeholder="">
                </div>
                <div class="mb-3">
                    <label for="userAdminInput" class="form-label">Prénom</label>
                    <input type="text" id="isAdmin" name="isAdmin" class="form-control" required="required"
                           placeholder="">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary mb-3">Soumettre</button>
                </div>
            </form>
        </div>
    </div>

@include('inc._footer')
