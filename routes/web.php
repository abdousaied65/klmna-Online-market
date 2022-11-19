<?php
use App\Models\Unit;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('site.index', [
        'latest_units' => Unit::query()
            ->latest('created_at')
            ->take(3)
            ->get()
    ]);
})->name('index');
Route::get('/contact', function () {
    return view('site.contact');
})->name('contact');
Route::post('/contact-store', 'Site\ContactController@store')->name('contact.store');

Route::get('/dept-units/{id?}', 'Site\DeptController@dept_units')->name('dept.units');
Route::get('/units-search', 'Site\DeptController@units_search')->name('units.search');
Route::get('/units-search-custom', 'Site\DeptController@units_search_custom')->name('units.search.custom');
Route::get('/unit-show/{id?}', 'Site\DeptController@unit_show')->name('unit.show');

//Route::get('/contact-client', 'Site\MessageController@store')->name('contact.client')->middleware('auth:web');
Route::post('/add-favorite', 'Site\FavoriteController@store')->name('add.favorite')->middleware('auth:web');
Route::post('/make-review', 'Admin\ReviewController@make_review')->name('make.review')->middleware('auth:web');
Route::post('/report-unit', 'Site\ReportController@make_report')->name('report.unit')->middleware('auth:web');
Route::patch('/update-profile', 'Site\HomeController@update_profile')->name('update.profile');

Route::get('/my-reviews/', 'Site\HomeController@my_reviews')->name('my.reviews');
Route::get('/my-favorites/', 'Site\HomeController@my_favorites')->name('my.favorites');
Route::get('/my-reports/', 'Site\HomeController@my_reports')->name('my.reports');



