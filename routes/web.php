<?php

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

Route::group(['middleware' => 'locale'], function () {

    Auth::routes();

    Route::middleware(['auth', 'admin_panel_access'])->group(function () {
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');
        Route::resource('products', 'ProductController');

        Route::resource('orders', 'OrderController');
        Route::resource('categories', 'CategoryController');
        Route::resource('subcategories', 'SubCategoryController');
        Route::resource('brands', 'BrandController');
        Route::resource('colors', 'ColorController');
        Route::resource('certificates', 'CertificateController');
        Route::resource('sizes', 'SizeController');
        Route::resource('customers', 'CustomerController');
        Route::resource('posts', 'PostController');
        Route::resource('messages', 'ContactController');
        Route::resource('users', 'UserController');
        Route::resource('reviews', 'ReviewController');
        Route::resource('comments', 'CommentController');
        Route::resource('countries', 'CountryController');
        Route::resource('states', 'StateController');
        Route::resource('cities', 'CityController');
        Route::resource('currencies', 'CurrencyController');
        Route::resource('variations', 'VariationController');
        Route::resource('widths', 'WidthController');

        // Products delete routes
        Route::post('products_bulk_delete', 'ProductController@bulk_delete')->name('products.bulkDelete');

        Route::name('center_stone.')->prefix('center_stone')->group(function () {
            Route::get('index', 'CenterStoneController@index')->name('index');
            Route::get('create', 'CenterStoneController@create')->name('create');
            Route::post('create', 'CenterStoneController@store')->name('store');

            Route::get('sizes/index', 'CenterStoneController@sizes_index')->name('sizes.index');
            Route::post('sizes/store', 'CenterStoneController@store_size')->name('sizes.store');


            Route::get('clarities/index', 'CenterStoneController@clarities_index')->name('clarities.index');
            Route::post('clarity/store', 'CenterStoneController@store_clarity')->name('clarity.store');
            Route::get('edit_clarity/{id}', 'CenterStoneController@edit_clarity')->name('clarity.edit');
            Route::put('update_clarity/{id}', 'CenterStoneController@update_clarity')->name('clarity.update');
            Route::delete('delete_clarity/{id}', 'CenterStoneController@delete_clarity')->name('clarity.delete');


            Route::get('colors/index', 'CenterStoneController@colors_index')->name('colors.index');
            Route::post('color/store', 'CenterStoneController@store_color')->name('color.store');
            Route::get('edit_color/{id}', 'CenterStoneController@edit_color')->name('color.edit');
            Route::put('update_color/{id}', 'CenterStoneController@update_color')->name('color.update');
            Route::delete('delete_color/{id}', 'CenterStoneController@delete_color')->name('color.delete');

            Route::post('import_csv', 'CenterStoneController@import_csv')->name('import_csv');

        });

        Route::name('product.album.')->prefix('album')->group(function () {
            Route::get('all/{id}', 'ProductController@product_album')->name('product_album');
            Route::get('create/{id}', 'ProductController@create_album')->name('create');
            Route::post('store/{id}', 'ProductController@store_album')->name('store');
            Route::get('edit/{id}/{title}', 'ProductController@edit_album')->name('edit');
            Route::get('upload_360/{product_abum_id}', 'RotatoryImageController@upload_image')->name('upload_360_image');
            Route::post('update_360', 'RotatoryImageController@update_image')->name('update_360_image');
            Route::get('delete_image/{id}', 'RotatoryImageController@delete_image')->name('delete_image');
            Route::get('delete_album_image/{id}', 'ProductController@delete_image_album')->name('delete_image_album');
            
        });
        Route::name('product.variations.')->prefix('variations')->group(function () {
            Route::get('get_variations/{id}', 'ProductController@get_variations')->name('get');
            Route::get('add_variations/{id}', 'ProductController@add_variations')->name('add');
            Route::post('store_variations', 'ProductController@store_variations')->name('store');
            Route::post('edit_variations', 'ProductController@edit_variations')->name('edit');
            Route::post('edit_variation', 'ProductController@edit_variation')->name('edit_var');
            Route::post('update_variations', 'ProductController@update_variations')->name('update');
            Route::delete('destroy_variation/{variation}', 'ProductController@destroy_variation')->name('destroy');
            Route::get('delete_variation/{id}', 'ProductController@delete_variation')->name('delete_var');
            Route::post('bulk_delete_variations', 'ProductController@bulk_delete_variations')->name('bulk_delete');
            Route::post('import_csv', 'ProductController@import_csv')->name('import_csv');
        });
        Route::name('product.center_stone.')->prefix('center_stone')->group(function () {
            Route::get('add/{id}', 'ProductController@center_stone')->name('add');
            Route::post('store', 'ProductController@store_center_stone')->name('store');
            Route::post('delete', 'ProductController@delete_center_stone')->name('delete');
        });


        // Prodcuc ajax route
        Route::post('get_more_product_details', 'ProductController@get_more_product_details');

        // Posts delete routes
        Route::post('posts_bulk_delete', 'PostController@bulk_delete')->name('posts.bulkDelete');

        // Reviews delete routes
        Route::post('reviews_bulk_delete', 'ReviewController@bulk_delete')->name('reviews.bulkDelete');

        // Comments delete routes
        Route::post('comments_bulk_delete', 'CommentController@bulk_delete')->name('comments.bulkDelete');

        // Messages delete routes
        Route::post('messages_bulk_delete', 'ContactController@bulk_delete')->name('messages.bulkDelete');

        // Categories delete routes
        Route::post('categories_bulk_delete', 'CategoryController@bulk_delete')->name('categories.bulkDelete');

        // SubCategories delete routes
        Route::post('subcategories_bulk_delete', 'SubCategoryController@bulk_delete')->name('subcategories.bulkDelete');

        // Brands delete routes
        Route::post('brands_bulk_delete', 'BrandController@bulk_delete')->name('brands.bulkDelete');

        // Sizes delete routes
        Route::post('sizes_bulk_delete', 'SizeController@bulk_delete')->name('sizes.bulkDelete');

        // Colors delete routes
        Route::post('colors_bulk_delete', 'ColorController@bulk_delete')->name('colors.bulkDelete');
        // Widths delete routes
        Route::post('widths_bulk_delete', 'WidthController@bulk_delete')->name('widths.bulkDelete');

        // Certificate delete routes
        Route::post('certificates_bulk_delete', 'CertificateController@bulk_delete')->name('certificates.bulkDelete');

        // Variations delete routes
        Route::post('variations_bulk_delete', 'VariationController@bulk_delete')->name('variations.bulkDelete');

        // Users delete routes
        Route::post('users_bulk_delete', 'UserController@bulk_delete')->name('users.bulkDelete');

        // Countries delete routes
        Route::post('countries_bulk_delete', 'CountryController@bulk_delete')->name('countries.bulkDelete');

        // States delete routes
        Route::post('states_bulk_delete', 'StateController@bulk_delete')->name('states.bulkDelete');

        // City delete routes
        Route::post('cities_bulk_delete', 'CityController@bulk_delete')->name('cities.bulkDelete');

        // Currencies delete routes
        Route::post('currencies_bulk_delete', 'CurrencyController@bulk_delete')->name('currencies.bulkDelete');

        // Allow Disallow review
        Route::get('allow_disallow_review/{id}', 'ReviewController@allow_disallow')->name('reviews.allow_disallow');
        // Send Invoice
        Route::get('send_invoice/{invoice}', 'OrderController@sendInvoice')->name('orders.sendInvoice');
        // Delete Image from database
        Route::get('img_delete/{id}', 'ImageController@delete_image')->name('image.delete');
        // Settings
        Route::get('settings', 'HomeController@settings')->name('dashboard.settings');
        // Assign Roles to user
        Route::post('change_role/{id}', 'UserController@assign_role')->name('users.changeRole');
        // Assign Permissions to user
        Route::post('give_permissions/{id}', 'UserController@assign_permissions')->name('users.givePermissions');
        // Notification routes
        Route::get('notifications', 'NotificationController@notifications')->name('notifications');
        Route::get('notifications_count', 'NotificationController@unread_notification_count')->name('notifications.Unreadcount');
    });

    // customer after login routes

    Route::middleware(['auth'])->group(function () {

        //customer account routes
        Route::get('/my-account/dashboard', 'FrontController@customer_dashboard');
        Route::get('/my-account/orders', 'FrontController@customer_orders');
        Route::get('/my-account/settings', 'FrontController@customer_setting');
        Route::get('/my-account/invoice/{invoice_no}', 'FrontController@customer_invoice');

        Route::get('/checkout', 'FrontController@checkout');

        // wishlist routes
        Route::get('/my-account/wishlist', 'WishlistController@index');
        Route::get('remove_from_wishlist/{slug}', 'WishlistController@remove_item');
        Route::post('addToWishlist', 'WishlistController@add_to_wishlist');


        // BaseController routes
        Route::post('bs_country_states', 'BaseController@country_states');
        Route::post('bs_state_cites', 'BaseController@state_cities');
        Route::post('order', 'BaseController@order_store')->name('order.store');
        Route::post('review/{id}', 'BaseController@review_store')->name('review.store');
        Route::post('comment/{id}', 'BaseController@comment_store')->name('comment.store');
        Route::post('changepswd', 'BaseController@change_pswd')->name('change.pass');
        Route::match(['put', 'patch'], '/account/update/{id}', 'BaseController@update_account')->name('update.account');


        // cart routes
        Route::get('/cart', 'CartController@index');
        Route::get('removeCartItem', 'CartController@remove');
        Route::get('removeCart', 'CartController@destroy');
        Route::post('addToCart', 'CartController@store');
        Route::post('updateItem', 'CartController@update');
        Route::post('show_topCart', 'CartController@top_cart');

        // compare routes
        Route::get('/compare', 'CompareController@index');
        Route::get('remove_from_compare_list/{slug}', 'CompareController@remove_item');
        Route::post('addToCompare', 'CompareController@add_to_compare')->name('compare');

        // policy routes
        Route::get('/policies/get_by_type/{type?}', 'PolicyController@get_policies')->name('policy.show');
        Route::get('/policies/add_policy', 'PolicyController@add_policy')->name('policy.add');
        Route::post('/policies/store_policy', 'PolicyController@store_policy')->name('policy.store');
        Route::get('/policies/edit_policy/{id}', 'PolicyController@edit_policy')->name('policy.edit');
        Route::get('/policies/delete_policy/{id}', 'PolicyController@delete_policy')->name('policy.delete');
        Route::get('/policies/mark_policy/{id}/{type}', 'PolicyController@mark_policy')->name('policy.mark_policy');
        

    });


    // view pages routes
    Route::get('/', 'FrontController@index');
    Route::get('/shop/{slug}', 'FrontController@products')->name('shop.category');
    Route::get('/blog', 'FrontController@blog');
    Route::get('/about', 'FrontController@about');
    Route::get('/contact', 'FrontController@contact');
    Route::get('/help', 'FrontController@help');
    Route::get('/{slug}', 'FrontController@show_product');
    Route::get('/post/{slug}', 'FrontController@post');
    Route::post('contact', 'BaseController@contact_store')->name('contact.store');
    //Owais
    Route::post('/ChangeAlbum', 'FrontController@ChangeAlbum')->name('ChangeAlbum.post');



    // Api Routes

    Route::get('gmail/redirect', 'SocialAuthGoogleController@redirect');
    Route::get('gmail/callback', 'SocialAuthGoogleController@callback');

    Route::get('/fb/redirect', 'SocialAuthFacebookController@redirect');
    Route::get('/fb/callback', 'SocialAuthFacebookController@callback');

    // Change Email
    Route::get('verify_changed_email/{user}/{email}', 'Auth\EmailChangeController@verify')->name('verify.changed-email');
    Route::post('change_email', 'Auth\EmailChangeController@change')->name('change_user_email');

});
