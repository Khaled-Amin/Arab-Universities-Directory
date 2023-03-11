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

/******************** Admin Route **********************/

Route::prefix('admin')->group(function(){
    // for Login and Dashboard
    Route::get('/login' , [App\Http\Controllers\dashboard\AdminController::class, 'index'])->name('login_form');
    Route::post('/login/owner' , [App\Http\Controllers\dashboard\AdminController::class, 'Login'])->name('admin.login');
    Route::get('/dashboard' , [App\Http\Controllers\dashboard\AdminController::class, 'Dashboard'])->name('admin.dashboard')
    ->middleware('admin');
    Route::get('/logout' , [App\Http\Controllers\dashboard\AdminController::class, 'AdminLogout'])->name('admin.logout')
    ->middleware('admin');
    // Route::get('/register' , [App\Http\Controllers\dashboard\AdminController::class, 'AdminRegister'])->name('admin.register');
    Route::post('/register/create' , [App\Http\Controllers\dashboard\AdminController::class, 'AdminRegisterCreate'])->name('admin.register.create');

    /*========================================== Settings ==============================================*/
    Route::get('/sittings', [App\Http\Controllers\dashboard\SettingController::class, 'getSetting'])->name('admin.sittings');
    Route::post('/setter', [App\Http\Controllers\dashboard\SettingController::class, 'setSittings'])->name('admin.setSittings');
    /*========================================== End Settings ==========================================*/


    /*========================================== Add University ==========================================*/
    Route::get('university' ,  [App\Http\Controllers\dashboard\UniversityController::class, 'index'])->name('admin.university.main');
    Route::get('university/create' , [App\Http\Controllers\dashboard\UniversityController::class, 'create'])->name('admin.university.create');
    Route::match(['get', 'post'],'university/store', [App\Http\Controllers\dashboard\UniversityController::class , 'store'])->name('admin.university.store');
    Route::get('university/edit/{id}' , [App\Http\Controllers\dashboard\UniversityController::class, 'edit'])->name('admin.university.edit');
    Route::match(['post' , 'put'],'university/update/{id}' , [App\Http\Controllers\dashboard\UniversityController::class, 'update'])->name('admin.university.update');
    Route::get('university/destroy/{id}', [App\Http\Controllers\dashboard\UniversityController::class, 'destroy'])->name('admin.university.destroy');

    /*========================================== End Add University ==========================================*/
    /*========================================== Add Countries ==========================================*/
    Route::get('countries' ,  [App\Http\Controllers\dashboard\CountriesController::class, 'index'])->name('countries.main');
    Route::get('countries/create' , [App\Http\Controllers\dashboard\CountriesController::class, 'create'])->name('countries.create');
    Route::match(['get', 'post'],'countries/store', [App\Http\Controllers\dashboard\CountriesController::class , 'store'])->name('countries.store');
    Route::get('countries/edit/{id}' , [App\Http\Controllers\dashboard\CountriesController::class, 'edit'])->name('countries.edit');
    Route::match(['post' , 'put'],'countries/update/{id}' , [App\Http\Controllers\dashboard\CountriesController::class, 'update'])->name('countries.update');
    Route::get('countries/destroy/{id}', [App\Http\Controllers\dashboard\CountriesController::class, 'destroy'])->name('countries.destroy');
    /*========================================== End Add Countries ==========================================*/
    /*========================================== Add Adds ==========================================*/
    Route::post('/setAdds', [App\Http\Controllers\dashboard\setAddsController::class, 'setAdd'])->name('setAdd');
    Route::get('/AddsControl', [App\Http\Controllers\dashboard\setAddsController::class, 'AddControl'])->name('AddControl');
    /*========================================== Add Adds ==========================================*/

    /*==========================================  صفحات الثابتة  /*==========================================*/
    Route::get('/pindpage/all/getpind', [App\Http\Controllers\dashboard\PinnedPagesController::class, 'indexPage'])->name('main_pagess');
    Route::get('/pindpage/create/page/', [App\Http\Controllers\dashboard\PinnedPagesController::class, 'create'])->name('create_Page');
    Route::post('/pindpage/store/page/', [App\Http\Controllers\dashboard\PinnedPagesController::class, 'store'])->name('create_store');
    Route::get('/pindpage/edit/page/{id}', [App\Http\Controllers\dashboard\PinnedPagesController::class, 'edit'])->name('edit_Page');
    Route::post('/pindpage/update/page/{id}', [App\Http\Controllers\dashboard\PinnedPagesController::class, 'update'])->name('update_Page');
    Route::get('/pindpage/delete/page/{id}', [App\Http\Controllers\dashboard\PinnedPagesController::class, 'destroy'])->name('delete_Page');
    /*========================================== نهاية صفحات الثابتة  /*==========================================*/

    /*========================================== صفحةاعلانات  /*==========================================*/
    Route::post('/setAdd', [App\Http\Controllers\dashboard\setAddsController::class, 'setAdd'])->name('setAdd');
    Route::get('/AddControl', [App\Http\Controllers\dashboard\setAddsController::class, 'AddControl'])->name('AddControl');
    /*========================================== نهاية صفحةاعلانات  /*==========================================*/
});


/******************** End Admin Route **********************/




/******************** Main website Route **********************/

Route::get('/' ,  [App\Http\Controllers\frontSite\SiteController::class, 'homePage'])->name('HomePage');
Route::get('/login-page' ,  [App\Http\Controllers\frontSite\SiteController::class, 'loginPage'])->name('toPageLogin');
Route::get('/register-page' ,[App\Http\Controllers\frontSite\SiteController::class, 'registerPage'])->name('toPageRegister');
Route::get('search-advanced/' ,  [App\Http\Controllers\frontSite\SearchAdvancedController::class, 'resultSearch'])->name('searchAdvanced');
Route::get('page/search/' ,  [App\Http\Controllers\frontSite\SiteController::class, 'goPageSearch'])->name('page.search');
Route::get('search/' ,  [App\Http\Controllers\frontSite\SearchIndexController::class, 'searchOfIndex'])->name('showPage.search');
Route::get('{slug}' ,  [App\Http\Controllers\frontSite\SiteController::class, 'getPageCountryUniversity'])->name('getCountryPage.University');
Route::get('{slug}/University/{slug_link}' ,  [App\Http\Controllers\frontSite\SiteController::class, 'viewPageUniversity'])->name('viewPage.university');
Route::get('page/{href}' ,  [App\Http\Controllers\frontSite\SiteController::class, 'getPinnedPage'])->name('viewpinned');
Route::get('{slug}/Universities/' ,  [App\Http\Controllers\frontSite\SiteController::class, 'getAll'])->name('getUniversity.all');

/******************** Main website Route **********************/





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