// *********  Client Routes ******** //
Route::group(
    [
        'namespace' => 'Client'
    ], function () {
    Auth::routes(
        [
            'verify' => false,
            'register' => true,
        ]
    );
    Route::GET('client/login', 'Auth\LoginController@showLoginForm')->name('client.login');
    Route::POST('client/login', 'Auth\LoginController@login');
    Route::POST('client/logout', 'Auth\LoginController@logout')->name('client.logout');
    Route::GET('client/password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('client.password.confirm');
    Route::POST('client/password/confirm', 'Auth\ConfirmPasswordController@confirm');
    Route::POST('client/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('client.password.email');
    Route::GET('client/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('client.password.request');
    Route::POST('client/password/reset', 'Auth\ResetPasswordController@reset')->name('client.password.update');
    Route::GET('client/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('client.password.reset');

    Route::GET('client/register', 'Auth\RegisterController@showRegistrationForm')->name('client.register');
    Route::POST('client/register', 'Auth\RegisterController@register');

});
Route::group(
    ['middleware' => ['auth:client-web'],
        'prefix' => 'client',
        'namespace' => 'Client'
    ], function () {
    Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::get('/home', 'HomeController@index')->name('client.home');

    // AdminProfile Routes
    Route::get('profile/edit/{id}', 'ClientProfileController@edit')->name('client.profile.edit');
    Route::patch('profile/edit/{id}', 'ClientProfileController@update')->name('client.profile.update');
    Route::patch('profile/store/{id}', 'ClientProfileController@store')->name('client.profile.store');

    // units Routes
    Route::resource('units', 'UnitController')->names([
        'index' => 'client.units.index',
        'create' => 'client.units.create',
        'store' => 'client.units.store'
    ]);

    Route::get('units-reviews', 'ReviewController@index')->name('client.units.reviews');
    Route::get('units-reviews-show/{id?}', 'ReviewController@show')->name('client.units.reviews.show');
    Route::delete('review-destroy/{id?}', 'ReviewController@destroy')->name('client.review.destroy');


    Route::get('/post-ads', 'AdsController@post_ads')->name('client.post.ads');

});
// *********  Admin Routes ******** //
Route::group(
    [
        'namespace' => 'Admin'
    ], function () {
    Auth::routes(
        [
            'verify' => false,
            'register' => false,
        ]
    );
    Route::GET('admin/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::POST('admin/login', 'Auth\LoginController@login');
    Route::POST('admin/logout', 'Auth\LoginController@logout')->name('admin.logout');
    Route::GET('admin/password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('admin.password.confirm');
    Route::POST('admin/password/confirm', 'Auth\ConfirmPasswordController@confirm');
    Route::POST('admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::GET('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::POST('admin/password/reset', 'Auth\ResetPasswordController@reset')->name('admin.password.update');
    Route::GET('admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
});
Route::group(
    ['middleware' => ['auth:admin-web'],
        'prefix' => 'admin',
        'namespace' => 'Admin'
    ], function () {
    Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::get('/home', 'HomeController@index')->name('admin.home');
    // Admins Routes
    Route::resource('admins', 'AdminController')->names([
        'index' => 'admin.admins.index',
        'create' => 'admin.admins.create',
        'update' => 'admin.admins.update',
        'destroy' => 'admin.admins.destroy',
        'edit' => 'admin.admins.edit',
        'store' => 'admin.admins.store',
        'show' => 'admin.admins.show',
    ]);

    // AdminProfile Routes
    Route::get('profile/edit/{id}', 'AdminProfileController@edit')->name('admin.profile.edit');
    Route::patch('profile/edit/{id}', 'AdminProfileController@update')->name('admin.profile.update');
    Route::patch('profile/store/{id}', 'AdminProfileController@store')->name('admin.profile.store');

    // clients Routes
    Route::resource('clients', 'ClientController')->names([
        'index' => 'admin.clients.index',
        'create' => 'admin.clients.create',
        'update' => 'admin.clients.update',
        'destroy' => 'admin.clients.destroy',
        'edit' => 'admin.clients.edit',
        'show' => 'admin.clients.show',
        'store' => 'admin.clients.store'
    ]);

    // customers Routes
    Route::resource('customers', 'CustomerController')->names([
        'index' => 'admin.customers.index',
        'create' => 'admin.customers.create',
        'update' => 'admin.customers.update',
        'destroy' => 'admin.customers.destroy',
        'edit' => 'admin.customers.edit',
        'show' => 'admin.customers.show',
        'store' => 'admin.customers.store'
    ]);
    // Depts Routes
    Route::resource('depts', 'DeptController')->names([
        'index' => 'admin.depts.index',
        'create' => 'admin.depts.create',
        'store' => 'admin.depts.store',
        'edit' => 'admin.depts.edit',
        'update' => 'admin.depts.update',
        'destroy' => 'admin.depts.destroy'
    ]);

    // Intervals Routes
    Route::resource('intervals', 'IntervalController')->names([
        'index' => 'admin.intervals.index',
        'create' => 'admin.intervals.create',
        'store' => 'admin.intervals.store',
        'edit' => 'admin.intervals.edit',
        'update' => 'admin.intervals.update',
        'destroy' => 'admin.intervals.destroy'
    ]);

    // governorates Routes
    Route::resource('governorates', 'GovernorateController')->names([
        'index' => 'admin.governorates.index',
        'create' => 'admin.governorates.create',
        'store' => 'admin.governorates.store',
        'edit' => 'admin.governorates.edit',
        'update' => 'admin.governorates.update',
        'destroy' => 'admin.governorates.destroy'
    ]);

    // units Routes
    Route::resource('units', 'UnitController')->names([
        'index' => 'admin.units.index',
        'create' => 'admin.units.create',
        'store' => 'admin.units.store',
        'edit' => 'admin.units.edit',
        'update' => 'admin.units.update',
        'destroy' => 'admin.units.destroy'
    ]);
    Route::get('units-reviews', 'ReviewController@index')->name('admin.units.reviews');
    Route::get('units-reviews-show/{id?}', 'ReviewController@show')->name('admin.units.reviews.show');
    Route::delete('review-destroy/{id?}', 'ReviewController@destroy')->name('admin.review.destroy');


    // Contacts Routes
    Route::resource('contacts', 'ContactController')->names([
        'index' => 'admin.contacts.index',
        'show' => 'admin.contacts.show',
        'destroy' => 'admin.contacts.destroy'
    ]);
    Route::patch('contacts-make-as-read', 'ContactController@makeAsRead')->name('admin.contacts.make.as.read');
    Route::patch('contacts-make-as-important', 'ContactController@makeAsImportant')->name('admin.contacts.make.as.important');
    Route::patch('contacts-make-as-destroy', 'ContactController@makeAsDestroy')->name('admin.contacts.make.as.destroy');
    Route::patch('contacts-print', 'ContactController@print')->name('admin.contacts.print');
    Route::get('contacts-important', 'ContactController@showImportant')->name('admin.contacts.important');

    Route::get('units-favorites', 'FavoriteController@index')->name('admin.favorites.index');
    Route::get('units-favorites-show/{id?}', 'FavoriteController@show')->name('admin.favorites.show');
    Route::delete('favorite-destroy/{id?}', 'FavoriteController@destroy')->name('admin.favorite.destroy');

    Route::get('units-reports', 'ReportController@index')->name('admin.reports.index');
    Route::get('units-reports-show/{id?}', 'ReportController@show')->name('admin.reports.show');
    Route::delete('report-destroy/{id?}', 'ReportController@destroy')->name('admin.report.destroy');

});
// *********  User Routes ******** //
Route::group(
    [
        'namespace' => 'Site',
    ], function () {
    Auth::routes(
        [
            'verify' => false,
            'register' => true,
        ]
    );
    Route::get('login/google', 'Auth\LoginController@redirectToGoogle')->name('login.google');
    Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

    Route::get('login/facebook', 'Auth\LoginController@redirectToFacebook')->name('login.facebook');
    Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookCallback');

    Route::get('login/github', 'Auth\LoginController@redirectToGithub')->name('login.github');
    Route::get('login/github/callback', 'Auth\LoginController@handleGithubCallback');

    Route::GET('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::POST('login', 'Auth\LoginController@login');

    Route::GET('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::POST('register', 'Auth\RegisterController@register');

    Route::POST('logout', 'Auth\LoginController@logout')->name('logout');
    Route::GET('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
    Route::POST('password/confirm', 'Auth\ConfirmPasswordController@confirm');
    Route::POST('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::GET('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::POST('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    Route::GET('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

});
Route::group(
    [
        'namespace' => 'Site',
    ], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});
?>
