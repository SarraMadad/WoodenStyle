@include('inc._header')

<body>
<div>
    @include('inc._adminMenu', ['selected' => 'command'])

    <div class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <a class="text-muted" href="{{ route('command.index') }}" role="button"> Retour </a>
                <div class="col-md-9">
                    <h1> Commande détails </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <div class="row mt-4">
            <div class="col">
                <table class="table table-striped">
                    <h3>Détails de la commande</h3>
                    <tr>
                        <td> Client</td>
                        <td> {{ $command->user->firstname . ' ' . $command->user->lastname }} </td>
                    </tr>
                    <tr>
                        <td> Statut</td>
                        <td> {{ $command->status }} </td>
                    </tr>
                    <tr>
                        <td> Montant total</td>
                        <td> {{ $command->totalAmount }} €</td>
                    </tr>
                    <tr>
                        <td> Date</td>
                        <td> {{ $command->created_at }} </td>
                    </tr>
                </table>

                <table class="table table-striped">
                    <h3>Produits</h3>
                    <thead class="thead">
                    <tr>
                        <th scope="col"> Nom</th>
                        <th scope="col"> Description</th>
                        <th scope="col"> Catégorie</th>
                        <th scope="col"> Prix</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($command->products as $key => $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->category->name }} </td>
                            <td>{{ $product->price}} €</td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>

@include('inc._footer')
