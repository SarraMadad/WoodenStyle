@include('.inc._header')

<body>
<main>
    @include('inc._adminMenu', ['selected' => 'product'])

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
            <form name="add-product-post-form" id="add-product-post-form" method="post"
                  action="{{route('product.store')}}">
                @csrf
                <div class="mb-3">
                    <label for="productNameInput" class="form-label">Nom</label>
                    <input type="text" id="name" name="name" class="form-control" required="required"
                           placeholder="Table de designer en Teck">
                </div>
                <div class="mb-3">
                    <label for="productDescriptionInput" class="form-label">Description</label>
                    <textarea name="description" class="form-control"
                              placeholder="Table en bois haut de gamme réalisée par des designers Français"></textarea>
                </div>
                <div class="mb-3">
                    <label for="productPriceInput" class="form-label">Prix</label>
                    <input type="number" id="price" name="price" class="form-control" required="required"
                           placeholder="1500">
                </div>
                <div class="mb-3">
                    <label for="productStockInput" class="form-label">Stock</label>
                    <input type="number" id="stock" name="stock" class="form-control" required="required"
                           placeholder="100">
                </div>
                <div class="mb-3">
                    <label for="productCategoryInput" class="form-label">Catégorie</label>
                    <select class="form-control" name="category" id="category" required="required">
                        @foreach($categories as $key => $category)
                            <option value="{{$category->id}}"> {{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary mb-3">Soumettre</button>
                </div>
            </form>
        </div>
    </div>

@include('.inc._footer')
