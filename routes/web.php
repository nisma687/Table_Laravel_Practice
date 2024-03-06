<?php

use App\Http\Controllers\PackageController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::resource('packages',PackageController::class);



// Route::post("packages",[PackageController::class,""]);
// Route::put("packages/{id}",[PackageController::class,"update"]);
// Route::get("packages/{id}",[PackageController::class,"show"]);
// Route::delete("packages/{id}",[PackageController::class,"destroy"]);
Route::get("packages/restore/{id}",[PackageController::class,"restore"]);
Route::get("packages/trashed",[PackageController::class,"valueTrash"]);
Route::post("packages/store_update",[PackageController::class,"CreateOrUpdate"]);
// Route::put("packages/store_update/{id}",[PackageController::class,"storeAndUpdate"]);
Route::delete("packages/store_delete/{id}",[PackageController::class,"DeleteOrRestore"]);