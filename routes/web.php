<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MemberController;
//use Intervention\Image;
/*
 *
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
    return view('home');
});
Route::get("/images",function (){
    $img  = Image::make(public_path("img\d.jpg"))->resize(80,80)->save(public_path("upload\d4.jpg"),100);
    return $img->response();
});
Route::get("/loginAdmin",[DoctorController::class,"loginAdmin"])->name("loginAdmin")->middleware("BackHistory");
Route::post("/serverLoginFormDoctor",[DoctorController::class,"serverLoginFormDoctor"])->name("serverLoginFormDoctor")->middleware("BackHistory");
Route::group(["middleware"=>["auth","Doctor","BackHistory"]],function(){
    Route::post('/logout',[DoctorController::class,"logout"])->name("logoutDoctorLeader");
    Route::get('/dashboard',[DoctorController::class,"dashboard"])->name("dashboard");
    Route::get('/dashboard/member',[MemberController::class,"pageMember"])->name("member");
    Route::get("/dashboard/memberTable",[MemberController::class,'index'])->name("index");
    Route::post("/dashboard/memberStore",[MemberController::class,'store']);
    Route::post("/dashboard/edit/{id}",[MemberController::class,'editUpdate'])->name("edit-doctor");
    Route::patch("/dasboard/update-doctor/{id}",[MemberController::class,'update'])->name("update.doctor");
    Route::delete("/dasboard/delete-doctor/{id}",[MemberController::class,'destroy'])->name("del-doctor");
});
