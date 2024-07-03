<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// profile update

Route::get('/profile',[ProfileController::class,'profiles'])->name('profile');
Route::post('/profile/name/update/{id}',[ProfileController::class,'name_update'])->name('profile.name');
Route::post('/profile/email/update/{id}',[ProfileController::class,'email_update'])->name('profile.email');
Route::post('/profile/password/update/{id}',[ProfileController::class,'password_update'])->name('profile.password');
Route::post('/profile/image/update/{id}',[ProfileController::class,'image_update'])->name('profile.image');

// category area

Route::get('/category',[CategoryController::class,'categories'])->name('category');
// road for insert
Route::post('/category/insert',[CategoryController::class,'insert'])->name('category.insert');
// delet data
Route::post('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
//change status
Route::post('/category/status/update/{id}',[CategoryController::class,'status'])->name('category.status');
// category edit slug
Route::get('/category/edit/{slug}',[CategoryController::class,'edit_view'])->name('category.edit.view');
// category id
Route::post('/category/edit/update/{id}',[CategoryController::class,'category_edit'])->name('category.edit');

// Tagg -mc --->>>>>

Route::get('/tags',[TagController::class,'tags'])->name('tags');
// tag delet
Route::post('/tags/delete/{id}',[TagController::class,'tags_delete'])->name('tags.delete');
// tag insert
Route::post('/tags/insert',[TagController::class,'tags_insert'])->name('tags.insert');
// restore
Route::post('/tags/restore/{id}',[TagController::class,'restore'])->name('tags.restore');
// force delet
Route::post('/tags/forcedelet/{id}',[TagController::class,'forcedelet'])->name('tags.forcedelet');
// status chnaging
Route::post('/tags/status/update/{id}',[TagController::class,'status_update'])->name('tags.status.update');


// blogs item

Route::get('/blog',[BlogController::class,'blog'])->name('blog');
Route::get('/blog/create',[BlogController::class,'blog_create'])->name('blog.create');
//insert blogs
Route::post('/blog/create/insert',[BlogController::class,'blog_insert'])->name('blog.insert');

// delet blogs on time no permatent
Route::post('/blog/create/delete/{id}',[BlogController::class,'delete_blog'])->name('blog.delete');

// restore items
Route::post('/blog/create/restore/{id}',[BlogController::class,'restore_blog'])->name('blog.restore');

// permanent delet

Route::post('/blog/create/force/delete/{id}',[BlogController::class,'force_delete'])->name('blog.force.delete');


