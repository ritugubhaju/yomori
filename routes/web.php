<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('setting', 'Backend\SettingController@index')->name('setting.index');
    Route::put('setting/update', 'Backend\SettingController@update')->name('setting.update');

    Route::group(['as' => 'dashboard.', 'prefix' => 'dashboard'], function () {
        Route::get('', 'Backend\DashboardController@index')->name('index');
    });

    Route::group(['as' => 'menu.', 'prefix' => 'menu'], function () {
        Route::get('', 'Backend\MenuController@index')->name('index');
        Route::get('/indexnp', 'Backend\MenuController@indexnp')->name('indexnp');
        Route::post('', 'Backend\MenuController@store')->name('store');
        Route::put('', 'Backend\MenuController@update')->name('update');
        Route::get('{menu}', 'Backend\MenuController@destroy')->name('destroy');

        Route::group(['as' => 'subMenu.'], function () {
            Route::post('{menu}/subMenu', 'Backend\MenuController@storeSubMenu')->name('store');
            Route::get('{menu}/subMenu/{subMenu}', 'Backend\MenuController@destroySubMenu')->name('destroy');
            Route::get('{menu}/subMenuModal', 'Backend\MenuController@subMenuModal')->name('component.modal');

            // Route::group(['as' => 'childsubMenu.'], function () {
            //     Route::post('{subMenu}/subMenu/childsubMenu', 'Backend\MenuController@storeChildSubMenu')->name('store');
            //     Route::get('{menu}/subMenu/{subMenu}/childsubMenu/{childSubMenu}', 'Backend\MenuController@destroyChildSubMenu')->name('destroy');
            //     Route::get('{subMenu}/subMenu/childsubMenuModal', 'Backend\MenuController@childsubMenuModal')->name('component.modal');
            // });
        });
    });

    /*
        |--------------------------------------------------------------------------
        | Page CRUD Routes
        |--------------------------------------------------------------------------
        */
    Route::group(['as' => 'page.', 'prefix' => 'page'], function () {
        Route::get('', 'Backend\PageController@index')->name('index');
        Route::get('create', 'Backend\PageController@create')->name('create');
        Route::post('', 'Backend\PageController@store')->name('store');
        // Route::get('{page}', 'Backend\PageController@show')->name('show');
        Route::get('{page}/edit', 'Backend\PageController@edit')->name('edit');
        Route::put('{page}', 'Backend\PageController@update')->name('update');
        Route::get('{id}', 'Backend\PageController@destroy')->name('destroy');
    });

    Route::group(['as' => 'slider.', 'prefix' => 'slider'], function () {
        Route::get('', 'Backend\SliderController@index')->name('index');
        Route::get('create', 'Backend\SliderController@create')->name('create');
        Route::post('', 'Backend\SliderController@store')->name('store');
        Route::put('{slider}', 'Backend\SliderController@update')->name('update');
        Route::get('{slider}/edit', 'Backend\SliderController@edit')->name('edit');
        Route::get('{id}', 'Backend\SliderController@destroy')->name('destroy');

    });

    Route::group(['as' => 'category.', 'prefix' => 'category'], function () {
        Route::get('', 'Backend\CategoryController@index')->name('index');
        Route::get('create', 'Backend\CategoryController@create')->name('create');
        Route::post('', 'Backend\CategoryController@store')->name('store');
        Route::put('{category}', 'Backend\CategoryController@update')->name('update');
        Route::get('{category}/edit', 'Backend\CategoryController@edit')->name('edit');
        Route::get('{id}', 'Backend\CategoryController@destroy')->name('destroy');

    });

    Route::group(['as' => 'product.', 'prefix' => 'product'], function () {
        Route::get('', 'Backend\ProductController@index')->name('index');
        Route::get('create', 'Backend\ProductController@create')->name('create');
        Route::post('', 'Backend\ProductController@store')->name('store');
        Route::put('{product}', 'Backend\ProductController@update')->name('update');
        Route::get('{product}/edit', 'Backend\ProductController@edit')->name('edit');
        Route::get('{id}', 'Backend\ProductController@destroy')->name('destroy');

    });

    Route::group(['as' => 'event.', 'prefix' => 'event'], function () {
        Route::get('', 'Backend\EventController@index')->name('index');
        Route::get('create', 'Backend\EventController@create')->name('create');
        Route::post('', 'Backend\EventController@store')->name('store');
        Route::put('{event}', 'Backend\EventController@update')->name('update');
        Route::get('{event}/edit', 'Backend\EventController@edit')->name('edit');
        Route::get('{id}', 'Backend\EventController@destroy')->name('destroy');

    });

    Route::group(['as' => 'client.', 'prefix' => 'client'], function () {
        Route::get('', 'Backend\ClientController@index')->name('index');
        Route::get('create', 'Backend\ClientController@create')->name('create');
        Route::post('', 'Backend\ClientController@store')->name('store');
        Route::put('{client}', 'Backend\ClientController@update')->name('update');
        Route::get('{client}/edit', 'Backend\ClientController@edit')->name('edit');
        Route::get('{id}', 'Backend\ClientController@destroy')->name('destroy');

    });

    Route::group(['as' => 'gallery.', 'prefix' => 'gallery'], function () {
        Route::get('', 'Backend\GalleryController@index')->name('index');
        Route::get('create', 'Backend\GalleryController@create')->name('create');
        Route::post('', 'Backend\GalleryController@store')->name('store');
        Route::put('{gallery}', 'Backend\GalleryController@update')->name('update');
        Route::get('{gallery}/edit', 'Backend\GalleryController@edit')->name('edit');
        Route::get('{id}', 'Backend\GalleryController@destroy')->name('destroy');

    });

    Route::group(['as' => 'album.', 'prefix' => 'album'], function () {
        Route::get('', 'Backend\AlbumController@index')->name('index');
        Route::get('create', 'Backend\AlbumController@create')->name('create');
        Route::post('', 'Backend\AlbumController@store')->name('store');
        Route::put('{album}', 'Backend\AlbumController@update')->name('update');
        Route::get('{album}/edit', 'Backend\AlbumController@edit')->name('edit');
        Route::get('{id}', 'Backend\AlbumController@destroy')->name('destroy');

    });

    Route::group(['as' => 'team.', 'prefix' => 'team'], function () {
        Route::get('', 'Backend\TeamController@index')->name('index');
        Route::get('create', 'Backend\TeamController@create')->name('create');
        Route::post('', 'Backend\TeamController@store')->name('store');
        Route::put('{team}', 'Backend\TeamController@update')->name('update');
        Route::put('', 'Backend\TeamController@teamOrder')->name('update.order');
        Route::get('{team}/edit', 'Backend\TeamController@edit')->name('edit');
        Route::get('{id}', 'Backend\TeamController@destroy')->name('destroy');
    });

    Route::group(['as' => 'booking.', 'prefix' => 'booking'], function () {
        Route::get('', 'Backend\BookingController@index')->name('index');
        Route::get('create', 'Backend\BookingController@create')->name('create');
        Route::post('', 'Backend\BookingController@store')->name('store');
        Route::put('{booking}', 'Backend\BookingController@update')->name('update');
        Route::get('{booking}/edit', 'Backend\BookingController@edit')->name('edit');
        Route::get('{id}', 'Backend\BookingController@destroy')->name('destroy');

    });

    Route::group(['as' => 'testimonial.', 'prefix' => 'testimonial'], function () {
        Route::get('', 'Backend\TestimonialController@index')->name('index');
        Route::get('create', 'Backend\TestimonialController@create')->name('create');
        Route::post('', 'Backend\TestimonialController@store')->name('store');
        Route::put('{testimonial}', 'Backend\TestimonialController@update')->name('update');
        Route::get('{testimonial}/edit', 'Backend\TestimonialController@edit')->name('edit');
        Route::get('{id}', 'Backend\TestimonialController@destroy')->name('destroy');

    });

});

