<?php

use App\Http\Controllers\PeopleController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::group([
    'middleware' => 'auth',
], function ($route) {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/people', App\Http\Controllers\PeopleController::class);
    Route::get('/home', [PeopleController::class, "export"])->name('people.export');
    Route::post('import', [PeopleController::class, "import"])->name('people.import');

});
