<?php

use Illuminate\Support\Facades\Route;

// admin route
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\StoreRoomController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubSubCategoryController;
use App\Http\Controllers\Admin\ProductController;


// fontEnd route
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\FontEnd\FontEntController;


Auth::routes();



Route::group(['prefix' => 'admin', 'middleware'=> ['admin', 'auth'] ], function() {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin-profile', [AdminController::class, 'adminProfileShow'])->name('admin.profile');
    Route::get('/adminNameShow/{id}', [AdminController::class, 'adminNameShow'])->name('admin.NameShow');
    Route::post('/adminNameStore/{id}', [AdminController::class, 'adminNameStore'])->name('adminNameUpdate-store');
    // admin email update route
    Route::get('/adminEmailShow/{id}', [AdminController::class, 'adminEmailShow'])->name('adminEmailShow');
    Route::post('/adminEmail/store/{id}', [AdminController::class, 'adminEmailStore'])->name('adminEmailUpdate-store');
    // admin update password route
    Route::get('/adminPasswordShow', [AdminController::class, 'showPasswordUpdatePage'])->name('admin.passwordShow');
    Route::post('/password/store', [AdminController::class, 'adminPasswordStore'])->name('updatePassword-store');
    Route::post('/photoUpload', [UserController::class, 'photoUpload'])->name('file.Upload');

    // ==================== brand router ==================================
    Route::resource('brands', BrandController::class);
    // ==================== brand router ==================================


    // =================== Store Room All route ===================================
    Route::get('/store/room/', [StoreRoomController::class, 'StoreRoomView'])->name('brand.storeRoom');
    Route::get('/brand/permanentDelete/{id}', [StoreRoomController::class, 'brandPermanentDelete']);
    Route::get('/brand/restore/{id}', [StoreRoomController::class, 'brandRestore'])->name('brand.restore');
    // multiple image store
    Route::get('multipleImage/storeRoom', [StoreRoomController::class, 'StoreRoomController'])->name('products.storeroom');
    Route::get('multipleImage/permanentDelete/{id}', [StoreRoomController::class, 'multipleImagePermanenetDelete'])->name('multipleImage.premanentDelete');
    Route::get('multipleImage/restore/{id}', [StoreRoomController::class, 'multipleImageRestore'])->name('multiImage.restore');
    // product store
    Route::get('Product/restore/view', [StoreRoomController::class, 'ProductRestoreView'])->name('ProductView');
     Route::get('Product/restore/{id}', [StoreRoomController::class, 'ProductRestore'])->name('product.restore');
    Route::get('Product/permanentDelete/{id}', [StoreRoomController::class, 'ProductImagePermanentDelete'])->name('product.permanentDelete');
    // =================== Store Room All route ===================================

    // =========================== Category routes =======================
    Route::resource('category', CategoryController::class);
    // =================== subCategory ============================
    Route::resource('subCategory', SubCategoryController::class);
    // ====================== sub subcategory ========================
    Route::resource('SubSubCategory', SubSubCategoryController::class);
    Route::get('subsubcategory/ajax/{cat_id}', [SubSubCategoryController::class, 'SubSubCategoryAjaxShow']);
    // ====================== product route ============================
    Route::resource('products', ProductController::class);
    // ajax data change products route
    Route::get('products/changeProduct/ajax/{id}', [ProductController::class, 'subCategoryIdGetByAjax']);
    Route::get('products/SubSubCategory/ajax/{id}', [ProductController::class, 'SubSubCategoryIdGetByAjax']);
    // Edit custom route
    Route::get('products/edit/{id}', [ProductController::class, 'editFunc'])->name('subcategoryEdit');
    // Update ajax data change route
    Route::get('products/edit/updateChangeSubcategory/{id}', [ProductController::class, 'subCategoryIdGetByAjax']);
    Route::get('products/edit/updateChangeSubSubcategory/{id}', [ProductController::class, 'SubSubCategoryIdGetByAjax']);
    // edit multiple image
    Route::post('products/multipleImage/Update/', [ProductController::class, 'updateMultipleImage'])->name('edit-multipleImage');
    Route::post('products/single-Image/Update/{id}', [ProductController::class, 'updateSingleImage'])->name('single-Image');
    Route::get('products/Image/delete/{id}', [ProductController::class, 'imageDelete'])->name('products.delete');
    Route::get('products/softDelete/{id}', [ProductController::class, 'ProductSoftDelete'])->name('softDelete.delete');
    Route::get('products/inactive/{id}', [ProductController::class, 'inactive'])->name('products.inactive');
    Route::get('products/active/{id}', [ProductController::class, 'active'])->name('products.active');


});

Route::group(['prefix' => 'user', 'middleware'=> ['user', 'auth'], 'namespace'=>'User'], function() {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    // user Name
    Route::get('/userNameGetId/{id}', [UserController::class, 'userNameGetId'])->name('userUpdate-Id');
    Route::post('/userNameUpdate/store/{id}', [UserController::class, 'userNameUpdateStore'])->name('userNameUpdate-store');
    // user Email
    Route::get('/userEmailGetId/{id}', [UserController::class, 'userEmailGetId'])->name('emailGet-Id');
    Route::post('/userEmailUpdate/store/{id}', [UserController::class, 'userEmailUpdateStore'])->name('userEmailUpdate-store');
    // update password
    Route::get('/updatePasswordShow', [UserController::class, 'updatePasswordShow'])->name('updatePassword-Show');
    Route::post('/password/store', [UserController::class, 'passwordStore'])->name('password-store');
    //user image upload
    Route::post('/photoUpload', [UserController::class, 'photoUpload'])->name('file.Upload');

});

Route::get('/', [FontEntController::class, 'index']);
