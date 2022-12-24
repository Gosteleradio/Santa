<?php
//phpinfo();

use App\Http\Controllers\HomeController as HomeIndexController;
use App\Http\Controllers\ProfileController as AdminProfileController;
use \App\Http\Controllers\Admin\UsersController as AdminUsersController;
use \App\Http\Controllers\SocialiteController as SocialiteLoginController;
use \App\Http\Controllers\Santa\SantaController as SantaIndexController;
use Illuminate\Support\Facades\Route;

///*
//|--------------------------------------------------------------------------
//| Web Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register web routes for your application. These
//| routes are loaded by the RouteServiceProvider within a group which
//| contains the "web" middleware group. Now create something great!
//|
//*/


//Route Main page
Route::get('/', [HomeIndexController::class, 'index'])->name("home");
//Loggin zone
Route::match(['get', 'post'], '/profile', [AdminProfileController::class, 'update'])->name('updateProfile')->middleware('auth');


//Vk routes
Route::get('/auth/vk', [SocialiteLoginController::class, 'loginVk'])->name("vkLogin")->middleware('guest');
Route::get('/auth/vk/response', [SocialiteLoginController::class, 'responseVk'])->name("vkResponse")->middleware('guest');
//Github routes
Route::get('/auth/github', [SocialiteLoginController::class, 'loginGithub'])->name("loginGithub")->middleware('guest');
Route::get('/auth/github/response', [SocialiteLoginController::class, 'responseGithub'])->name("responseGithub")->middleware('guest');


Route::prefix('users')->
name('users.')->
namespace('Users')->
group(function(){
    Route::get('/', [AdminUsersController::class, 'index'])->name("index");
});
//Santa Routes
Route::name('santa.')->
prefix('santa')->
namespace('Santa')->
group(function(){

 //   Route::resource('/', SantaIndexController::class)->except(['show']);
    Route::get('/', [SantaIndexController::class, 'index'])->name("index");

    //CRUD routes Santa
    Route::match(['get', 'post'], '/create', [SantaIndexController::class, 'create'])->name('create');
    Route::post( '/', [SantaIndexController::class, 'store'])->name('store');
    Route::get( '/edit/{santa}', [SantaIndexController::class, 'edit'])->name('edit');
    Route::put( '/update/{santa}', [SantaIndexController::class, 'update'])->name('update');
    Route::delete( '/destroy/{santa}', [SantaIndexController::class, 'destroy'])->name('destroy');

});

//Auth routes
Auth::routes();
Route::get('/home', [HomeIndexController::class, 'index'])->name('home');


