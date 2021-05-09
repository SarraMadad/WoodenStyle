@include('.inc._header')

<body>
<main>

    @include('inc._adminMenu', ['selected' => 'basket'])

    <div class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1> Commandes </h1>
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
                    <th scope="col"> Client</th>
                    <th scope="col"> Produits</th>
                </tr>
                </thead>
                <tbody>

                @foreach($baskets as $key => $basket)
                    <tr>
                        <td>{{ $basket->id }}</td>
                        <td>{{ $basket->user->lastname . firstname ?? "N/A" }} </td>
                        <td>
                            <a class="btn btn-small btn-outline-dark"
                               href="{{ route('basket.show', ["basket" => $basket]) }}">Details</a>

                            <a class="btn btn-small btn-outline-primary"
                               href="{{ route('basket.edit', ["basket" => $basket]) }}">Modifier</a>

                            <form class="mt-1" method="POST"
                                  action="{{route('basket.destroy', ["basket" => $basket])}}">
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
