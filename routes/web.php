<?php

Route::prefix('/')->group(function () {
    Route::get('/', 'WebsiteController@index');
    Route::get('donate/{page_id}/{slug}', 'WebsiteController@page');
});
Route::prefix('marketplace')->group(function () {
    Route::get('/', 'MarketplaceController@index');
    Route::get('register-salesman', 'MarketplaceController@registerSalesman');
});



Route::prefix('games')->group(function () {
    Route::get('getActiveGames', 'GamesController@getActiveGames');
});

Route::get('terms', 'WebsiteController@terms');
Route::get('privacy', 'WebsiteController@privacy');
Route::get('forget-me', 'WebsiteController@forgetMe');
Route::post('account-delete', 'WebsiteController@accountDelete');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::get('register-user', function () {
    return view('auth.register-user');
});

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

    // Star
    Route::delete('stars/destroy', 'StarController@massDestroy')->name('stars.massDestroy');
    Route::resource('stars', 'StarController');

    // Content Category
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tag
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Page
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');

    // Number
    Route::delete('numbers/destroy', 'NumberController@massDestroy')->name('numbers.massDestroy');
    Route::resource('numbers', 'NumberController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::post('categories/media', 'CategoryController@storeMedia')->name('categories.storeMedia');
    Route::post('categories/ckmedia', 'CategoryController@storeCKEditorImages')->name('categories.storeCKEditorImages');
    Route::resource('categories', 'CategoryController');

    // Entity
    Route::delete('entities/destroy', 'EntityController@massDestroy')->name('entities.massDestroy');
    Route::post('entities/media', 'EntityController@storeMedia')->name('entities.storeMedia');
    Route::post('entities/ckmedia', 'EntityController@storeCKEditorImages')->name('entities.storeCKEditorImages');
    Route::resource('entities', 'EntityController');

    // Star Plays
    Route::delete('star-plays/destroy', 'StarPlaysController@massDestroy')->name('star-plays.massDestroy');
    Route::resource('star-plays', 'StarPlaysController');

    // Number Plays
    Route::delete('number-plays/destroy', 'NumberPlaysController@massDestroy')->name('number-plays.massDestroy');
    Route::resource('number-plays', 'NumberPlaysController');

    // Play
    Route::delete('plays/destroy', 'PlayController@massDestroy')->name('plays.massDestroy');
    Route::resource('plays', 'PlayController');

    // Awards
    Route::delete('awards/destroy', 'AwardsController@massDestroy')->name('awards.massDestroy');
    Route::post('awards/media', 'AwardsController@storeMedia')->name('awards.storeMedia');
    Route::post('awards/ckmedia', 'AwardsController@storeCKEditorImages')->name('awards.storeCKEditorImages');
    Route::resource('awards', 'AwardsController');

    // Benefactor
    Route::delete('benefactors/destroy', 'BenefactorController@massDestroy')->name('benefactors.massDestroy');
    Route::resource('benefactors', 'BenefactorController');

    // Payment
    Route::delete('payments/destroy', 'PaymentController@massDestroy')->name('payments.massDestroy');
    Route::resource('payments', 'PaymentController');

    // Win
    Route::delete('wins/destroy', 'WinController@massDestroy')->name('wins.massDestroy');
    Route::resource('wins', 'WinController');

    // Wallet
    Route::delete('wallets/destroy', 'WalletController@massDestroy')->name('wallets.massDestroy');
    Route::resource('wallets', 'WalletController');

    // Slide
    Route::delete('slides/destroy', 'SlideController@massDestroy')->name('slides.massDestroy');
    Route::post('slides/media', 'SlideController@storeMedia')->name('slides.storeMedia');
    Route::post('slides/ckmedia', 'SlideController@storeCKEditorImages')->name('slides.storeCKEditorImages');
    Route::resource('slides', 'SlideController');

    // Page
    Route::delete('pages/destroy', 'PageController@massDestroy')->name('pages.massDestroy');
    Route::post('pages/media', 'PageController@storeMedia')->name('pages.storeMedia');
    Route::post('pages/ckmedia', 'PageController@storeCKEditorImages')->name('pages.storeCKEditorImages');
    Route::resource('pages', 'PageController');

    // Feature
    Route::delete('features/destroy', 'FeatureController@massDestroy')->name('features.massDestroy');
    Route::resource('features', 'FeatureController');

    // Menu
    Route::delete('menus/destroy', 'MenuController@massDestroy')->name('menus.massDestroy');
    Route::resource('menus', 'MenuController');

    // Product Category
    Route::delete('product-categories/destroy', 'ProductCategoryController@massDestroy')->name('product-categories.massDestroy');
    Route::post('product-categories/media', 'ProductCategoryController@storeMedia')->name('product-categories.storeMedia');
    Route::post('product-categories/ckmedia', 'ProductCategoryController@storeCKEditorImages')->name('product-categories.storeCKEditorImages');
    Route::resource('product-categories', 'ProductCategoryController');

    // Product Tag
    Route::delete('product-tags/destroy', 'ProductTagController@massDestroy')->name('product-tags.massDestroy');
    Route::resource('product-tags', 'ProductTagController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Company
    Route::delete('companies/destroy', 'CompanyController@massDestroy')->name('companies.massDestroy');
    Route::post('companies/media', 'CompanyController@storeMedia')->name('companies.storeMedia');
    Route::post('companies/ckmedia', 'CompanyController@storeCKEditorImages')->name('companies.storeCKEditorImages');
    Route::resource('companies', 'CompanyController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
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
