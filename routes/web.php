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
            Route::get('/product/index', 'index')->name('product.index');
            Route::get('/product/create', 'create')->name('product.create');
        });
        Route::controller(ProductDiscountController::class)->group(function(){
            Route::get('/discount/index', 'index')->name('discount.index');
            Route::get('/discount/create', 'create')->name('discount.create');
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
            Route::get('/product/index', 'index')->name('vendor.product.index');
            Route::get('/product/create', 'create')->name('vendor.product.create');
            Route::post('/product/store', 'store')->name('vendor.product.store');
            Route::get('/product/edit/{id}', 'edit')->name('vendor.product.edit');
            Route::put('/product/update/{id}', 'update')->name('vendor.product.update');
            Route::delete('/product/delete/{id}', 'destroy')->name('vendor.product.destroy');
        });
        Route::controller(SellerStoreController::class)->group(function(){
            Route::get('/store/index', 'index')->name('vendor.store.index');
            Route::get('/store/create', 'create')->name('vendor.store.create');
            Route::post('/store/store', 'store')->name('vendor.store.store');
            Route::get('/store/edit/{id}', 'edit')->name('vendor.store.edit');
            Route::put('/store/update/{id}', 'update')->name('vendor.store.update');
            Route::delete('/store/delete/{id}', 'destroy')->name('vendor.store.destroy');
        });
    });
});
//customer routes
Route::middleware(['auth', 'verified', 'rolemanager:customer'])->group(function(){
    Route::prefix('user')->group(function(){
        Route::controller(CustomerMainController::class)->group(function(){
            Route::get('/dashboard', 'dashboard')->name('dashboard');
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
