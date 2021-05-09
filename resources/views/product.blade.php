@include('.inc._header')

<body>
<main>

    @include('inc._menu', ['selected' => 'category'])

    <div class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1> Catégorie  {{ $category->name }} </h1>
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
                    <th scope="col"> Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($category->products as $key => $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }} €</td>
                        <td>{{ $product->category->name ?? "N/A" }} </td>
                        <td>
                            <a class="btn btn-small btn-outline-dark" href="#">
                                <i class="bi bi-basket"></i>
                            </a>

                            <form class="mt-1" method="POST"
                                  action="#">
                                @csrf
                                @method('DELETE')

                                <div class="form-group">
                                    <input type="submit" class="btn btn-outline-danger delete-user"
                                           value="Supprimer du panier">
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
