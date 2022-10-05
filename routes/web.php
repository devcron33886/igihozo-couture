<?php

    use Illuminate\Support\Facades\Route;

    Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('welcome');

    Route::get('/about-us', [App\Http\Controllers\FrontController::class, 'about'])->name('about');

    Route::get('/contact-us', [App\Http\Controllers\AboutController::class, 'index'])->name('contact');

    Route::get('/collections', App\Http\Controllers\ShopController::class)->name('shop');

    Route::get('/collection/{product:slug}', App\Http\Controllers\ProductController::class)->name('product-details');

    Route::get('/category/{category:slug}', App\Http\Controllers\CategoryController::class)->name('category-details');

    Route::get('/shopping/basket',[App\Http\Controllers\CartController::class,'index'])->name('cart.index');


    Route::get('/remove/cart/item/{id}', [App\Http\Controllers\CartController::class,'getRemoveItem'])->name('cart.removeItem');
    Route::get('/remove/cart', [App\Http\Controllers\CartController::class,'getRemoveAll'])->name('cart.removeAll');

    Route::get('/increment/cart/item/{id}', [App\Http\Controllers\CartController::class,'getIncrement'])->name('cart.increment');

    Route::get('/decrement/cart/item/{id}',[App\Http\Controllers\CartController::class,'getDecrement'])->name('cart.decrement');

    Route::get('/shop/checkout',[App\Http\Controllers\CheckoutController::class,'index'])->name('checkout.index');

    Auth::routes();

    Route::get('/home', function () {
        if (session('status')) {
            return redirect()->route('admin.home')->with('status', session('status'));
        }

        return redirect()->route('admin.home');
    });



    Auth::routes();

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
        Route::get('/', 'HomeController@index')->name('home');
        // Permissions
        Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
        Route::resource('permissions', 'PermissionsController');

        // Roles
        Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
        Route::resource('roles', 'RolesController');

        // Users
        Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
        Route::resource('users', 'UsersController');

        // Category
        Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
        Route::post('categories/media', 'CategoryController@storeMedia')->name('categories.storeMedia');
        Route::post('categories/ckmedia', 'CategoryController@storeCKEditorImages')->name('categories.storeCKEditorImages');
        Route::resource('categories', 'CategoryController');

        // Product
        Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
        Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
        Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
        Route::resource('products', 'ProductController');

        // Payment Method
        Route::delete('payment-methods/destroy', 'PaymentMethodController@massDestroy')->name('payment-methods.massDestroy');
        Route::resource('payment-methods', 'PaymentMethodController');

        // Shipping Type
        Route::delete('shipping-types/destroy', 'ShippingTypeController@massDestroy')->name('shipping-types.massDestroy');
        Route::resource('shipping-types', 'ShippingTypeController');

        // Setting
        Route::delete('settings/destroy', 'SettingController@massDestroy')->name('settings.massDestroy');
        Route::resource('settings', 'SettingController');

        // Message
        Route::delete('messages/destroy', 'MessageController@massDestroy')->name('messages.massDestroy');
        Route::resource('messages', 'MessageController');

        // Order
        Route::resource('orders', 'OrderController', ['except' => ['create', 'store', 'show', 'destroy']]);
    });
    Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
        // Change password
        if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
            Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
            Route::post('password', 'ChangePasswordController@update')->name('password.update');
            Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
            Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        }
    });

