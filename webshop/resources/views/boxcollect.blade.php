<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Box collect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/boxcollect.css') }}" rel="stylesheet">
</head>



<body>
    @include('partials.header')
    <div class="container mt-5 pt-5" style="margin-top: 120px !important;">
        <div class="price-container text-center">Spolu: cena</div>
        <div class="shipping-container p-3 mt-3">
            <div>Spôsob dopravy:</div>
            <div class="d-flex justify-content-around mt-2">
                <div class="shipping-option" onclick="window.location.href='{{ url('/kurierskadoprava') }}'">
                    <span class="radio-button {{ request()->is('kurierskadoprava') ? 'selected' : '' }}" id="radio-kurier"></span>
                    Kuriérska služba
                </div>

                <div class="shipping-option" onclick="window.location.href='{{ url('/boxcollect') }}'">
                    <span class="radio-button {{ request()->is('boxcollect') ? 'selected' : '' }}" id="radio-box"></span>
                    Box collect
            </div>
        </div>
        </div>
        <form class="row g-3 mt-4">
            <div class="col-md-6">
                <label class="form-label">Meno a priezvisko</label>
                <input type="text" class="form-control">
                <label class="form-label">Email</label>
                <input type="email" class="form-control">
                <label class="form-label">Telefónne číslo</label>
                <input type="tel" class="form-control">
                <label class="form-label">Krajina</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Vybrať box</label>
                <input type="text" class="form-control" placeholder="Zadaj miesto">
            </div>
        </form>
        <button onclick="location.href='{{ url('/platba') }}'" class="btn btn-dark mt-3">Ďalej na platbu</button>
    </div>
    @include('partials.footer')

    <script>
    function selectShipping(option) {
        document.getElementById('radio-kurier').classList.remove('selected');
        document.getElementById('radio-box').classList.remove('selected');
        document.getElementById(`radio-${option}`).classList.add('selected');

        // Presmerovanie na inú stránku podľa výberu
        if (option === 'kurier') {
            window.location.href = "{{ url('/kurierskadoprava') }}";
        } else if (option === 'box') {
            window.location.href = "{{ url('/boxcollect') }}";
        }
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
