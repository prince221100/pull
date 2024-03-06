<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::post('/login',[UserController::class,'login'])->name('login');
Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard');

Route::get('/logout',[UserController::class,'logout'])->name('logout');

// Forgot password :-

Route::get('/forgot-password',[UserController::class,'forgotpassword'])->name('forgot_password');
Route::post('/forgot',[UserController::class,'forgot'])->name('forgot');

Route::get('/reset_password/{token}',[UserController::class,'reset_password'])->name('reset_password');
Route::post('/reset',[UserController::class,'reset'])->name('reset');

// Employee Add :-
Route::get('/add-employee',[UserController::class,'add_employee'])->name('add_employee');
Route::post('/add_employeedata',[UserController::class,'add_employeedata'])->name('add_employeedata');

// Employee View :-
Route::get('/show-employee',[UserController::class,'show_employee'])->name('show_employee');

// Profile page :
Route::get('/profile',[UserController::class,'profile'])->name('profile');
Route::post('/profile_update',[UserController::class,'profile_update'])->name('profile_update');

// Delete Employee :-
Route::get('/delete-employee/{id}',[UserController::class,'delete_employee']);

// delete Employee :-
Route::get('/edit-employee/{id}',[UserController::class,'edit_employee']);
Route::put('/edit_employeedata/{id}',[UserController::class,'edit_employeedata'])->name('edit_employeedata');

// Download CSV:-
Route::get('/generate-csv',[UserController::class,'generate_csv'])->name('generate.csv');

// pdf send in email:-
Route::get('/pdf', [UserController::class, 'send_email_pdf']);


//rules
Route::get('rules', [RuleController::class, 'index'])->name('rules.list');
Route::get('rules/add', [RuleController::class, 'create'])->name('rules.add');
Route::post('rules/store', [RuleController::class, 'store'])->name('rules.store');
Route::get('rules/edit/{id}', [RuleController::class, 'edit'])->name('rules.edit');
Route::post('rules/update/{id}', [RuleController::class, 'update'])->name('rules.update');
Route::get('rules/delete/{id}', [RuleController::class, 'destroy'])->name('rules.delete');
