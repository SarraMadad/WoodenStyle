<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fs-2" href="{{ route('client.index') }}">
            <img src="/img/logo.png" width="75" height="auto">
            WoodenStyle Admin
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{ $selected }}
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ $selected == "dashboard" ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard.index') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $selected == "product" ? 'active' : '' }}" href="{{ route('product.index') }}">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $selected == "category" ? 'active' : '' }}" href="{{ route('category.index') }} ">Catégories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $selected == "user" ? 'active' : '' }}" href="{{ route('user.index') }}">Utilisateurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $selected == "command" ? 'active' : '' }}" href="{{ route('command.index') }}">Commandes</a>
                </li>
            </ul>
            <div class="text-center p-3">
                <a class="btn btn-light" href="{{ route('client.index') }}">
                    Espace Client
                </a>
            </div>
        </div>
    </div>
</nav>
