<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>
<body>
    @include('partials.header')

    <div class="container-fluid mt-4">
        <div class="row flex-nowrap">
            @include('partials.sidebar')

            <section class="col">
                @foreach ($sections as $section)
                    <div class="carousel-section">
                        <h3 class="carousel-header">{{ $section }}</h3>

                        <div class="carousel-wrapper">
                            <button class="arrow-section arrow left">&#9664;</button> <!-- ◀ -->

                            <div class="carousel-view">
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
                            </div>

                            <button class="arrow-section arrow right">&#9654;</button> <!-- ▶ -->
                        </div>

                    </div>
                @endforeach
            </section>
        </div>
    </div>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/home-carousel.js') }}"></script>
</body>
</html>
