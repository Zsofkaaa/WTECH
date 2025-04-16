<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detaily o produkte - {{ $product['name'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/detailyoprodukte.css') }}" rel="stylesheet">
</head>

<body>
    @include('partials.header')

    <div class="container product-container">
        <div class="row align-items-center">
            <div class="col-md-6 d-flex justify-content-center">
                <div class="product-image-wrapper">
                    <button class="arrow-button left-arrow" onclick="changeImage(-1)">&#10094;</button>
                    <div class="product-image" id="productImage">
                        <img src="{{ asset('Pictures/' . $product['image']) }}" alt="{{ $product['name'] }}" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <button class="arrow-button right-arrow" onclick="changeImage(1)">&#10095;</button>
                </div>
            </div>
            <div class="col-md-6">
                <h2>{{ $product['name'] }}</h2>
                <p>{{ $product['price'] }} €</p>
                <div class="d-flex align-items-center gap-2 mt-2">
                    <button class="btn btn-dark">Pridať do košíka</button>
                    <button class="heart-icon btn btn-light">❤️</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="product-description" style="margin-bottom: 80px;">
            <h3>Popis produktu</h3>
            <p>{{ $product['description'] }}</p>
        </div>
    </div>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
