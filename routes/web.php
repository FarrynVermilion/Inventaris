<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MaintenanceController;
use App\Models\Maintenance;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::get('register', [UserController::class,'register'])->name('register');
    Route::post('createUser', [UserController::class,'create'])->name('create');
    Route::get('user.index', [UserController::class,'index'])->name('user.index');
    Route::resource('user', UserController::class);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
    Route::resource('ruang', RuangController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('aset', AsetController::class);
    Route::resource('maintenance', MaintenanceController::class);
    Route::get('aset.jual', [AsetController::class,'jual'])->name('aset.jual');
    Route::get('aset.susut', [AsetController::class,'susut'])->name('aset.susut');
    Route::get('aset.musnah', [AsetController::class,'musnah'])->name('aset.musnah');
    Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

