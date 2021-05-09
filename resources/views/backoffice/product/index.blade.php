@include('.inc._header')

<body>
<main>

    @include('inc._adminMenu', ['selected' => 'product'])

    <div class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1> Produits </h1>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-primary float-right" href="{{ route('product.create') }}" role="button"><i
                            class="fa fa-plus-circle"></i> Ajouter un produit </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <div class="row">
            <table class="table table-striped">
                <thead class="thead">
                <tr>
                    <th scope="col"> ID</th>
                    <th scope="col"> Nom</th>
                    <th scope="col"> Prix</th>
                    <th scope="col"> Stock</th>
                    <th scope="col"> Catégorie</th>
                    <th scope="col"> Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $key => $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }} €</td>
                        <td>{{ $product->stock }} unité(s)</td>
                        <td>{{ $product->category->name ?? "N/A" }} </td>
                        <td>
                            <a class="btn btn-small btn-outline-dark"
                               href="{{ route('product.show', ["product" => $product]) }}">Details</a>

                            <a class="btn btn-small btn-outline-primary"
                               href="{{ route('product.edit', ["product" => $product]) }}">Modifier</a>

                            <form class="mt-1" method="POST"
                                  action="{{route('product.destroy', ["product" => $product])}}">
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

                </tbody>
            </table>
        </div>
    </div>

@include('.inc._footer')
