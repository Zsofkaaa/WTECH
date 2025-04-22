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
                <div style="font-size: xx-large;">{{ $categoryTitle }}</div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3 px-3">
                <button class="btn btn-outline-secondary">Zoradiť</button>
                <button class="btn btn-outline-secondary">Filter</button>
            </div>
                <div class="container pt-1">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4">
                            <a href="{{ route('product.show', ['id' => 1]) }}" class="text-decoration-none text-dark">
                                <div class="product-card">
                                    <button class="heart-icon">❤️</button>
                                    <div class="product-image">
                                        <img src="{{ asset('Pictures/tury mury.jpg') }}" alt="Product 1">
                                    </div>
                                    <div class="product-details">
                                        <h5>Túry můry</h5>
                                        <p>Cena: 20€</p>
                                        <button class="btn btn-primary">Pridať do košíka</button>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <a href="{{ route('product.show', ['id' => 2]) }}" class="text-decoration-none text-dark">
                                <div class="product-card">
                                    <button class="heart-icon">❤️</button>
                                    <div class="product-image">
                                        <img src="{{ asset('Pictures/blafuj.webp') }}" alt="Product 2">
                                    </div>
                                    <div class="product-details">
                                        <h5>Blafuj</h5>
                                        <p>Cena: 10€</p>
                                        <button class="btn btn-primary">Pridať do košíka</button>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <a href="{{ route('product.show', ['id' => 3]) }}" class="text-decoration-none text-dark">
                                <div class="product-card">
                                    <button class="heart-icon">❤️</button>
                                    <div class="product-image">
                                        <img src="{{ asset('Pictures/clovece.jpg') }}" alt="Product 3">
                                    </div>
                                    <div class="product-details">
                                        <h5>Človeče</h5>
                                        <p>Cena: 25€</p>
                                        <button class="btn btn-primary">Pridať do košíka</button>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <a href="{{ route('product.show', ['id' => 4]) }}" class="text-decoration-none text-dark">
                                <div class="product-card">
                                    <button class="heart-icon">❤️</button>
                                    <div class="product-image">
                                        <img src="{{ asset('Pictures/bang.jpg') }}" alt="Product 4">
                                    </div>
                                    <div class="product-details">
                                        <h5>Bang</h5>
                                        <p>Cena: 30€</p>
                                        <button class="btn btn-primary">Pridať do košíka</button>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <a href="{{ route('product.show', ['id' => 5]) }}" class="text-decoration-none text-dark">
                                <div class="product-card">
                                    <button class="heart-icon">❤️</button>
                                    <div class="product-image">
                                        <img src="{{ asset('Pictures/dixit.webp') }}" alt="Product 5">
                                    </div>
                                    <div class="product-details">
                                        <h5>Dixit</h5>
                                        <p>Cena: 30€</p>
                                        <button class="btn btn-primary">Pridať do košíka</button>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <a href="{{ route('product.show', ['id' => 6]) }}" class="text-decoration-none text-dark">
                                <div class="product-card">
                                    <button class="heart-icon">❤️</button>
                                    <div class="product-image">
                                        <img src="{{ asset('Pictures/monopoly.webp') }}" alt="Product 6">
                                    </div>
                                    <div class="product-details">
                                        <h5>Monopoly</h5>
                                        <p>Cena: 40€</p>
                                        <button class="btn btn-primary">Pridať do košíka</button>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <a href="{{ route('product.show', ['id' => 7]) }}" class="text-decoration-none text-dark">
                                <div class="product-card">
                                    <button class="heart-icon">❤️</button>
                                    <div class="product-image">
                                        <img src="{{ asset('Pictures/activity.webp') }}" alt="Product 7">
                                    </div>
                                    <div class="product-details">
                                        <h5>Activity</h5>
                                        <p>Cena: 40€</p>
                                        <button class="btn btn-primary">Pridať do košíka</button>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <a href="{{ route('product.show', ['id' => 8]) }}" class="text-decoration-none text-dark">
                                <div class="product-card">
                                    <button class="heart-icon">❤️</button>
                                    <div class="product-image">
                                        <img src="{{ asset('Pictures/uno deluxe.jpg') }}" alt="Product 8">
                                    </div>
                                    <div class="product-details">
                                        <h5>Uno Deluxe</h5>
                                        <p>Cena: 25€</p>
                                        <button class="btn btn-primary">Pridať do košíka</button>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <a href="{{ route('product.show', ['id' => 9]) }}" class="text-decoration-none text-dark">
                                <div class="product-card">
                                    <button class="heart-icon">❤️</button>
                                    <div class="product-image">
                                        <img src="{{ asset('Pictures/exploding kittens.webp') }}" alt="Product 9">
                                    </div>
                                    <div class="product-details">
                                        <h5>Exploding kittens</h5>
                                        <p>Cena: 25€</p>
                                        <button class="btn btn-primary">Pridať do košíka</button>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                    <div class="pagination-container">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
