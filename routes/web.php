<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get("/",function(){
    return view("home");
});
Route::resource("posts",PostController::class);
Route::get("/posts/myposts/{user}",[PostController::class,'postByUser'])->name("posts.myposts");
//auth routes
Route::get("/register",[authController::class,'form'])->name("form.register")->middleware("guest");
Route::post("/register",[authController::class,'register'])->name("register")->middleware("guest");
Route::get("/login",[authController::class,'loginForm'])->name("login.form")->middleware("guest");
Route::post("/login",[authController::class,'login'])->name("login")->middleware("guest");
Route::get("/logout",[authController::class,'logout'])->name("logout")->middleware("auth");

//comments routes
Route::post("/comments",[CommentController::class,'store'])->name("comment.store");
Route::get("/comments/{comment}",[CommentController::class,"destroy"])->name("comment.destroy");
Route::get("/comments/edit/{comment}",[CommentController::class,"edit"])->name("comment.edit");
Route::put("/comments/{comment}",[CommentController::class,'update'])->name("comment.update");
