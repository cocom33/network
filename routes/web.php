<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\ExploreUserController;
use App\Http\Controllers\ProfileInformationController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\UpdateProfileController;

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

Route::get('/', WelcomeController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('timeline', TimelineController::class)->name('timeline');
    Route::post('status', [StatusController::class, 'store'])->name('status.store');
    Route::get('explore', ExploreUserController::class)->name('explore');

    route::prefix('profile')->group(function () {
        route::get('edit', [UpdateProfileController::class, 'edit'])->name('profile.edit');
        route::put('update', [UpdateProfileController::class, 'update'])->name('profile.update');

        route::get('password/edit', [UpdatePasswordController::class, 'edit'])->name('password.edit');
        route::put('password/edit', [UpdatePasswordController::class, 'update']);

        route::get('{user}/{following}', [FollowingController::class, 'index'])->name('following.index');
        route::post('{user}', [FollowingController::class, 'store'])->name('following.store');
        Route::get('{user}', ProfileInformationController::class)->name('profile');
    });
});

require __DIR__ . '/auth.php';
