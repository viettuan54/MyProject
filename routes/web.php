<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DongxeController;
use App\Http\Controllers\KhamphaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserOrderController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\UserChatController;


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

// Dangki, Dangnhap
Route::get('/dangki', fn() => view('Login.Dangki'));
Route::post('/dangki', [AuthController::class, 'register']);
Route::get('/dangnhap', fn() => view('Login.Dangnhap'));
Route::post('/dangnhap', [AuthController::class, 'login']);
Route::post('/dangxuat', [AuthController::class, 'logout']);
Route::middleware(['auth'])->group(function () {
    Route::get('/ttuser', [AuthController::class, 'index'])
        ->name('user.profile');
    Route::post('/ttuser', [AuthController::class, 'update'])
        ->name('user.profile.update');

});
Route::get('/admin/verify-face', [AuthController::class, 'showVerifyFace'])
    ->name('admin.face.verify');

Route::post('/admin/verify-face', [AuthController::class, 'verifyFace'])
    ->name('admin.face.verify.post');


//ADMIN 
// Trang chu 
Route::get('/admin_dashboard', [AdminDashboardController::class, 'index']);

// Product routes
Route::get('/admin_product', [ProductController::class, 'index'])->name('admin.product');
Route::get('/admin_product/add', [ProductController::class, 'create'])->name('products.create');
Route::post('/admin_product/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/admin_product/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/admin_product/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/admin_product/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/admin_product/{id}/view', [ProductController::class, 'view'])->name('products.view');
Route::get('/api/search', [ProductController::class, 'search'])->name('product.search');
Route::get('/tim-kiem', [ProductController::class, 'searchPage'])->name('product.search.page');
Route::get('/admin_dmuc', function () {
    return view('Admin/Dmuc');
});
// admin Category routes
Route::get('/admin_Dmucadd', [CategoryController::class, 'index'])
    ->name('admin.Dmucadd');
Route::post('/admin_Dmucadd/store', [CategoryController::class, 'store'])
    ->name('admin.category.store');
Route::get('/admin_dmuc', [CategoryController::class, 'list'])
    ->name('admin.categories');
    // xem sản phẩm theo danh mục
Route::get('/admin_dmuc/{category}/sanpham',
    [CategoryController::class, 'showProducts']
)->name('admin.dmuc.products');
// sửa danh mục
Route::get('/admin_dmuc/{id}/edit', [CategoryController::class, 'edit'])
    ->name('admin.category.edit');
Route::put('/admin_dmuc/{id}', [CategoryController::class, 'update'])
    ->name('admin.category.update');
// xóa danh mục
Route::delete('/admin_dmuc/{id}', [CategoryController::class, 'destroy'])
    ->name('admin.category.destroy');
 
// Admin Order routes
Route::get('/admin_dhang', [AdminOrderController::class, 'index'])
    ->name('admin.Dhang');
Route::delete('/admin/order/delete/{id}', [AdminOrderController::class, 'destroy']);
Route::get('/admin/order/{id}', [AdminOrderController::class, 'show']);
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
// adminemail 
Route::post('/admin/order/{id}/approve', [AdminOrderController::class, 'approve']);
Route::post('/admin/order/{id}/reject', [AdminOrderController::class, 'reject']);
//Quan lý user
Route::middleware(['auth'])->group(function () {
    Route::get('/admin_Qlnd', [AdminController::class, 'index']);
});


// USER
// Trang chu
Route::get('/', function () {
    return view('User/Trangchu');
});

// dong xe
Route::get('/dongxe', [DongxeController::class, 'dongxe']);
Route::get('/dongxe718', [DongxeController::class, 'dongxe718']);
Route::get('/dongxe911', [DongxeController::class, 'dongxe911']);
Route::get('/dongxetaycan', [DongxeController::class, 'dongxetaycan']);
Route::get('/dongxepana', [DongxeController::class, 'dongxepana']);
Route::get('/dongxemacan', [DongxeController::class, 'dongxemacan']);
Route::get('/dongxecayne', [DongxeController::class, 'dongxecayne']);

//718
Route::get('/718-boxster', [KhamphaController::class, 'kp718_1']);
Route::get('/718-boxster-s', [KhamphaController::class, 'kp718_2']);
Route::get('/718-cayman', [KhamphaController::class, 'kp718_3']);
Route::get('/718-cayman-s', [KhamphaController::class, 'kp718_4']);
Route::get('/718-cayman-style-edition', [KhamphaController::class, 'kp718_5']);
Route::get('/718-boxster-style-edition', [KhamphaController::class, 'kp718_6']);

//911
Route::get('/911-carrera', [KhamphaController::class, 'kp911_1']);
Route::get('/911-carrera-t', [KhamphaController::class, 'kp911_2']);
Route::get('/911-carrera-s', [KhamphaController::class, 'kp911_3']);
Route::get('/911-carrera-gts', [KhamphaController::class, 'kp911_4']);
Route::get('/911-carrera-4-gts', [KhamphaController::class, 'kp911_5']);
Route::get('/911-carrera-s-cabriolet', [KhamphaController::class, 'kp911_6']);
Route::get('/911-carrera-cabriolet', [KhamphaController::class, 'kp911_7']);
Route::get('/911-carrera-t-cabriolet', [KhamphaController::class, 'kp911_8']);
Route::get('/911-carrera-gts-cabriolet', [KhamphaController::class, 'kp911_9']);
Route::get('/911-carrera-4-gts-cabriolet', [KhamphaController::class, 'kp911_10']);

