<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #D1A56D">
    <div class="container">
        <a class="navbar-brand fs-2" href="{{ route('client.index') }}">
            <img src="/img/logo.png" width="75" height="auto">
            WoodenStyle
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ $selected == "category" ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">Catégories</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($categories as $key => $category)
                            <li><a class="dropdown-item" href="{{ route('client.product', ["category_id" => $category->id]) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
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
