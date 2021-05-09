@include('.inc._header')

<body>
<main>

    @include('inc._menu', ['selected' => 'command'] )

    <div class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1> Mes commandes </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <div class="row">
            <table class="table table-striped">
                <thead class="thead">
                <tr>
                    <th scope="col"> Numéro de commande</th>
                    <th scope="col"> Montant total</th>
                    <th scope="col"> Date</th>
                    <th scope="col"> Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($commands as $key => $command)
                    <tr>
                        <td>{{ $command->id }} </td>
                        <td>{{ $command->totalAmount }} € </td>
                        <td>{{ $command->created_at }} </td>
                        <td>
                            <a class="btn btn-small btn-outline-dark"
                               href="#">Details</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@include('.inc._footer')
