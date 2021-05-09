@include('.inc._header')

<body>
<main>

    @include('inc._adminMenu', ['selected' => 'category'])

    <div class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1> Catégories </h1>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-primary float-right" href="{{ route('category.create') }}" role="button">
                        <i class="fa fa-plus-circle"></i>
                        Ajouter une catégorie
                    </a>
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
                    <th scope="col"> Description</th>
                    <th scope="col"> Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($categories as $key => $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a class="btn btn-small btn-outline-dark"
                               href="{{ route('category.show', ["category" => $category]) }}">Details</a>

                            <a class="btn btn-small btn-outline-primary"
                               href="{{ route('category.edit', ["category" => $category]) }}">Modifier</a>

                            <form class="mt-1" method="POST"
                                  action="{{route('category.destroy', ["category" => $category])}}">
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
