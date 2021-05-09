<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #D1A56D">
    <div class="container">
        <a class="navbar-brand fs-2" href="{{ route('client.index') }}">
            <img src="/img/logo.png" width="75" height="auto">
            WStyle
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Catégories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mes commandes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mon panier</a>
                </li>
            </ul>
            <div class="text-center p-3">
                <a class="btn btn-light"
                   href="{{ route('dashboard.index') }}">
                    Espace Administrateur
                </a>
            </div>
        </div>
    </div>
</nav>
