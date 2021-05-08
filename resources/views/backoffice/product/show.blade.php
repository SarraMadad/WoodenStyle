@include('.inc._header')

<body>
<main>
    @include('inc._adminMenu')

    <div class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <a class="text-muted" href="{{ route('product.index') }}" role="button"> Retour </a>
                <div class="col-md-9">
                    <h1> Produits détails </h1>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-primary float-right"
                       href="{{ route('product.edit', ["product" => $product]) }}">Modifier</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <div class="row mt-4">
            <div class="col">
                <table class="table table-striped">
                    <tr>
                        <td> Nom</td>
                        <td> {{ $product->name }} </td>
                    </tr>
                    <tr>
                        <td> Description</td>
                        <td> {{ $product->description }} </td>
                    </tr>
                    <tr>
                        <td> Prix</td>
                        <td> {{ $product->price }} </td>
                    </tr>
                    <tr>
                        <td> Stock</td>
                        <td> {{ $product->stock }} </td>
                    </tr>
                    <tr>
                        <td> Catégorie</td>
                        <td> {{ $product->category_id }} </td> <!-- TODO : Afficher le nom de la catégorie -->
                    </tr>
                </table>
            </div>
        </div>
    </div>

@include('.inc._footer')
