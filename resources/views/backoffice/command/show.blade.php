@include('inc._header')

<body>
<main>
    @include('inc._adminMenu')

    <div class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <a class="text-muted" href="{{ route('command.index') }}" role="button"> Retour </a>
                <div class="col-md-9">
                    <h1> Commande détails </h1>
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
                        <td> {{ $command->totalAmount }} € </td>
                    </tr>
                    <tr>
                        <td> Client</td>
                        <td> {{ $command->user->firstname . ' ' . $command->user->lastname }} </td>
                    </tr>
                    <tr>
                        <td> Statut</td>
                        <td> {{ $command->status }} </td>
                    </tr>
                    <tr>
                        <td> Date </td>
                        <td> {{ $command->created_at }} </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@include('inc._footer')
