<?php


use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CreditTransactionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ToursAndTransferController;
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

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', action: [HomeController::class, 'index'])->name('dashboard');

    Route::resource('tours', ToursAndTransferController::class);
    Route::resource('bookings', BookingController::class);
    Route::resource('agents', AgentController::class);
    Route::resource('admins', AdminController::class);

    Route::get('transactions/index', [CreditTransactionController::class, 'index'])->name('transactions.index');
    Route::get('transactions/approve/{id}', [CreditTransactionController::class, 'approved'])->name('transactions.approved');
});
