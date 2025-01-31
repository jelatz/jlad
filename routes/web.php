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
Route::inertia('/blog/wanderladz', 'Blogs/Blogs')->name('blogs');
Route::inertia('/blog/contact-me', 'Blogs/ContactMe')->name('contact-me');
Route::inertia('/blog/newsletter', 'Blogs/Newsletter')->name('newsletter');
Route::inertia('/blog/lifestyle', 'Blogs/Lifestyle')->name('lifestyle');
Route::inertia('/blog/travel', 'Blogs/Travel')->name('travel');
Route::inertia('/blog/newsletter', 'Blogs/Newsletter')->name('newsletter');
