@include('.inc._header')

<body>
<main>

    @include('inc._adminMenu')

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
            <form name="add-user-put-form" id="add-user-put-form" method="post"
                  action="{{route('user.update', ["user" => $user])}}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="userFirstNameInput" class="form-label">Prénom</label>
                    <input type="text" id="firstname" name="firstname" class="form-control" required="required"
                           value="{{ $user->firstname }}">
                </div>
                <div class="mb-3">
                    <label for="userLastNameInput" class="form-label">Nom</label>
                    <input type="text" id="lastname" name="lastname" class="form-control" required="required"
                           value="{{ $user->lastname }}">
                </div>
                <div class="mb-3">
                    <label for="userLastNameInput" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required="required"
                           value="{{ $user->email }}">
                </div>
                <div class="mb-3">
                    <label for="userAddressInput" class="form-label">Adresse</label>
                    <input type="text" id="address" name="address" class="form-control" required="required"
                           value="{{ $user->address }}">
                </div>
                <div class="mb-3">
                    <label for="userPasswordInput" class="form-label">Mot de passe</label>
                    <input type="password" id="password" name="password" class="form-control" required="required"
                           value="{{ $user->password }}">
                </div>
                <div class="mb-3">
                    <label for="userAdminInput" class="form-label">est administrateur ?</label>
                    <select class="form-control" name="is_admin" id="is_admin" required="required">
                        <option value="0" {{ $user->is_admin == 0 ? 'selected' : '' }}>Non</option>
                        <option value="1" {{ $user->is_admin == 1 ? 'selected' : '' }}>Oui</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary mb-3">Soumettre</button>
                </div>
            </form>
        </div>
    </div>

@include('.inc._footer')

