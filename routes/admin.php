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
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Admin\ProductVariantAttributeController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\ReviewImageController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\WishlistController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\AddressController;
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
    // Users & Admins
    Route::resource('admins', AdminController::class);
    Route::resource('users', UserController::class);

    // Products
    Route::resource('products', ProductController::class);
    Route::resource('product_variants', ProductVariantController::class)->names('variants');
    Route::resource('product_variant_attributes', ProductVariantAttributeController::class)->names('variant_attributes');
    Route::resource('product_images', ProductImageController::class);

    // Categories
    Route::resource('categories', CategoryController::class);
    Route::resource('sub_categories', SubCategoryController::class);
    Route::resource('sub_category_items', SubCategoryItemController::class);

    // Orders
    Route::resource('orders', OrderController::class);

    // Content
    Route::resource('blogs', BlogController::class);
    Route::resource('pages', PageController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('settings', SettingController::class);

    // Reviews
    Route::resource('reviews', ReviewController::class);
    Route::resource('review_images', ReviewImageController::class);

    // Vendors, Wishlists, Payments
    Route::resource('vendors', VendorController::class);
    Route::resource('wishlists', WishlistController::class);
    Route::resource('payment_methods', PaymentMethodController::class);

    // Locations
    Route::resource('countries', CountryController::class);
    Route::resource('states', StateController::class);
    Route::resource('cities', CityController::class);
    Route::resource('addresses', AddressController::class);
});
