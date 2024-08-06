<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register',[UserController::class,'register']);
Route::post('register',[UserController::class,'store']);
Route::get('login',[UserController::class,'loginForm']);
Route::post('login',[UserController::class,'login']);

Route::get('/worker', function () {
    return view('workers');
});


Route::get('/addemployee', [EmployeeController::class, 'index']);
Route::get('/employee', [EmployeeController::class, 'show']);
Route::post('/employeesave', [EmployeeController::class, 'store']);
Route::get('/deletemployee/{id}', [EmployeeController::class, 'destroy']);
Route::get('/updatemployee/{id}', [EmployeeController::class, 'edit']);
Route::post('/editemployee/{id}', [EmployeeController::class, 'update']);


Route::get('/adddepartment', function () {
    return view('department');
});
Route::post('/submit_form', [DepartmentController::class, 'store']);
Route::get('/department', [DepartmentController::class, 'index']);


Route::get('/adddesignation', [DesignationController::class, 'index']);
Route::post('/subdesignation', [DesignationController::class, 'store']);
Route::get('/designation', [DesignationController::class, 'create']);
