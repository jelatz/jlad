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
Route::inertia('wanderladz/about', 'Blogs/About')->name('about');
Route::inertia('/wanderladz', 'Blogs/Blogs')->name('blogs');
Route::inertia('/wanderladz/contact-me', 'Blogs/ContactMe')->name('contact-me');
Route::inertia('/wanderladz/newsletter', 'Blogs/Newsletter')->name('newsletter');
Route::inertia('/wanderladz/lifestyle', 'Blogs/Lifestyle')->name('lifestyle');
Route::inertia('/wanderladz/travel', 'Blogs/Travel')->name('travel');
Route::inertia('/wanderladz/newsletter', 'Blogs/Newsletter')->name('newsletter');
Route::inertia('wanderladz/admin', 'Blogs/Admin')->name('admin');
Route::get('/wanderladz/admin/dashboard', [BlogController::class, 'getAllBlog'])->name('dashboard');
Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('deleteBlog');


Route::post('/wanderladz/addBlog', [BlogController::class, 'create'])->name('addBlog');
