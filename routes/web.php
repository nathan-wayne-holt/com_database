<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DangerController;

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
    return 'City of Mist searchable database project';
});

Route::get('/danger/view/{id}', function ($id) {
	return 'viewing danger id ' . $id;
});

Route::get('danger/create', [DangerController::class, 'create']);
Route::post('danger/create', [DangerController::class, 'store']);