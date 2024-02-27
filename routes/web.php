<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('packages', [HomeController::class, 'packages'])->name('packages');
Route::get('package/add', [HomeController::class, 'addPackage'])->name('add.package');
Route::post('package/insert', [HomeController::class, 'insertPackage'])->name('insert.package');
Route::get('package/edit/{id}', [HomeController::class, 'editPackage'])->name('edit.package');
Route::post('package/update/{id}', [HomeController::class, 'updatePackage'])->name('update.package');
Route::delete('/delete/package/{id}', [HomeController::class, 'deletePackage'])->name('delete.package');


Route::get('facility', [HomeController::class, 'facilityIndex'])->name('facility.index');
Route::get('add-facility', [HomeController::class, 'addFacility'])->name('add.facility');
Route::post('add-facility', [HomeController::class, 'storeFacility'])->name('insert.facility');
Route::get('edit-facility/{id}', [HomeController::class, 'editFacility'])->name('edit.facility');
Route::post('update-facility/{id}', [HomeController::class, 'updateFacility'])->name('update.facility');
Route::delete('/delete/facility/{id}', [HomeController::class, 'deleteFacility'])->name('delete.facility');


Route::get('service', [HomeController::class, 'serviceIndex'])->name('service.index');
Route::get('add-service', [HomeController::class, 'addService'])->name('add.service');
Route::post('add-service', [HomeController::class, 'storeService'])->name('insert.service');
Route::get('edit-service/{id}', [HomeController::class, 'editService'])->name('edit.service');
Route::post('update-service/{id}', [HomeController::class, 'updateService'])->name('update.service');
Route::delete('/delete/service/{id}', [HomeController::class, 'deleteService'])->name('delete.service');


Route::get('/', [WebController::class, 'index'])->name('website');
Route::get('/package-detail/{id}', [WebController::class, 'packageDetails'])->name('packages.showDetails');
Route::post('form-submit',[WebController::class, 'contactForm'])->name('form.submit');


Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

