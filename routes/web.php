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

Route::get('/','App\Http\Controllers\AuthController@getLogin')->name('login');
Route::post('/login','App\Http\Controllers\AuthController@postLogin');
Route::middleware('auth')->group(function(){
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@getHome');
    Route::post('/logout', 'App\Http\Controllers\AuthController@logout');

    Route::get('/categories','App\Http\Controllers\DashboardController@categories');
    Route::post('/add-category','App\Http\Controllers\DashboardController@addCategories');

    Route::get('/district-manager','App\Http\Controllers\DashboardController@getManagers');
    Route::post('/add-district-manager','App\Http\Controllers\DashboardController@addDistrictManager');
    
    Route::get('/supplier','App\Http\Controllers\DashboardController@getSupplier');
    Route::get('/supplier/add','App\Http\Controllers\DashboardController@getAddSupplier');
    Route::post('/add-supplier', 'App\Http\Controllers\DashboardController@addSupplier');
    Route::get('/edit-supplier/{id}', 'App\Http\Controllers\DashboardController@editSupplier');
    Route::post('/edit-supplier/{id}', 'App\Http\Controllers\DashboardController@updateSupplier');
    Route::post('/delete-supplier', 'App\Http\Controllers\DashboardController@deleteSupplier');
    
    Route::get('/materials','App\Http\Controllers\DashboardController@getMaterial');
    Route::get('/materials/add', 'App\Http\Controllers\DashboardController@getAddMaterial');
    Route::post('/add-material','App\Http\Controllers\DashboardController@addMaterial');
    Route::get('/materials/edit/{id}', 'App\Http\Controllers\DashboardController@editMaterial');
    Route::post('/update-material/{id}', 'App\Http\Controllers\DashboardController@updateMaterial');
    Route::post('/delete-material','App\Http\Controllers\DashboardController@deleteMaterial');

    Route::get('/purchasing-manager','App\Http\Controllers\DashboardController@getPurchasingManager');
    Route::post('/add-purchasing-manager','App\Http\Controllers\DashboardController@addPurchasingManager');

    Route::get('/request-material','App\Http\Controllers\DistrictManagerController@requestMaterial');
    Route::post('/request-material','App\Http\Controllers\DistrictManagerController@postRequestMaterial');

    Route::get('/material-requests','App\Http\Controllers\DashboardController@getMaterialRequests');
    Route::get('/material-requests/{id}', 'App\Http\Controllers\DashboardController@getRequestedMaterial');
    Route::post('/allocate/{id}', 'App\Http\Controllers\DashboardController@allocateMaterial');

    Route::get('/allocated-materials','App\Http\Controllers\DistrictManagerController@getAllocatedMaterials');
    Route::post('/unallocate/{id}', 'App\Http\Controllers\DistrictManagerController@unallocateMaterial');
    Route::post('/process-request/{id}', 'App\Http\Controllers\DashboardController@processRequest');

});
