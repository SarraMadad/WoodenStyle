@include('.inc._header')

<body>
<main>

    @include('inc._menu', ['selected' => 'user'], ['selected' => 'product'] )

    <div class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1> Client  {{ $user->firstname . lastname }} </h1>
                </div>
                <div class="col-md-9">
                    <h1> Client  {{ $product->name }} </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <div class="row">
            <table class="table table-striped">
                <thead class="thead">
                <tr>
                    <th scope="col"> Client</th>
                    <th scope="col"> Produits</th>
                </tr>
                </thead>
                <tbody>

                @foreach($user->commands as $key => $command)
                    <tr>
                        <td>{{ $command->user->firstname . lastname ?? "N/A" }} </td>
                        <td>
                            <a class="btn btn-small btn-outline-dark" href="#">
                                <i class="bi bi-basket"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

                @foreach($product->commands as $key => $command)
                    <tr>
                        <td>{{ $command->product->name ?? "N/A" }} </td>
                        <td>
                            <a class="btn btn-small btn-outline-dark" href="#">
                                <i class="bi bi-basket"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@include('.inc._footer')
