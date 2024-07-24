<?php

use Illuminate\Support\Facades\Route;
// Router Trang user 
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\Auth\LoginController;
use App\Http\Controllers\Home\Auth\RegisterController;
use App\Http\Controllers\Home\Auth\ResetPassController;
use App\Http\Controllers\Home\Account\CategoryHomeController;
use App\Http\Controllers\Home\Account\DetailAccontController;
use App\Http\Controllers\Home\User\PurchaseHistoryUser;
use App\Http\Controllers\Home\User\RechargeHistory;
use App\Http\Controllers\Home\User\RechargeMoney;
use App\Http\Controllers\Home\Auth\ForgetPassController;
// Router Trang admin 
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CharacterController;
use App\Http\Controllers\Admin\WeaponController;
use App\Http\Controllers\Admin\RechargeHistoryController;
use App\Http\Controllers\Admin\AccountController;
// middleware lọc người dùng
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\AuthenUser;

//router trang chủ 
Route::get('', [HomeController::class, 'index'])->name('home.index');
// router nạp lịch sử mua
Route::middleware(AuthenUser::class)->prefix('/user')->group(function () {
    Route::get('purchase-history/{id}', [PurchaseHistoryUser::class, 'index'])->name('purchaseHistory.index');
    Route::get('recharge-history/{id}', [RechargeHistory::class, 'index'])->name('rechargeHistories');
    Route::get('recharge-money/{id}', [RechargeMoney::class, 'index'])->name('rechargeMoney.index');
    Route::post('recharge-money/{id}', [RechargeMoney::class, 'RechargeVnPay'])->name('payAuth');
    Route::get('/vnpay-return',  [RechargeMoney::class, 'handleVnpayReturn'])->name('vnpay.return');
    Route::post('payment-momo', [RechargeMoney::class, 'RechargeMomo'])->name('momoPay');
    Route::get('/momo-return',  [RechargeMoney::class, 'handleMomoReturn'])->name('momo.return');
});

// router loại tài khoản
Route::prefix('/category')->group(function () {
    Route::get('/{id}', [CategoryHomeController::class, 'Index'])->name('categoryHome.index');
    Route::get('/search', [CategoryHomeController::class, 'search'])->name('search');
    Route::get('detail-acc/acc-vip-{id}', [DetailAccontController::class, 'index'])->name('detailAccount.index');
    Route::post('detail-acc/acc-vip-/{id}', [DetailAccontController::class, 'purchase'])->name('buyAcc.purchase');
});


// router trang đăng nhập
Route::prefix('/login')->group(function () {
    Route::get('', [LoginController::class, 'index'])->name('login.index');
    Route::post('login', [LoginController::class, 'login'])->name('login.dologin');
});

// router trang đăng ký
Route::prefix('/register')->group(function () {
    Route::get('', [RegisterController::class, 'index'])->name('register.index');
    Route::post('register', [RegisterController::class, 'register'])->name('register.doregister');
});

// router trang đăng xuất
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

//route trang quên mật khẩu
Route::prefix('/forget-pass')->group(function () {
    Route::get('', [ForgetPassController::class, 'index'])->name('forgetPass.index');
    Route::post('', [ForgetPassController::class, 'forgetPass'])->name('forgetPass.doForgetPass');
});

//route trang đổi mật khẩu
Route::middleware(AuthenUser::class)->prefix('/reset-pass')->group(function () {
    Route::get('/{id}', [ResetPassController::class, 'index'])->name('resetPass.index');
    Route::post('/{id}', [ResetPassController::class, 'resetPass'])->name('resetPass.doResetPass');
});

