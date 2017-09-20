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

Route::get('/', 'HomeController@home');

Route::get('/category/{id}', 'CategoryController@show');

Route::get('/product/{id}', 'ProductController@showProduct');

Route::get('/productsList', 'CategoryController@index');

Route::get('/projects', 'ProjectController@index');

Route::post('/contact', 'ContactController@create')->name('contact');

Route::get('/search', ['uses' => 'ProductController@search', 'as' => 'search']);

Route::get('services', 'ServiceController@index');

Route::get('/contacto', 'ContactController@show');

Route::get('/mail', function () {
  Mail::to('rodrigo@example.com')->send(new App\Mail\ContactShipped);
});

// Backend

Route::get('backend', function() {
    return view('auth.login');
});


Auth::routes();

Route::middleware(['auth'])->group(function () {

  Route::get('backend/backendHome', 'HomeController@index');

  Route::resource('/backend/products', 'ProductController');

  Route::get('prueba', 'PostsController@index');

  Route::resource('/backend/posts', 'PostsController');

  Route::get('/messages', 'ContactController@index');

  Route::get('backend/images', 'ProductController@imagesUpload');

  Route::post('backend/images/storeImages', 'ProductController@storeImages')->name('storeImages');

  Route::put('category/update', 'CategoryController@update')->name('category.update');

  Route::post('category/create', 'CategoryController@store')->name('category.store');

  Route::delete('category/destroy', 'CategoryController@destroy')->name('category.destroy');

  Route::get('company', 'CompanyController@index');

  Route::post('company/create', 'CompanyController@create')->name('company.create');

  Route::put('company/update', 'CompanyController@update')->name('company.update');

  Route::post('service/create', 'ServiceController@create')->name('service.store');

  Route::put('service/update', 'ServiceController@update')->name('service.update');

  Route::delete('service/destroy', 'ServiceController@destroy')->name('service.destroy');

});
