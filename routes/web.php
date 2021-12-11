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

// Route::get('/mail', function () {
//   return view('emails/welcome');
// });

// Backend
Auth::routes();

Route::get('/backend', function() {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {

  Route::get('backend/backendHome', 'HomeController@index');
  Route::resource('/backend/products', 'ProductController');
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
  Route::get('/backend/budget/{id}', 'BudgetController@show');
  Route::post('certificate/store', 'CertificateController@store')->name('certificate.store');
  Route::put('certificate/update', 'CertificateController@update')->name('certificate.update');
  Route::delete('certificate/destroy', 'CertificateController@destroy')->name('certificate.destroy');
  Route::post('project/create', 'ProjectController@create')->name('project.create');
  Route::delete('project/destroy', 'ProjectController@destroy')->name('project.destroy');
  Route::delete('image/delete', 'ProductController@imageDelete')->name('image.delete');

});

Route::get('/', 'HomeController@home');

Route::get('/category/{id}', 'CategoryController@show');

Route::get('/{category}/{id}', 'ProductController@showProduct');

Route::get('/productsList', 'CategoryController@index');

Route::get('/projects', 'ProjectController@index');

Route::post('/contact', 'ContactController@create')->name('contact');

Route::get('/search', ['uses' => 'ProductController@search', 'as' => 'search']);

Route::get('services', 'ServiceController@index');

Route::get('/contacto', 'ContactController@show');
