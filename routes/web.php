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
Route::inertia('/about', 'About', ['user' => 'Michael']);
Route::inertia('/projects', 'Projects')->name('projects');
Route::inertia('/blog', 'Blog')->name('blog');
