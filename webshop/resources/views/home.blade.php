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

            @include('partials.sidebar')

            <section class="col">
                @foreach (['Akcie', 'Novinky', 'Best sellers'] as $section)
                <div class="carousel-section">
                    <div class="carousel-header">{{ $section }}</div>
                    <div class="carousel-content">
                        <a href="{{ route('product.show', ['id' => 1]) }}" class="product-card text-decoration-none text-dark">
                            <div class="product-image">
                                <img src="{{ asset('Pictures/tury mury.jpg') }}" alt="Túry můry">
                            </div>
                            <div class="product-name">Túry můry</div>
                        </a>
                        <a href="{{ route('product.show', ['id' => 2]) }}" class="product-card text-decoration-none text-dark">
                            <div class="product-image">
                                <img src="{{ asset('Pictures/blafuj.webp') }}" alt="Blafuj">
                            </div>
                            <div class="product-name">Blafuj</div>
                        </a>
                        <a href="{{ route('product.show', ['id' => 3]) }}" class="product-card text-decoration-none text-dark">
                            <div class="product-image">
                                <img src="{{ asset('Pictures/clovece.jpg') }}" alt="Človeče">
                            </div>
                            <div class="product-name">Človeče</div>
                        </a>
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
