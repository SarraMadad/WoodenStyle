@include('.inc._header')

<body>
<main>

@include('inc._menu', ['selected' => ''])

    <form>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-light">Se connecter</button>
        <button type="submit" class="btn btn-light" href="{{ route('register.login') }}>Créer un compte</button>
    </form>



@include('.inc._footer')