Route::get('', 'Frontend\FrontendController@homepage')->name('homepage');

Route::get('about', 'Frontend\FrontendController@about')->name('about');
Route::get('sectors', 'Frontend\FrontendController@sectorsList')->name('sectors');
Route::get('projects', 'Frontend\FrontendController@projectsList')->name('projects');
Route::get('eventdetail/{events}', 'Frontend\FrontendController@eventsDetail')->name('events.detail');
Route::get('gallery', 'Frontend\FrontendController@gallery')->name('gallery');
Route::get('sectorsdetail/{sectors}', 'Frontend\FrontendController@sectorsDetail')->name('sectors.detail');
Route::get('timelines', 'Frontend\FrontendController@timeline')->name('timeline');
Route::get('contact', 'Frontend\FrontendController@contact')->name('contact');
Route::post('contact', 'Frontend\FrontendController@sendcontact')->name('send-contact');
Route::get('faq', 'Frontend\FrontendController@faq')->name('faq');
Route::get('teams', 'Frontend\FrontendController@teams')->name('teams');
Route::get('downloads', 'Frontend\FrontendController@downloads')->name('download');
Route::get('projectsdetail/{projects}', 'Frontend\FrontendController@projectsDetail')->name('projects.detail');


Route::get('{page}', 'Frontend\FrontendController@page')->name('page.detail');


