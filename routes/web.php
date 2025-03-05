<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return Inertia::render('Home');
// });
// sleep(1);
Route::inertia('/', 'Home')->name('home');
Route::inertia('/projects', 'Projects')->name('projects');

// Blogs route
Route::get('/wanderladz', [BlogController::class, 'viewBlogs'])->name('blogs.index');
Route::inertia('wanderladz/about', 'Blogs/About')->name('about');
Route::inertia('/wanderladz/contact-me', 'Blogs/ContactMe')->name('contact-me');
Route::inertia('/wanderladz/newsletter', 'Blogs/Newsletter')->name('newsletter');
Route::inertia('/wanderladz/lifestyle', 'Blogs/Lifestyle')->name('lifestyle');
Route::inertia('/wanderladz/travel', 'Blogs/Travel')->name('travel');
Route::inertia('/wanderladz/newsletter', 'Blogs/Newsletter')->name('newsletter');

// Admin route
Route::get('/wanderladz/admin', [BlogController::class, 'index'])->name('admin.index');
Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('deleteBlog');

Route::post('/blogs/bulk-delete', [BlogController::class, 'bulkDelete'])->name('blogs.bulkDelete');


Route::post('/wanderladz/addBlog', [BlogController::class, 'create'])->name('addBlog');
