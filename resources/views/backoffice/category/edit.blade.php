@include('.inc._header')

<body>
<main>

    @include('inc._adminMenu')

    <div class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <a class="text-muted" href="{{ route('category.index') }}" role="button"> Retour </a>
                <div class="col-md-9">
                    <h1> Catégories </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <div class="row">
            <form name="add-category-put-form" id="add-category-put-form" method="post"
                  action="{{route('category.update', ["category" => $category])}}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="categoryNameInput" class="form-label">Nom</label>
                    <input type="text" id="name" name="name" class="form-control" required="required"
                           placeholder="Habillement" value="{{ $category->name }}">
                </div>
                <div class="mb-3">
                    <label for="categoryDescriptionInput" class="form-label">Description</label>
                    <textarea name="description" class="form-control" required="required"
                              placeholder="Regroupe tous les types de vêtements">{{ $category->description }}</textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary mb-3">Soumettre</button>
                </div>
            </form>
        </div>
    </div>

@include('.inc._footer')
