<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\AsetDihanguskanController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\RusakController;
use App\Http\Controllers\PenggunaanController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use illuminate\Auth\Events\PasswordReset;

Route::get('/', function () {
    if(Auth::check()){
        return redirect()->route('home');
    }
    return view('welcome');
});

Route::get('/forgot-password', function () {
    return view('auth.passwords.email');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::ResetLinkSent
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.verify', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
    $request->only('email', 'password', 'password_confirmation', 'token'),
    function (User $user, string $password) {
        $user->forceFill([
            'password' => Hash::make($password)
        ])->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));
    }
);

    return $status === Password::PasswordReset
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
    Route::resource('ruang', RuangController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('aset', AsetController::class);
    Route::resource('penggunaan', PenggunaanController::class);
    Route::resource('rusak', RusakController::class);
    Route::resource('maintenance', MaintenanceController::class);
    Route::resource('asetDihanguskan', AsetDihanguskanController::class);
    Route::get('download/{file}', [AsetDihanguskanController::class,'download'])->name('download');
    Route::resource('peminjam', PeminjamController::class);
    Route::resource('peminjaman', PeminjamanController::class);
    Route::resource('pengembalian', PengembalianController::class);
    Route::get('asetPDF',[PDFController::class,'asetPDF'])->name('asetPDF');
    Route::get('tidakDigunakanPDF',[PDFController::class,'tidakDigunakanPDF'])->name('tidakDigunakanPDF');
    Route::get('rusakPDF',[PDFController::class,'rusakPDF'])->name('rusakPDF');
    Route::get('musnahPDF',[PDFController::class,'musnahPDF'])->name('musnahPDF');
    Route::get('user.index', [UserController::class,'index'])->name('user.index');

    Route::get('register', [UserController::class,'register'])->name('register')->middleware('user-access:Super_user');
    Route::post('createUser', [UserController::class,'create'])->name('create')->middleware('user-access:Super_user');
    Route::get('user.passwordEdit/{id}', [UserController::class,'passwordEdit'])->name('user.passwordEdit')->middleware('user-access:Super_user');
    Route::get('user.destroy/{id}', [UserController::class,'destroy'])->name('user.destroy')->middleware('user-access:Super_user');
    Route::get('user.edit/{id}', [UserController::class,'edit'])->name('user.edit')->middleware('user-access:Super_user');
    Route::post('user.update/{id}', [UserController::class,'update'])->name('user.update')->middleware('user-access:Super_user');
    // Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});
