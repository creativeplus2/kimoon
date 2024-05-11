<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    UserController,
    ProfileController,
    RoleAndPermissionController,
};
use App\Http\Controllers\LocalizationController;

//route switch bahasa
Route::get('/localization/{language}', [LocalizationController::class, 'switch'])->name('localization.switch');

Route::prefix('panel')->group(function () {
    Route::middleware(['auth', 'web'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', ProfileController::class)->name('profile');
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleAndPermissionController::class);
        Route::resource('setting-apps', App\Http\Controllers\SettingAppController::class);
    });
    Route::get('/dashboard', function () {
        return redirect()->route('dashboard');
    });
    Route::resource('banks', App\Http\Controllers\BankController::class)->middleware('auth');
    Route::resource('account-banks', App\Http\Controllers\AccountBankController::class)->middleware('auth');
    Route::resource('product-categories', App\Http\Controllers\ProductCategoryController::class)->middleware('auth');
    Route::resource('product-categories', App\Http\Controllers\ProductCategoryController::class)->middleware('auth');
    Route::resource('product-units', App\Http\Controllers\ProductUnitController::class)->middleware('auth');
    Route::resource('sub-categories', App\Http\Controllers\SubCategoryController::class)->middleware('auth');
    Route::resource('products', App\Http\Controllers\ProductController::class)->middleware('auth');
    Route::resource('provinces', App\Http\Controllers\ProvinceController::class)->middleware('auth');
    Route::resource('kabkots', App\Http\Controllers\KabkotController::class)->middleware('auth');
    Route::resource('kecamatans', App\Http\Controllers\KecamatanController::class)->middleware('auth');
    Route::resource('kelurahans', App\Http\Controllers\KelurahanController::class)->middleware('auth');
    Route::resource('members', App\Http\Controllers\MemberController::class)->middleware('auth');
    Route::post('/coverDistributor', [App\Http\Controllers\MemberController::class, 'coverDistributor'])->name('coverDistributor');
    Route::delete('/deleteCoverArea/{id}', [App\Http\Controllers\MemberController::class, 'deleteCoverArea'])->name('deleteCoverArea');
    Route::get('/GetGambarProduk/{id}', [App\Http\Controllers\ProductController::class, 'GetGambarProduk']);
    Route::get('kota/{provinsiId}', [App\Http\Controllers\WilayahController::class, 'kota'])->name('api.kota');
    Route::get('kecamatan/{kotaId}', [App\Http\Controllers\WilayahController::class, 'kecamatan'])->name('api.kecamatan');
    Route::get('kelurahan/{kecamatanId}', [App\Http\Controllers\WilayahController::class, 'kelurahan'])->name('api.kelurahan');
    Route::get('zipcode/{kelurahanId}', [App\Http\Controllers\WilayahController::class, 'zipcode'])->name('api.zipcode');
});
