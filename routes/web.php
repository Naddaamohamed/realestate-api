<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyImageController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarImageController;
use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactInfoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    // =========================
    // Profile
    // =========================

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


        // =========================
// Contact Information
// =========================

Route::get(
    '/contact-information',
    [ContactInfoController::class, 'edit']
)->name('contact-info.edit');

Route::patch(
    '/contact-information',
    [ContactInfoController::class, 'update']
)->name('contact-info.update');

    // =========================
    // Properties
    // =========================

    Route::resource('properties', PropertyController::class);


    // =========================
    // Property Images
    // =========================

    // Add images to a property
    Route::post(
        '/properties/{property}/images',
        [PropertyImageController::class, 'store']
    )->name('property-images.store');

    // Delete a property image
    Route::delete(
        '/property-images/{propertyImage}',
        [PropertyImageController::class, 'destroy']
    )->name('property-images.destroy');


    // =========================
    // Cars
    // =========================

    Route::resource('cars', CarController::class);


    // =========================
    // Car Images
    // =========================

    // Add images to a car
    Route::post(
        '/cars/{car}/images',
        [CarImageController::class, 'store']
    )->name('car-images.store');

    // Delete a car image
    Route::delete(
        '/car-images/{carImage}',
        [CarImageController::class, 'destroy']
    )->name('car-images.destroy');


    // =========================
    // Favorites
    // =========================

    // Display user's favorites
Route::get(
    '/favorites',
    [FavoriteController::class, 'index']
)->name('favorites.index');

    // Add to favorites
    Route::post(
        '/favorites',
        [FavoriteController::class, 'store']
    )->name('favorites.store');

    // Remove from favorites
    Route::delete(
        '/favorites',
        [FavoriteController::class, 'destroy']
    )->name('favorites.destroy');

});


require __DIR__.'/auth.php';