@include('inc._header')

<body>
<main>
    @include('inc._menu')

    <div class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <a class="text-muted" href="{{ route('command.index') }}" role="button"> Retour </a>
                </div>
            </div>
        </div>
    </main>
    <div class="container p-5">
        <div class="row mt-4">
            <div class="col">
                <table class="table table-striped">
                    <tr>
                        <td> Montant total</td>
                        <td> {{ $command->totalAmount }} </td>
                    </tr>
                    <tr>
                        <td> Client</td>
                        <td> {{ $command->user_id }} </td> <!-- TODO : Afficher le nom du client -->
                    </tr>
                    <tr>
                        <td> Produits</td>
                        <td> {{ $command->product }} </td>
                    </tr>
                    <tr>
                        <td> Statut</td>
                        <td> {{ $command->status }} </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@include('inc._footer')
