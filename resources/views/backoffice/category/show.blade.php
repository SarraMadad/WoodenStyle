@include('.inc._header')

<body>
<main>
    @include('inc._adminMenu')

    <div class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <a class="text-muted" href="{{ route('category.index') }}" role="button"> Retour </a>
                <div class="col-md-9">
                    <h1> Catégorie détails </h1>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-primary float-right"
                       href="{{ route('category.edit', ["category" => $category]) }}">Modifier</a>
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
                        <td> {{ $category->name }} </td>
                    </tr>
                    <tr>
                        <td> Description</td>
                        <td> {{ $category->description }} </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@include('.inc._footer')
