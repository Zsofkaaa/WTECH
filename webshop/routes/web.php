<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SideBarController;
use App\Http\Controllers\NavBarController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DakujemeController;



Route::get('/', function () {
    return view('home');
});

Route::get('/shop', function () {
    return view('shop', ['categoryTitle' => 'Všetky produkty']);
});

Route::get('/kosik', function () {
    return view('kosik');
});

Route::get('/boxcollect', function () {
    return view('boxcollect');
});

Route::get('/kurierskadoprava', function () {
    return view('kurierskadoprava');
});

Route::get('/platba', function () {
    return view('platba');
});


Route::get('/dakujeme', function () {
    return view('dakujeme');
});

Route::get('/prihlasenie', function () {
    return view('prihlasenie');
});

Route::get('/registracia', function () {
    return view('registracia');
});

Route::get('/shop/akcie', [NavBarController::class, 'showAkcie']);
Route::get('/shop/novinky', [NavBarController::class, 'showNovinky']);
Route::get('/shop/best-sellers', [NavBarController::class, 'showBestSellers']);
Route::get('/shop/oblubene', [NavBarController::class, 'showOblubene']);
Route::get('/dakujeme', [DakujemeController::class, 'index'])->name('dakujeme');

Route::get('/shop/{category}', [SideBarController::class, 'showCategory'])
    ->where('category', '^(?!akcie|novinky|best-sellers).*$');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
