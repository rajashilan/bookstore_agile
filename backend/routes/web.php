<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MysteryComponent;
use App\Http\Livewire\HorrorComponent;
use App\Http\Livewire\AdventureComponent;
use App\Http\Livewire\RomanceComponent;
use App\Http\Livewire\ChildrenComponent;
use App\Http\Livewire\SciFiComponent;
use App\Http\Livewire\AdminAddBookComponent;
use App\Http\Livewire\AdminListBookComponent;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailComponent;
use App\Http\Controllers\CheckoutController;
use App\Http\Livewire\AdminEditBookComponent;
/*php


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

Route::get('/mystery', MysteryComponent::class);

Route::get('/horror', HorrorComponent::class);

Route::get('/adventure', AdventureComponent::class);

Route::get('/romance', RomanceComponent::class);

Route::get('/children', ChildrenComponent::class);

Route::get('/sci-fi', SciFiComponent::class);

Route::get('/admin-addbook', AdminAddBookComponent::class)->name('addbook');

Route::get('/admin-listbook', AdminListBookComponent::class)->name('listbook');

Route::get('/detail', function () {
    return view('detail');
});
Route::get('/admin-editbook/{id}', AdminEditBookComponent::class)->name('editbook');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [UserController::class, 'home']);

Route::get('/signup', function () {
    return view('auth.register');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/home', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);

Auth::routes();

// Route::get('/cart', function () {
//     return view('cart');
// });

Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart']);
Route::get('/update-profile', [App\Http\Controllers\UpdateProfileController::class, 'updateProfile']);
Route::post('updateDetails', [App\Http\Controllers\UpdateProfileController::class, 'updateDetails']);


// Route::get('/home', function () {
//     return view('home');
// });
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('addtocart/{isbn}', [CartController::class, 'addtocart']);
Route::post('deletefromcart/{isbn}', [CartController::class, 'deletefromcart']);
Route::get('detail/{isbn}', [DetailController::class, 'detail']);

Route::post('editQty', [CartController::class, 'editQty']);

Route::get('checkout', [CheckoutController::class, 'checkout']);
Route::post('placeOrder',[CheckoutController::class, 'placeorder']);
Route::get('success', [CheckoutController::class, 'success']);
Route::get('error', [CheckoutController::class, 'error']);