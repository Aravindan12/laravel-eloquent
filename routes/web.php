<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\TestController;
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
Route::get('get-image', [SampleController::class,'getImage']);
Route::get('get-lower-case', [SampleController::class,'gettingLowerCaseValue']);
Route::get('get-upper-case', [SampleController::class,'addingUpperCaseValue']);
Route::get('get-scope-records', [SampleController::class,'getScopeRecords']);
Route::get('add-user', [SampleController::class,'addUsers']);
Route::get('get-comments', [SampleController::class,'getComments']);
Route::get('delete-user/{id}', [SampleController::class,'deleteUser']);
Route::get('add-post', [SampleController::class,'addPost']);


Route::get('/sender-msg', [TestController::class,'sender']);
Route::post('sender', [TestController::class,'sendMessage']);
Route::get('/receiver', [TestController::class,'receiver']);