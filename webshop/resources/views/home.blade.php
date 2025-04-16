<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>

<body>
    @include('partials.header')

    <div class="container-fluid mt-4">
        <div class="row">
            <aside class="col-auto sidebar">
                <div class="d-flex flex-column">
                    <button onclick="location.href='{{ url('/shop/vedomostne') }}'" class="category-button">Vedomostné hry</button>
                    <button onclick="location.href='{{ url('/shop/karty') }}'" class="category-button">Kartové hry</button>
                    <button onclick="location.href='{{ url('/shop/party') }}'" class="category-button">Party hry</button>
                    <button onclick="location.href='{{ url('/shop/rodinne') }}'" class="category-button">Rodinné hry</button>
                    <button onclick="location.href='{{ url('/shop/deti') }}'" class="category-button">Pre deti</button>
                    <button onclick="location.href='{{ url('/shop/strategia') }}'" class="category-button">Štrategické hry</button>
                    <button onclick="location.href='{{ url('/shop/puzzle') }}'" class="category-button">Puzzle</button>
                    <button onclick="location.href='{{ url('/shop/pamat') }}'" class="category-button">Pamäťové hry</button>
                </div>
            </aside>

            <section class="col">
                @foreach (['Akcie', 'Novinky', 'Best sellers'] as $section)
                <div class="carousel-section">
                    <div class="carousel-header">{{ $section }}</div>
                    <div class="carousel-content">
                        <div class="product-card">
                            <div class="product-image">
                                <img src="{{ asset('Pictures/tury mury.jpg') }}" alt="Product 1">
                            </div>
                            <div class="product-name">Túry můry</div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="{{ asset('Pictures/blafuj.webp') }}" alt="Product 2">
                            </div>
                            <div class="product-name">Blafuj</div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="{{ asset('Pictures/clovece.jpg') }}" alt="Product 3">
                            </div>
                            <div class="product-name">Človeče</div>
                        </div>
                    </div>
                    <div class="arrow-section">
                        <button class="arrow">◀</button>
                        <button class="arrow">▶</button>
                    </div>
                </div>
                @endforeach
            </section>
        </div>

        @include('partials.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>