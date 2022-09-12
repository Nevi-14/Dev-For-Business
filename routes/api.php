<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\users;
use App\Http\Controllers\companies;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// USERS APIs

Route::get('get/users', [users::class, 'getUsers']);
Route::get('get/user/{email}', [users::class, 'login']);
Route::post('post/user', [users::class, 'postUser']);
Route::put('put/user', [users::class, 'putUser']);
Route::put('put/password-reset', [users::class, 'putResetPassword']);
Route::delete('delete/user/{email}', [users::class, 'deleteUser']);



// COMPANIES APIs



Route::get('get/company/{id}', [companies::class, 'getCompany']);
Route::get('get/companies', [companies::class, 'getCompanies']);
Route::post('post/company', [companies::class, 'postCompany']);
Route::put('put/company', [companies::class, 'putCompany']);
Route::delete('delete/company/{id}', [companies::class, 'deleteCompany']);

