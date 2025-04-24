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
                @foreach ($sections as $section)
                    <div class="carousel-section">
                        <div class="carousel-header">{{ $section }}</div>
                        <div class="carousel-content">
                            @foreach ($productsBySection[$section] as $product)
                                <a href="{{ route('product.show', ['id' => $product->id]) }}" class="product-card text-decoration-none text-dark">
                                    <div class="product-image">
                                        <img src="{{ asset('Pictures/' . $product->images->first()->filename) }}" alt="{{ $product->name }}">
                                    </div>
                                    <div class="product-name">{{ $product->name }}</div>
                                </a>
                            @endforeach
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