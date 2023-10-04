<?php

use App\User;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', function(){
    $users=User::all();//elequent ORM
   // $users=DB::table('users')->get();//query builder
    return view('home',compact('users'));
})->name('home')->middleware(['auth']);


Route::get('/Category', [CategoryController::class, 'index'])->name('AllCategory');
Route::post('/category/add', [CategoryController::class, 'store'])->name('store.category');
Route::get('Category/edit/{id}', [CategoryController::class, 'edit']);
Route::post('Category/update/{id}', [CategoryController::class, 'update']);
Route::get('Category/restore/{id}', [CategoryController::class, 'restore']);
Route::get('Category/pdelete/{id}', [CategoryController::class, 'pdelete']);
Route::get('Category/softdelete/{id}', [CategoryController::class, 'SoftDelete']);
Route::get('/brand', [BrandController::class, 'index'])->name('AllBrands');
Route::post('/brand/add', [BrandController::class, 'store'])->name('store.brand');
Route::get('brand/edit/{id}', [BrandController::class, 'edit']);
Route::post('brand/update/{id}', [BrandController::class, 'update']);
Route::get('brand/delete/{id}', [BrandController::class, 'destroy']);
Route::get('/multi/add', [BrandController::class, 'Multpic'])->name('MultiImage');
Route::post('/multi/store', [BrandController::class, 'StoreImg'])->name('store.img');
