@include('.inc._header')

<body>
<main>

    @include('inc._adminMenu')

    <div class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <a class="text-muted" href="{{ route('product.index') }}" role="button"> Retour </a>
                <div class="col-md-9">
                    <h1> Produits </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <div class="row">
            <form name="add-product-put-form" id="add-product-put-form" method="post"
                  action="{{route('product.update', ["product" => $product])}}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="productNameInput" class="form-label">Nom</label>
                    <input type="text" id="name" name="name" class="form-control" required="required"
                           placeholder="Habillement" value="{{ $product->name }}">
                </div>
                <div class="mb-3">
                    <label for="productDescriptionInput" class="form-label">Description</label>
                    <textarea name="description" class="form-control" required="required"
                              placeholder="Regroupe tous les types de vêtements">{{ $product->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="productPriceInput" class="form-label">Prix</label>
                    <input type="number" id="price" name="price" class="form-control" required="required"
                           placeholder="1500" value="{{ $product->price }}">
                </div>
                <div class="mb-3">
                    <label for="productStockInput" class="form-label">Stock</label>
                    <input type="number" id="stock" name="stock" class="form-control" required="required"
                           placeholder="100" value="{{ $product->stock }}">
                </div>
                <div class="mb-3"> <!-- TODO : selection + option des categories en BDD -->
                    <label for="productCategoryInput" class="form-label">Categorie</label>
                    <input type="number" id="category" name="category" class="form-control"
                           value="{{ $product->category_id }}">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary mb-3">Soumettre</button>
                </div>
            </form>
        </div>
    </div>

@include('.inc._footer')
