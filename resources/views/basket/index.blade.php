@include('inc._header')

<body>
<main>

    @include('inc._menu', ['selected' => 'basket'])

    <div class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1> Mon panier </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <div class="row">
            <table class="table table-striped">
                <thead class="thead">
                <tr>
                    <th scope="col"> Produits</th>
                    <th scope="col"> Montant</th>
                    <th scope="col"> Actions</th>
                </tr>
                </thead>
                <tbody>

                @if($basket)
                    @foreach($basket->products as $key => $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }} €</td>
                            <td>
                                <form class="mt-1" method="POST"
                                      action="#">
                                    @csrf
                                    @method('DELETE')

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-outline-danger delete-user"
                                               value="Supprimer">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>Montant total</td>
                        <td>{{ $basket->totalAmount }} €</td>
                        <td></td>
                    </tr>
                @endif

                </tbody>
            </table>
            <a class="btn btn-small btn-success"
               href="#">Payer</a>

        </div>
    </div>

@include('inc._footer')