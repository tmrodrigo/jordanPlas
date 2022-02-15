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

use Illuminate\Support\Facades\Route;

Route::get('/clear-cache', function() {
    Artisan::call('route:cache');
    Artisan::call('view:clear'); 
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    return "Cleared!";
});

Route::get('/migrate', function() {
    Artisan::call('migrate');
    return "Migrated";
});


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

  Route::prefix('sub_category')->group(function(){
    Route::post('/', 'SubCategoryController@create')->name('sub_category_create');    
    Route::post('/update/{sub_category}', 'SubCategoryController@update')->name('sub_category_update');  
    Route::post('/delete/{sub_category}', 'SubCategoryController@delete')->name('sub_category_delete');  
  });

  Route::prefix('budget')->group(function(){

    Route::get('/', 'BudgetController@show_form')->name('budget');
    Route::post('/get_budget_info', 'BudgetController@get_budget_info')->name('get_budget_info');
    Route::post('/add_client_info', 'BudgetController@add_client_info')->name('add_client_info');
    Route::get('/remove/{key}', 'BudgetController@remove_item')->name('remove_item');
    Route::post('/create_budget', 'BudgetController@create_budget')->name('create_budget');

    Route::get('/pdf', 'BudgetController@show_pdf');


  });

});


Route::get('/', 'HomeController@home');

Route::get('/rubro/{category}/{id}', 'CategoryController@show')->name('category');
Route::get('/sub-rubro/{subcategory}', 'CategoryController@showSubCategory')->name('subcategory');
Route::get('/productos', 'CategoryController@index')->name('products');

Route::get('rubro/{product}/producto/{id}', 'ProductController@showProduct')->name('product');

Route::get('/search', 'ProductController@search')->name('search');

Route::post('/contact', 'ContactController@create')->name('contact');

Route::get('/contacto', 'ContactController@show');

Route::get('/{hash}', 'BudgetController@get_budget')->name('get_budget');
