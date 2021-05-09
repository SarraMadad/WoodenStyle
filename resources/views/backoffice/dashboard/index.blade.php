@include('.inc._header')

<body>
<main>

    @include('inc._adminMenu', ['selected' => 'dashboard'])

    <div class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1> Tableau de bord </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <div class="row">
            <!-- Produits -->
            <div class="col-6">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <h3> Produits </h3>
                        </div>
                        <div class="col-md-3">
                            <a class="btn btn-outline-secondary float-right" href="{{ route('product.index') }}"
                               role="button"> Voir plus </a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead class="thead">
                    <tr>
                        <th> Nom</th>
                        <th> Description</th>
                        <th> Catégorie</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($products as $key => $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->category->name }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>


            <!-- Catégories -->
            <div class="col-6">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <h3> Catégories </h3>
                        </div>
                        <div class="col-md-3">
                            <a class="btn btn-outline-secondary float-right" href="{{ route('category.index') }}"
                               role="button"> Voir plus </a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead class="thead">
                    <tr>
                        <th> Nom</th>
                        <th> Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $key => $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            <!-- Users -->
            <div class="mt-5 col-6">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <h3> Clients </h3>
                        </div>
                        <div class="col-md-3">
                            <a class="btn btn-outline-secondary float-right" href="{{ route('user.index') }}"
                               role="button"> Voir plus </a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead class="thead">
                    <tr>
                        <th> Nom</th>
                        <th> Email</th>
                        <th> Admin</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key => $user)
                        <tr>
                            <td>{{ $user->firstname . ' ' . $user->lastname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->is_admin == 0 ? 'Non' : 'Oui' }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            <!-- Commands -->
            <div class="mt-5 col-6">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <h3> Commandes </h3>
                        </div>
                        <div class="col-md-3">
                            <a class="btn btn-outline-secondary float-right" href="{{ route('command.index') }}"
                               role="button"> Voir plus </a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead class="thead">
                    <tr>
                        <th> Numéro de commande</th>
                        <th> Montant</th>
                        <th> Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($commands as $key => $command)
                        <tr>
                            <td>{{ $command->id }}</td>
                            <td>{{ $command->totalAmount }} €</td>
                            <td>{{ $command->created_at }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@include('.inc._footer')
