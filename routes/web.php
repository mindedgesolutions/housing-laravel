<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllotmentApplicationController;
use App\Http\Controllers\HousingFlatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('homepage');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
Route::get('site-login',function(){
    return view('sitelogin');
});
Route::get('refresh_captcha',[App\Http\Controllers\Auth\LoginController::class, 'refreshCaptcha']);

// For New Allotment Application
Route::get('new-application', [AllotmentApplicationController::class, 'newAllotmentApplication']);
Route::post('submit-new-application', [AllotmentApplicationController::class, 'newAllotmentApplicationSave']);

// For Housing Flat Addition
Route::get('housing-flat-add', [HousingFlatController::class, 'housingFlatAdd']);
Route::post('store-flat-info', [HousingFlatController::class, 'housingFlatStore']);

// For Flat List View from Flat Master Table
//Route::get('rhe-flat-update', [HousingFlatUpdateController::class, 'housingFlatUpdate']);

// For RHE-Wise Flat List Edit
Route::get('housing-flat-edit', [HousingFlatController::class, 'HousingFlatEdit']);
Route::post('housing-flat-get-flat-type', [HousingFlatController::class, 'getFlatType']);
Route::post('housing-flat-get-flat-block', [HousingFlatController::class, 'getFlatBlock']);
Route::get('housing-flat-edit-save', [HousingFlatController::class, 'HousingFlatEditSave']);
Route::get('housing-flat-list-view', [HousingFlatController::class, 'getFlatListView']);

