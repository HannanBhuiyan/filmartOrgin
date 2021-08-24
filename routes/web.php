<?php

use Illuminate\Support\Facades\Route;

// admin route
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\StoreRoomController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubSubCategoryController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\StateController;

// user route
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\wishlistController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\StripeController;

// fontEnd route
use App\Http\Controllers\FontEnd\LanguageController;
use App\Http\Controllers\FontEnd\CardController;
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

    // sliders controller
    Route::resource('sliders', SliderController::class);
    Route::get('sliders/inactive/{id}', [SliderController::class, 'inactive'])->name('sliders.inactive');
    Route::get('sliders/active/{id}', [SliderController::class, 'active'])->name('sliders.active');

    // coupon
    Route::resource('coupon', CouponController::class);
    Route::get('coupon/active/{id}', [CouponController::class, 'couponActive'])->name('coupon.active');
    Route::get('coupon/inactive/{id}', [CouponController::class, 'couponInActive'])->name('coupon.inactive');

    // Division
    Route::resource('division', DivisionController::class);
    Route::get('division/active/{id}', [DivisionController::class, 'divisionActive'])->name('division.active');
    Route::get('division/inactive/{id}', [DivisionController::class, 'divisionInActive'])->name('division.inactive');
    // District
    Route::resource('district', DistrictController::class);
    Route::get('district/active/{id}', [DistrictController::class, 'districtActive'])->name('district.active');
    Route::get('district/inactive/{id}', [DistrictController::class, 'districtInActive'])->name('district.inactive');
    // state
    Route::resource('state', StateController::class);
    Route::get('district-get/ajax/{division_id}', [StateController::class, 'distinctAjaxLoad']);
    Route::get('state/active/{id}', [StateController::class, 'stateActive'])->name('state.active');
    Route::get('state/inactive/{id}', [StateController::class, 'stateInActive'])->name('state.inactive');

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

    // cardPage
    Route::get('/get-shoppingCart/', [CartPageController::class, 'getShoppingCart'])->name('getShoppingCart');
    Route::post('/shoppingCart/remove/{rowId}', [CartPageController::class, 'shoppingCartRemove']);
    Route::get('/shoppingCart/increment/{rowId}', [CartPageController::class, 'shoppingCartIncrement']);
    Route::get('/shoppingCart/decrement/{rowId}', [CartPageController::class, 'shoppingCartDecrement']);
    //==== apply coupon =======
    Route::post('/create-coupon/', [CartPageController::class, 'applyCoupon']);
    Route::get('coupon-calculate/', [CartPageController::class, 'couponCalculationField']);
    Route::get('couponRemove/', [CartPageController::class, 'couponRemove']);

    // get district data by ajax
    Route::get('checkout/districtGet/ajax{division_id}', [CartPageController::class, 'getCheckoutDataGetAjax']);
    Route::get('checkout/stateGet/ajax{district_id}', [CartPageController::class, 'getStateDataGetAjax']);

    // payment route
     Route::post('payment-store/', [CartPageController::class, 'paymentStore']);
     Route::get('payment-stripe-page/', [StripeController::class, 'paymentStripePageView']);
     Route::post('payment/stripe/', [StripeController::class, 'stripePaymentStore'])->name('stripe.order');

});



Route::get('/', [FontEntController::class, 'index']);
Route::get('/single/product/{id}/{slug}', [FontEntController::class, 'singleProduct']);


// ====================== card settings start ======================

Route::get('/product/card/view/{id}', [CardController::class, 'productCardView']);
Route::post('/product/card/add/{id}', [CardController::class, 'productAddToCard']);
Route::get('/ProductMiniCardView/', [CardController::class, 'ProductMiniCardView']);
Route::get('/miniCartRemove/{rowId}', [CardController::class, 'miniCartRemove']);

// ==================== card settings end ============================


//==================== tag wise product show ==========================
Route::get('/product/tags/{tag}', [FontEntController::class, 'tagWiseProductsShow']);


// ============================ subCategory wise product show =========
Route::get('subCategory/product/{id}', [FontEntController::class, 'subcategoryWiseProductShow']);
Route::get('subSubCategory/product/{id}', [FontEntController::class, 'subSubcategoryWiseProductShow']);

// ===================== Frontend Language route =======================

Route::get('/bangle/language/', [LanguageController::class, 'Bangle'])->name('bangle.language');
Route::get('/english/language/', [LanguageController::class, 'English'])->name('english.language');

//========================= wishlist start ==============================
Route::get('/wishListPageView/', [wishlistController::class, 'wishlistPageView']);
Route::get('/getWishListData/', [wishlistController::class, 'getWishListData']);
Route::get('/removeWishlistData/{id}', [wishlistController::class, 'removeWishlistData']);
Route::post('/add-to-userWishList/{product_id}', [wishlistController::class, 'addWishlist']);

//========================= wishlist end ==================================
Route::get('my-cart/', [CartPageController::class, 'cartIndex'])->name('cart');
Route::get('checkout', [CartPageController::class, 'checkout'])->name('checkout');

