<?php

use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductAttributesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDiscountController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Customer\CustomerMainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Seller\SellerMainController;
use App\Http\Controllers\Seller\SellerProductController;
use App\Http\Controllers\Seller\SellerStoreController;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('welcome');
});
//admin routes
Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::controller(AdminMainController::class)->group(function(){
            Route::get('/dashboard', 'index')->name('admin');
            Route::get('/setting', 'setting')->name('admin.setting');
            Route::get('/manage/users', 'manageUser')->name('admin.manage.user');
            Route::get('/manage/stores', 'manageStore')->name('admin.manage.store');
            Route::get('/cart/history', 'cartHistory')->name('admin.cart.history');
            Route::get('/order/history', 'orderHistory')->name('admin.order.history');
        });
        Route::controller(CategoryController::class)->group(function(){
            Route::get('/category/index', 'index')->name('category.index');
            Route::get('/category/create', 'create')->name('category.create');
            Route::post('/category/store', 'store')->name('category.store');
            Route::get('/category/edit/{id}', 'edit')->name('category.edit');
            Route::put('/category/update/{id}', 'update')->name('category.update');
            Route::delete('/category/delete/{id}', 'destroy')->name('category.destroy');
        });
        Route::controller(SubCategoryController::class)->group(function(){
            Route::get('/sub-category/index', 'index')->name('subcategory.index');
            Route::get('/sub-category/create', 'create')->name('subcategory.create');
            Route::post('/sub-category/store', 'store')->name('subcategory.store');
            Route::get('/sub-category/edit/{id}', 'edit')->name('subcategory.edit');
            Route::put('/sub-category/update/{id}', 'update')->name('subcategory.update');
            Route::delete('/sub-category/delete/{id}', 'destroy')->name('subcategory.destroy');
        });
        Route::controller(ProductAttributesController::class)->group(function(){
            Route::get('/product-attributes/index', 'index')->name('productattributes.index');
            Route::get('/product-attributes/create', 'create')->name('productattributes.create');
            Route::post('/product-attributes/store', 'store')->name('productattributes.store');
            Route::get('/product-attributes/edit/{id}', 'edit')->name('productattributes.edit');
            Route::put('/product-attributes/update/{id}', 'update')->name('productattributes.update');
            Route::delete('/product-attributes/delete/{id}', 'destroy')->name('productattributes.destroy');
        });
        Route::controller(ProductController::class)->group(function(){
            Route::get('/product/create', 'create')->name('product.create');
            Route::get('/product/manage', 'reviewManage')->name('product.manage');
        });
        Route::controller(ProductDiscountController::class)->group(function(){
            Route::get('/discount/create', 'create')->name('discount.create');
            Route::get('/discount/manage', 'manage')->name('discount.manage');
        });
        
        
    });
});
//vendor routes
Route::middleware(['auth', 'verified', 'rolemanager:vendor'])->group(function(){
    Route::prefix('vendor')->group(function(){
        Route::controller(SellerMainController::class)->group(function(){
            Route::get('/dashboard', 'index')->name('vendor');
            Route::get('/order/history', 'orderHistory')->name('vendor.order.history');
        });
        Route::controller(SellerProductController::class)->group(function(){
            Route::get('/product/store', 'create')->name('vendor.product.create');
            Route::get('/product/manage', 'manage')->name('vendor.product.manage');
        });
        Route::controller(SellerStoreController::class)->group(function(){
            Route::get('/store/create', 'create')->name('vendor.store.create');
            Route::get('/store/manage', 'manage')->name('vendor.store.manage');
        });
    });
});
//customer routes
Route::middleware(['auth', 'verified', 'rolemanager:customer'])->group(function(){
    Route::prefix('user')->group(function(){
        Route::controller(CustomerMainController::class)->group(function(){
            Route::get('/dashboard', 'index')->name('dashboard');
            Route::get('/profile', 'profile')->name('customer.profile');
            Route::get('/history', 'history')->name('customer.history');
            Route::get('/affiliate', 'affiliate')->name('customer.affiliate');
            Route::get('/settings/payment', 'payment')->name('customer.payment');
        });
        
    });
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
