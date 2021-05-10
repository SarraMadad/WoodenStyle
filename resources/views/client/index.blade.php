@include('inc._header')

<body>
<main>

    @include('inc._menu', ['selected' => 'catalog'])

    <div class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1> Catalogue </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <div class="row">
            <table class="table table-striped">
                <thead class="thead">
                <tr>
                    <th scope="col"> Nom</th>
                    <th scope="col"> Prix</th>
                    <th scope="col"> Catégorie</th>
                    @if( auth()->check() )
                        <th scope="col"> Actions</th>
                    @endif

                </tr>
                </thead>
                <tbody>

                @foreach($products as $key => $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }} €</td>
                        <td>{{ $product->category->name ?? "N/A" }} </td>
                        @if( auth()->check() )
                            <td>
                                <form class="mt-1" method="POST"
                                      action="{{route('client.basket.add', ["user_id" => auth()->user(), "product" => $product])}}">
                                    @method('POST')
                                    @csrf
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-outline-primary"
                                               value="Ajouter au panier">
                                    </div>
                                </form>

                                <form class="mt-1" method="POST"
                                      action="{{route('client.basket.remove', ["user_id" => auth()->user(), "product" => $product])}}">
                                    @csrf
                                    @method('POST')

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-outline-danger"
                                               value="Supprimer du panier">
                                    </div>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@include('inc._footer')
