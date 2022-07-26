<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AdminPageController,StorePageController,AuthContoller,StoreController};
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

Route::get('/',[AuthContoller::class,"login"])->name('login')->middleware('authcheck');
Route::post('/login',[AuthContoller::class,"logincheck"])->name('logincheck');
Route::get('/logout',[AuthContoller::class,"logout"])->name('logout');
Route::get('/test',function (Request $req)
{
    // $user=User::find($req->id);
    // $user->update([
    //     "password"=>Hash::make($req->pass)
    // ]);
    // return "password updated ".$user->name;
    // $req->session()->forget('login');
    // return redirect(route('login'));
})->name('test');
// Auth::routes();
// StoreAuth::routes();

//admin routes
Route::prefix('admin')->group(function () {
    Route::middleware(['auth'])->group(function () {
        //
        Route::get('/home', [AdminPageController::class, 'index'])->name('adminhome');
        //store create
        Route::get('/store', [AdminPageController::class, 'store'])->name('storecreate');
        //store list
        Route::get('/storelist', [StoreController::class, 'index'])->name('storelist');
        //store update
        Route::get('/storedite/{id}', [AdminPageController::class, 'storeedite'])->name('storeedite');
        Route::post('/storeedite/{id}', [StoreController::class, 'update'])->name('storedite');
        //store delate
        Route::get('/storedelete/{id}', [StoreController::class, 'destroy'])->name('storedelate');
});
});


//store admin
Route::prefix('store')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/home', [StorePageController::class, 'index'])->name('storehome');
        Route::get('/usersmange', [StorePageController::class, 'store'])->name('storeusersmange');
    });
});
