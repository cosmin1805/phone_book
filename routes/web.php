<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Models\phone_numbers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    $phones = DB::select('select * from phone_numbers where user = ?',[Auth::user()->name]);
    return view('welcome',['phoneNumbers'=>$phones]);
})->middleware('auth');

Route::post('/savePhone', [PostsController::class,'savePhone'])->middleware(['auth'])->name('savePhone');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
