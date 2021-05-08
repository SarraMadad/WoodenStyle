@include('.inc._header')

<body>
<main>

    @include('inc._adminMenu')

    <div class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1> Dashboard </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <div class="row">
            <!-- Article -->
            <div class="col-6">
                <table class="table table-striped">
                    <h3> Articles </h3>
                    <thead class="thead">
                    <tr>
                        <th> Nom</th>
                        <th> Description</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($categories as $key => $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>


            <!-- Catégories -->
            <div class="col-6">
                <table class="table table-striped">
                    <h3> Catégories </h3>
                    <thead class="thead">
                    <tr>
                        <th> Nom</th>
                        <th> Description</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($categories as $key => $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@include('.inc._footer')
