<?php

use App\Http\Controllers\{
    DashboardController,
    UserController,
    ProfileController,
    RoleAndPermissionController,
};
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\XenditController;
use App\Http\Controllers\LocalizationController;

use App\Http\Controllers\FrontEnd\AuthController;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\FrontEnd\News2Controller;

use App\Http\Controllers\FrontEnd\ProdukController;

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
    Route::resource('news', App\Http\Controllers\NewsController::class)->middleware('auth');
    Route::resource('page', App\Http\Controllers\PageController::class)->middleware('auth');

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
    Route::delete('/member/{id}', [App\Http\Controllers\MemberController::class, 'destroyParentMember'])->name('delete.member');
    Route::post('/memberParent', [App\Http\Controllers\MemberController::class, 'memberParent'])->name('memberParent');
    Route::post('/coverDistributor', [App\Http\Controllers\MemberController::class, 'coverDistributor'])->name('coverDistributor');
    Route::delete('/deleteCoverArea/{id}', [App\Http\Controllers\MemberController::class, 'deleteCoverArea'])->name('deleteCoverArea');
    Route::get('/GetGambarProduk/{id}', [App\Http\Controllers\ProductController::class, 'GetGambarProduk']);
    Route::get('kota/{provinsiId}', [App\Http\Controllers\WilayahController::class, 'kota'])->name('api.kota');
    Route::get('kecamatan/{kotaId}', [App\Http\Controllers\WilayahController::class, 'kecamatan'])->name('api.kecamatan');
    Route::get('kelurahan/{kecamatanId}', [App\Http\Controllers\WilayahController::class, 'kelurahan'])->name('api.kelurahan');
    Route::get('zipcode/{kelurahanId}', [App\Http\Controllers\WilayahController::class, 'zipcode'])->name('api.zipcode');

});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
// Route FrontEnd
Route::get('/produk', [ProdukController::class, 'index'])->name('web.produk');
Route::get('/produk/{id}', [ProdukController::class, 'detail'])->name('web.produk_detail');
Route::get('/register-member', [AuthController::class, 'register'])->name('web.register');
Route::post('/submit-register-member', [AuthController::class, 'submitRegister'])->name('web.submit_register');
Route::post('/submit-login-member', [AuthController::class, 'submitLogin'])->name('web.submit_login');
Route::get('/submit-logout-member', [AuthController::class, 'submitLogout'])->name('web.submit_logout');
Route::get('/profile', [AuthController::class, 'profile'])->name('web.profile');
Route::get('/list-member', [AuthController::class, 'listMember'])->name('web.list_member');
Route::get('/pay', [XenditController::class, 'getPaymentLink']);
Route::get('/', [HomeController::class, 'index'])->name('web.home');

Route::post('/submit-partnership', [HomeController::class, 'submitpartnership'])->name('web.submit_partnership');
Route::get('/news', [News2Controller::class, 'index'])->name('web.news');
Route::get('/news/{slug}', [News2Controller::class, 'detail']);

Route::get('/{slug}', [HomeController::class, 'page']);
