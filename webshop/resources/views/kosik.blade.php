<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Košík</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/kosik.css') }}" rel="stylesheet">
</head>
<body>
    @include('partials.header')

    <div class="container mt-5 pt-5 cart-container" style="margin-top: 120px !important;">
        <div class="row">
            <div class="col-md-8">
                <h3>Košík (počet produktov: 3)</h3>
                <div class="cart-item d-flex align-items-center">
                    <img src="{{ asset('Pictures/tury mury.jpg') }}" class="me-2" alt="product" width="50">
                    <div class="flex-grow-1">Túry můry</div>
                    <div class="quantity mx-2">
                        <button class="btn btn-sm text-white">-</button>
                        <span class="mx-2">1</span>
                        <button class="btn btn-sm text-white">+</button>
                    </div>
                    <div class="price mx-2">20€</div>
                    <button class="btn btn-danger btn-sm">✖</button>
                </div>
                <div class="cart-item d-flex align-items-center">
                    <img src="{{ asset('Pictures/blafuj.webp') }}" class="me-2" alt="product" width="50">
                    <div class="flex-grow-1">Blafuj</div>
                    <div class="quantity mx-2">
                        <button class="btn btn-sm text-white">-</button>
                        <span class="mx-2">1</span>
                        <button class="btn btn-sm text-white">+</button>
                    </div>
                    <div class="price mx-2">10€</div>
                    <button class="btn btn-danger btn-sm">✖</button>
                </div>
                <div class="cart-item d-flex align-items-center">
                    <img src="{{ asset('Pictures/clovece.jpg') }}" class="me-2" alt="product" width="50">
                    <div class="flex-grow-1">Človeče</div>
                    <div class="quantity mx-2">
                        <button class="btn btn-sm text-white">-</button>
                        <span class="mx-2">1</span>
                        <button class="btn btn-sm text-white">+</button>
                    </div>
                    <div class="price mx-2">25€</div>
                    <button class="btn btn-danger btn-sm">✖</button>
                </div>
            </div>
            <div class="col-md-4 d-flex flex-column align-items-center">
                <div class="summary p-3 w-100">
                    <div>Spolu:</div>
                    <div>55€</div>
                    <button onclick="location.href='{{ url('/boxcollect') }}'"  class="btn btn-dark mt-3 w-100">Vybrať službu</button>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