// router các trang quản trị
Route::middleware(AuthenticateMiddleware::class)->prefix('/admin')->group(function () {
    // Quản lý tài khoản người dùng
    Route::prefix('/user')->group(function () {
        //trang danh sách tài khoản
        Route::get('', [UsersController::class, 'index'])->name('dashboad.index');
        // trang hiển thị sửa tài khoản
        Route::get('update/{id}', [UsersController::class, 'edit'])->name('detail.index');
        // gửi thông tin sửa tài khoản
        Route::post('update/{id}', [UsersController::class, 'doEdit'])->name('users.update');
        // xóa tài khoản  
        Route::get('delete/{id}', [UsersController::class, 'deleteUsers'])->name('delete');
    });

    // quản lý loại tài khoản game 
    Route::prefix('/category')->group(function () {
        // trang hiển thị các loại tài khoản
        Route::get('', [CategoryController::class, 'index'])->name('category.index');
        // trang hiển thị thêm mới các loại tài khoản
        Route::get('add-new', [CategoryController::class, 'indexAdd'])->name('addcategory.index');
        // gửi thông tin tạo loại loại tài khoản
        Route::post('add-new', [CategoryController::class, 'addCatagory'])->name('addcategory.doCate');
        // trang hiển thị sửa loại sản phẩm
        Route::get('update/{id}', [CategoryController::class, 'indexUpdate'])->name('updateCate.index');
        // gửi thông tin sửa loại loại tài khoản
        Route::post('update/{id}', [CategoryController::class, 'updateCategory'])->name('updateCate.doCate');
        // xóa loại tài khoản  
        Route::get('delete/{id}', [CategoryController::class, 'deleteCategory'])->name('category.delete');
    });

    // quản lý nhân vật game 
    Route::prefix('/character')->group(function () {
        // trang hiển thị các nhân vật 
        Route::get('', [CharacterController::class, 'Index'])->name('char.index');
        // trang hiển thị thêm mới nhân vật
        Route::get('add-new', [CharacterController::class, 'IndexAddChar'])->name('addChar.index');
        // gửi thông tin tạo thêm mới nhân vật 
        Route::post('add-new', [CharacterController::class, 'AddNewChar'])->name('char.create');
        // trang hiển thị sửa loại sản phẩm
        Route::get('update/{id}', [CharacterController::class, 'IndexUpdate'])->name('charUpdate.index');
        // gửi thông tin sửa loại loại tài khoản
        Route::post('update/{id}', [CharacterController::class, 'UpdateCharacter'])->name('char.update');
        // xóa nhân vật
        Route::get('delete/{id}', [CharacterController::class, 'DeleteCharacter'])->name('char.delete');
    });

    // quản lý vũ khí game 
    Route::prefix('/weapon')->group(function () {
        // trang hiển thị các vũ khí 
        Route::get('', [WeaponController::class, 'Index'])->name('weapon.index');
        // trang hiển thị thêm mới vũ khí
        Route::get('add-new', [WeaponController::class, 'IndexAddWeapon'])->name('addWeap.index');
        // gửi thông tin tạo thêm mới vũ khí 
        Route::post('add-new', [WeaponController::class, 'AddNewWeapon'])->name('weapon.create');
        // trang hiển thị sửa thông tin vũ khí
        Route::get('update/{id}', [WeaponController::class, 'IndexUpdateWeapon'])->name('weaponUpdate.index');
        // gửi thông tin sửa thông tin vũ khí
        Route::post('update/{id}', [WeaponController::class, 'UpdateWeapon'])->name('weapon.update');
        // xóa vũ khí
        Route::get('delete/{id}', [WeaponController::class, 'DeleteWeapon'])->name('weapon.delete');
    });

    // quản lý lịch sử nạp 
    Route::prefix('/recharge')->group(function () {
        // trang hiển thị các lịch sử nạp 
        Route::get('', [RechargeHistoryController::class, 'Index'])->name('recharge.index');
        // trang hiển thị thêm mới lịch sử nạp
        Route::get('add-new', [RechargeHistoryController::class, 'IndexAddRecharge'])->name('addrecharge.index');
        // gửi thông tin tạo thêm mới lịch sử nạp 
        Route::post('add-new', [RechargeHistoryController::class, 'AddNewRecharge'])->name('recharge.create');
        // trang hiển thị sửa thông tin lịch sử nạp
        Route::get('update/{id}', [RechargeHistoryController::class, 'IndexUpdateRecharge'])->name('rechargeUpdate.index');
        // gửi thông tin sửa thông tin lịch sử nạp
        Route::post('update/{id}', [RechargeHistoryController::class, 'UpdateRecharge'])->name('recharge.update');
        // xóa lịch sử nạp
        Route::get('delete/{id}', [RechargeHistoryController::class, 'DeleteRecharge'])->name('recharge.delete');
    });

    // quản lý lịch tài khoản game 
    Route::prefix('/account')->group(function () {
        // trang hiển thị các lịch sử nạp 
        Route::get('', [AccountController::class, 'Index'])->name('account.index');
        // trang hiển thị thêm mới lịch sử nạp
        Route::get('add-new', [AccountController::class, 'IndexAddAccount'])->name('addAccount.index');
        // gửi thông tin tạo thêm mới lịch sử nạp 
        Route::post('add-new', [AccountController::class, 'AddNewAccount'])->name('account.create');
        // trang hiển thị sửa thông tin lịch sử nạp
        Route::get('update/{id}', [AccountController::class, 'IndexUpdateAccount'])->name('accountUpdate.index');
        // gửi thông tin sửa thông tin lịch sử nạp
        Route::post('update/{id}', [AccountController::class, 'UpdateAccount'])->name('account.update');
        // xóa lịch sử nạp
        Route::get('delete/{id}', [AccountController::class, 'DeleteAccount'])->name('account.delete');
    });
});
