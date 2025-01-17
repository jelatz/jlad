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
Route::inertia('/about', 'About')->name('about');
Route::inertia('/projects', 'Projects')->name('projects');
Route::inertia('/blog', 'Blogs/Blog')->name('blog');
Route::inertia('/contact-me', 'ContactMe')->name('contact-me');
