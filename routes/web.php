<?php

use App\Http\Controllers\PackageController;
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
    return view('welcome');
});
Route::resource('packages',PackageController::class);
Route::post("packages",[PackageController::class,"store"]);
Route::put("packages/{id}",[PackageController::class,"update"]);
Route::get("packages/{id}",[PackageController::class,"show"]);
Route::delete("packages/{id}",[PackageController::class,"destroy"]);
Route::get("packages/restore/{id}",[PackageController::class,"restore"]);
Route::get("packages/trashed",[PackageController::class,"valueTrash"]);