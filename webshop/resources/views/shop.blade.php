<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/shop.css') }}" rel="stylesheet">
</head>



<body>

    @include('partials.header')

    <div class="container-fluid mt-4">
        <div class="row">

            @include('partials.sidebar')

            <section class="col">
                <div style="text-align: center; align-items: center; justify-content: center;">
                    <div style="font-size: xx-large;">{{ $categoryTitle ?? 'Shop' }}</div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3 px-3">

                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Zoradiť
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'asc']) }}">A-Z</a></li>
                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'desc']) }}">Z-A</a></li>
                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'price_asc']) }}">Cena vzostupne</a></li>
                            <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}">Cena zostupne</a></li>
                        </ul>
                    </div>

                    <button class="btn btn-outline-secondary">Filter</button>

                </div>
                <div class="container pt-1">
                    <div class="row">

                        @foreach ($products as $product)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                <a href="{{ route('product.show', $product->id) }}" class="text-decoration-none text-dark">
                                    <div class="product-card">

                                        <form action="{{ route('product.favorite', $product->id) }}" method="POST">
                                            @csrf
                                            <button class="heart-icon" type="submit">❤️</button>
                                        </form>

                                        <div class="product-image">
                                            <img src="{{ asset('Pictures/' . $product->images->first()->filename) }}" alt="{{ $product->name }}">
                                        </div>

                                        <div class="product-details">
                                            <h5>{{ $product->name }}</h5>

                                            <p>
                                                @if($product->is_discounted && $product->discounted_price)
                                                    <span class="text-decoration-line-through text-muted">{{ number_format($product->price, 2) }}€</span>
                                                    <span class="text-success fw-bold ms-2">{{ number_format($product->discounted_price, 2) }}€</span>
                                                @else
                                                    <span>{{ number_format($product->price, 2) }}€</span>
                                                @endif
                                            </p>

                                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-primary" type="submit">Pridať do košíka</button>
                                            </form>

                                        </div>

                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>

                    <div class="pagination-container">
                        {{ $products->links('pagination::bootstrap-5') }}
                    </div>

                </div>
            </section>
        </div>
    </div>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
