<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return Inertia::render('Home');
// });
Route::inertia('/', 'Home')->name('home');
Route::inertia('/projects', 'Projects')->name('projects');
// Blogs route
Route::inertia('/about', 'Blogs/About')->name('about');
Route::inertia('/blog', 'Blogs/Blog')->name('blog');
Route::inertia('/contact-me', 'Blogs/ContactMe')->name('contact-me');
Route::inertia('/newsletter', 'Blogs/Newsletter')->name('newsletter');
