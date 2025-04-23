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

                @php $cart = session('cart', []); @endphp

                <h3>Košík (počet produktov: {{ count($cart) }})</h3>

                @foreach ($cart as $id => $item)
                    <div class="cart-item d-flex align-items-center">
                        <img src="{{ asset('Pictures/' . $item['image']) }}" class="me-2" alt="product" width="50">
                        <div class="flex-grow-1">{{ $item['name'] }}</div>

                        <!-- Mennyiség csökkentése -->
                        <form action="{{ route('cart.update', ['id' => $id]) }}" method="POST" class="d-inline mx-1">
                            @csrf
                            <input type="hidden" name="action" value="decrease">
                            <button class="btn btn-sm btn-secondary">-</button>
                        </form>

                        <span class="mx-2">{{ $item['quantity'] }}</span>

                        <!-- Mennyiség növelése -->
                        <form action="{{ route('cart.update', ['id' => $id]) }}" method="POST" class="d-inline mx-1">
                            @csrf
                            <input type="hidden" name="action" value="increase">
                            <button class="btn btn-sm btn-secondary">+</button>
                        </form>

                        <div class="price mx-2">{{ $item['price'] * $item['quantity'] }}€</div>

                        <!-- Törlés gomb -->
                        <form action="{{ route('cart.remove', ['id' => $id]) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-danger btn-sm">✖</button>
                        </form>
                    </div>
                @endforeach

            </div>
            <div class="col-md-4 d-flex flex-column align-items-center">
                <div class="summary p-3 w-100">
                    <div>Spolu: {{ collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']) }}€</div>
                    <button onclick="location.href='{{ url('/boxcollect') }}'"  class="btn btn-dark mt-3 w-100">Vybrať službu</button>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
