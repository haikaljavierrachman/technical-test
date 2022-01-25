<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Models\Staff;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('index', [
        'staffs' => Staff::all()
    ]);
});

Route::resource('/staff', StaffController::class);