//taycan
Route::get('/taycan', [KhamphaController::class, 'kptaycan_1']);
Route::get('/taycan-4', [KhamphaController::class, 'kptaycan_2']);
Route::get('/taycan-4s', [KhamphaController::class, 'kptaycan_3']);
Route::get('/taycan-gts', [KhamphaController::class, 'kptaycan_4']);
Route::get('/taycan-turbo', [KhamphaController::class, 'kptaycan_5']);
Route::get('/taycan-turbo-s', [KhamphaController::class, 'kptaycan_6']);
Route::get('/taycan-turbo-gt', [KhamphaController::class, 'kptaycan_7']);
Route::get('/taycan-4-cross-turismo', [KhamphaController::class, 'kptaycan_8']);
Route::get('/taycan-4s-cross-turismo', [KhamphaController::class, 'kptaycan_9']);
Route::get('/taycan-turbo-cross-turismo', [KhamphaController::class, 'kptaycan_10']);

//panamera
Route::get('/panamera-mi', [KhamphaController::class, 'kppana_1']);
Route::get('/panamera', [KhamphaController::class, 'kppana_2']);

// macan
Route::get('/macan', [KhamphaController::class, 'kpmacan_1']);
Route::get('/macan-t', [KhamphaController::class, 'kpmacan_2']);
Route::get('/macan-s', [KhamphaController::class, 'kpmacan_3']);
Route::get('/macan-gts', [KhamphaController::class, 'kpmacan_4']);
Route::get('/macan-thun-in', [KhamphaController::class, 'kpmacan_5']);
Route::get('/macan-4-thun-in', [KhamphaController::class, 'kpmacan_6']);
Route::get('/macan-4s-thun-in', [KhamphaController::class, 'kpmacan_7']);
Route::get('/macan-turbo-thun-in', [KhamphaController::class, 'kpmacan_8']);

//ce
Route::get('/cayenne', [KhamphaController::class, 'kpcayne_1']);
Route::get('/cayenne-s', [KhamphaController::class, 'kpcayne_2']);
Route::get('/cayenne-gts', [KhamphaController::class, 'kpcayne_3']);
Route::get('/cayenne-coup', [KhamphaController::class, 'kpcayne_4']);
Route::get('/cayenne-s-coup', [KhamphaController::class, 'kpcayne_5']);
Route::get('/cayenne-gts-coup', [KhamphaController::class, 'kpcayne_6']);
Route::get('/cayenne-turbo-gt', [KhamphaController::class, 'kpcayne_7']);

// Dich vu
Route::get('/dichvu', function () {
    return view('User.Dichvu.Dichvu');
});
Route::get('/dichvubh', function () {
    return view('User.Dichvu.Dichvubh');
});
Route::get('/dichvubst', function () {
    return view('User.Dichvu.Dichvubst');
});
Route::get('/dichvuctkm', function () {
    return view('User.Dichvu.Dichvuctkm');
});
Route::get('/dichvuhm', function () {
    return view('User.Dichvu.Dichvuhm');
});
Route::get('/dichvupk', function () {
    return view('User.Dichvu.Dichvupk');
});

// Store 
Route::get('/store', function () {
    return view('User.Store.Vestore');
});
Route::get('/cohoivl', function () {
    return view('User.Store.Cohoivl');
});
Route::get('/tintuc', function () {
    return view('User.Store.TintucSK');
});
Route::get('/thongtin', function () {
    return view('User.Store.Thongtinbc');
});
Route::get('/storevn', function () {
    return view('User.Store.StoreVietNam');
});
Route::get('/storeag', function () {
    return view('User.Store.StoreAG');
});

//Trung tam
Route::get('/trungtam', function () {
    return view('User.Trungtam.Trungtam');
});
Route::get('/trungtamhn', function () {
    return view('User.Trungtam.TrungtamHN');
});
Route::get('/trungtamsg', function () {
    return view('User.Trungtam.TrungtamSG');
});
Route::get('/trungtamstudio', function () {
    return view('User.Trungtam.Trungtamstudio');
});

// Xemoi
Route::get('/xemoi', function () {
    return view('User/Xemoi');
});

//Tieu diem
Route::get('/tieudiem', function () {
    return view('User/Tieudiem');
});

Route::middleware(['auth'])->group(function () {
    // Kênh trò chuyện giữa người dùng
    Route::get('/kenh-tro-truyen', [UserChatController::class, 'index'])
        ->name('user.chat.index');
    Route::get('/kenh-tro-truyen/messages', [UserChatController::class, 'stream'])
        ->name('user.chat.stream');
    Route::post('/kenh-tro-truyen/messages', [UserChatController::class, 'send'])
        ->name('user.chat.send');
    Route::delete('/kenh-tro-truyen/messages/{message}', [UserChatController::class, 'deleteMessage'])
        ->name('user.chat.delete');
    Route::delete('/kenh-tro-truyen/messages', [UserChatController::class, 'deleteAllMessages'])
        ->name('user.chat.deleteAll');
});

// Gio hang

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('cart/remove/{id}', [CartController::class, 'remove'])
    ->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

Route::post('/checkout', [CheckoutController::class, 'store'])
    ->name('checkout.store');
Route::middleware('auth')->group(function () {
    Route::get('/history', [UserOrderController::class, 'index'])
        ->name('user.history');

    Route::get('/history/{id}', [UserOrderController::class, 'show'])
        ->name('user.history.show');

    Route::post('/products/{product}/reviews', [ProductReviewController::class, 'store'])
        ->name('products.reviews.store');
});
