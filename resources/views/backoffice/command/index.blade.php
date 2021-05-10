@include('inc._header')

<body>
<main>

    @include('inc._adminMenu', ['selected' => 'client.command'])

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
                    <th scope="col"> Montant total</th>
                    <th scope="col"> Statut</th>
                    <th scope="col"> Actions </th>

                </tr>
                </thead>
                <tbody>

                @foreach($commands as $key => $command)
                    <tr>
                        <td>{{ $command->id }}</td>
                        <td>{{ $command->user->firstname . ' ' . $command->user->lastname }}</td>
                        <td>{{ $command->totalAmount }} € </td>
                        <td>{{ $command->status}}</td>
                        <td>
                            <a class="btn btn-small btn-outline-dark"
                               href="{{ route('command.show', ["command" => $command]) }}">Details</a>

                            <!-- <form class="mt-1" method="POST"
                                  action="{{route('command.destroy', ["command" => $command])}}">
                                @csrf
                                @method('DELETE')

                                <div class="form-group">
                                    <input type="submit" class="btn btn-outline-danger delete-user"
                                           value="Supprimer">
                                </div>
                            </form> -->
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@include('inc._footer')
