<?php

use App\Http\Controllers\AdminCardsController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\SocialiteController;
use App\Models\Card;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::domain('daady.link')->group(function () {
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', [CardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/admin/dashboard', [AdminCardsController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::prefix('auth/google')->group(function () {
    Route::get('/', [SocialiteController::class, 'redirectToGoogle'])->name('redirectToGoogle');
    Route::get('/callback', [SocialiteController::class, 'handleGoogleCallback']);
});
Route::prefix('auth/twitter')->group(function () {
    Route::get('/', [SocialiteController::class, 'redirectToTwitter'])->name('redirectToTwitter');
    Route::get('/callback', [SocialiteController::class, 'handleTwitterCallback']);
});
Route::middleware('auth')->group(function () {
    Route::middleware('checkUserRole')->group(function () {
        Route::resource('admin/users', AdminUsersController::class)->names('admin.users');
        Route::get('admin/{user}/transfer', [AdminUsersController::class, 'transfer'])->name('admin.users.transfer');
        Route::get('admin/{user}/changeRole', [AdminUsersController::class, 'changeRole'])->name('admin.users.changeRole');
        Route::get('admin/{user}/editPassword', [AdminUsersController::class, 'editPassword'])->name('admin.users.editPassword');
        Route::get('admin/{user}/deleteUser', [AdminUsersController::class, 'deleteUser'])->name('admin.users.deleteUser');



        Route::resource('admin/card', AdminCardsController::class)->names('admin.card')->except(['index', 'create', 'show', 'edit']);
        Route::get('admin/card/archive', [AdminCardsController::class, 'archive'])->name('admin.card.archive');
        Route::get('admin/card/{card}/duplicate', [AdminCardsController::class, 'duplicate'])->name('admin.card.duplicate');
        Route::get('admin/card/{card}/restore', [AdminCardsController::class, 'restore'])->name('admin.card.restore');
    });


    Route::resource('card', CardController::class)->except(['index', 'create', 'show', 'edit']);
    Route::get('card/archive', [CardController::class, 'archive'])->name('card.archive');
    Route::post('{card}/duplicate', [CardController::class, 'duplicate'])->name('card.duplicate');
    Route::get('card/{card}/restore', [CardController::class, 'restore'])->name('card.restore');
    Route::get('card/{card}/editLink', [CardController::class, 'editLink']);
});
Route::get('Privacy_Policy',function(){
    return view('Privacy_Policy');
})->name('Privacy_Policy');
Route::get('term_of_use',function(){
    return view('term_of_use');
})->name('term_of_use');
});

Route::get('/{card}', [RedirectController::class, 'show']);
