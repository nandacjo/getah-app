<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\GetahController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RouteController;

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

# ------ Unauthenticated routes ------ #
Route::get('/', [AuthenticatedSessionController::class, 'create']);
require __DIR__ . '/auth.php';


# ------ Authenticated routes ------ #
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [RouteController::class, 'dashboard'])->name('home'); # dashboard
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'myProfile'])->name('profile');
        Route::put('/change-ava', [ProfileController::class, 'changeFotoProfile'])->name('change-ava');
        Route::put('/change-profile', [ProfileController::class, 'changeProfile'])->name('change-profile');
    }); # profile group

    Route::resource('users', UserController::class);
    Route::get('/getah-list/print-pdf', [GetahController::class, 'printPDF'])->name('getah-list.print-pdf');
    Route::get('/getah-list/print-excel', [GetahController::class, 'printExcel'])->name('getah-list.print-excel');
    Route::resource('getah-list', GetahController::class);
    Route::resource('location', LocationController::class);
});
