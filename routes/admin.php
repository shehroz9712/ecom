<?php


use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VariantController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubCategoryItemController;
use App\Models\SubCategory;
use App\Models\SubCategoryItem;
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

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('categories/{id}/sub-categories', [SubCategoryController::class, 'getSubCategories'])->name('getSubCategories');
Route::get('sub-categories/{id}/items', [SubCategoryItemController::class, 'getSubCategoryItems'])->name('getSubCategoryItems');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', action: [HomeController::class, 'index'])->name('dashboard');

    Route::resource('admins', AdminController::class);
    Route::resource('variants', VariantController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('products', ProductController::class);

    Route::resource('settings', SettingController::class);

    Route::resource('users', UserController::class);

    Route::resource('variants', VariantController::class);
});
