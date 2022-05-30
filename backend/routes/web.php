<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MysteryComponent;
use App\Http\Livewire\HorrorComponent;
use App\Http\Livewire\AdventureComponent;
use App\Http\Livewire\RomanceComponent;
use App\Http\Livewire\ChildrenComponent;
use App\Http\Livewire\SciFiComponent;
use App\Http\Livewire\AdminAddBookComponent;

/*php
use App\Http\Controllers\UserController;

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

Route::get('admin-addbook', AdminAddBookComponent::class)->name('addbook');

Route::get('/welcome', function () {
    return view('welcome');
});

<<<<<<< HEAD
Route::get('/home', function () {
    return view('home');
});

=======
// Route::get('/home', function () {
//     return view('home');
// });

Route::get('/', [UserController::class, 'home']);

Route::get('/signup', function () {
    return view('auth.register');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/home', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);

>>>>>>> main
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
