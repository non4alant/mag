<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ErrorReportController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CharacteristicController;
use App\Http\Controllers\ComparisonController;
use App\Http\Controllers\SearchProductController;
use App\Http\Controllers\CartController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', [TestController::class, 'index']);
Route::post('/error-report', [ErrorReportController::class, 'store']);

Route::resources([
    'product' => ProductController::class,
    'characteristic' => CharacteristicController::class
]);

Route::prefix('comparison')->group(function () {
    Route::get('/', [ComparisonController::class, 'index'])->name('comparison.index');
    Route::post('/add', [ComparisonController::class, 'addToComparison'])->name('comparison.add');
    Route::post('/remove', [ComparisonController::class, 'removeFromComparison'])->name('comparison.remove');
});

Route::get('/cart/search', [CartController::class, 'searchForm'])->name('cart.search');
Route::post('/cart/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::get('search-product', [SearchProductController::class, 'index']);
