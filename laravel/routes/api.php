<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);

Route::middleware('auth:sanctum')->group(function () {



Route::get("course",[CourseController::class,"index"]);
Route::post("course",[CourseController::class,"store"]);
// Route::delete("course",[CourseController::class,"destroy"]);



});
