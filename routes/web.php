<?php

use App\Http\Controllers\FlatformController;
use Illuminate\Support\Facades\Route;

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
Route::get('/policy', function () {
    return '.';
});
Route::prefix('auth')->group(function () {
    Route::get('/{flatform}', [FlatformController::class, 'generateUrl'])->name('generateUrl');

    Route::any('{flatform}/handle', [FlatformController::class, 'auth']);
});
