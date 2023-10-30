<?php


use App\Http\Controllers\ViewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmbassyController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\BkashTokenizePaymentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

#verification route
Route::any('/signup', [ViewController::class, 'signup'])->name('signup');
Route::any('/login', [ViewController::class, 'login'])->name('login');
Route::get('/forget-password', [ViewController::class, 'forgetPassword'])->name('forget-password');
Route::post('/getemail', [Mailcontroller::class,  'getemail'])->name('getemail');
Route::any('send-mail', [Mailcontroller::class, 'index'])->name('send-mail');
Route::get('/check-email', [ViewController::class, 'checkEmail'])->name('checkEmail');
Route::post('/password-reset', [ViewController::class, 'setnewpassword'])->name('password_reset');
#user routes
Route::any('/user/index', [UserController::class, 'index'])->name('user/index');
Route::any('/user/passenger', [UserController::class, 'passenger'])->name('user/passenger');
Route::any('/user/company', [UserController::class, 'company'])->name('user/company');
Route::any('/user/visa_sell', [UserController::class, 'visa_sell'])->name('user/visa_sell');
Route::any('/user/purchase', [UserController::class, 'purchase'])->name('user/purchase');

Route::any('/user/visa', [UserController::class, 'visa'])->name('user/visa');
Route::post('/user/search-order',[UserController::class, 'searchOrder'])->name('search-order');
Route::post('/user/thirdpartypurchase',[UserController::class, 'thirdpartypurchase'])->name('thirdpartypurchase');
Route::post('/user/confirm-order',[UserController::class, 'confirmOrder'])->name('confirm-order');
Route::any('/user/visaadd/{id}', [UserController::class, 'visa_add'])->name('user/visaadd');// Change the Route::any to Route::post to specify that this route handles POST requests
Route::any('/user/personal_edit/{id}', [UserController::class, 'personal_edit'])->name('user/personal_edit');
Route::any('/user/visa_edit/{id}', [UserController::class, 'visa_edit'])->name('user/visa_edit');
Route::any('/user/embassy_list', [UserController::class, 'embassy_list'])->name('user/embassy_list');
Route::any('/user/update', [UserController::class, 'update'])->name('user/update');
Route::any('/user/print/{id}', [UserController::class, 'printer'])->name('user/print');
Route::any('/user/get', [UserController::class, 'get'])->name('getpassport');
Route::get('/check-passport/{passport}', [UserController::class, 'checkPassport']);

Route::get('/load-invoice/{company}', [UserController::class, 'loadinvoice']);
Route::get('/load-passanger/{agent}', [UserController::class, 'loadpassanger']);
Route::get('/load-umra/{agent}', [UserController::class, 'loadumra']);
Route::get('/load-hajj/{agent}', [UserController::class, 'loadhajj']);
Route::get('/load-visa-details/{invoice}', [UserController::class, 'loadvisadetails']);
Route::get('/view/{id}', [UserController::class, 'view'])->name('view');
Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');
Route::any('user/logout', [UserController::class, 'logout'])->name('user/logout');
#admin routes
Route::any('/admin/index', [AdminController::class, 'index'])->name('admin');
Route::any('/ádmin/edit/{id}', [AdminController::class, 'edit'])->name('admin/edit');
Route::any('/ádmin/view/{id}', [AdminController::class, 'view'])->name('admin/view');
Route::any('/ádmin/delete/{id}', [AdminController::class, 'delete'])->name('admin/delete');

#embassy routes
Route::get('/user/embassy/{id}', [EmbassyController::class, 'sendcandidate'])->name('user/embassy');
