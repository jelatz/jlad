<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function create(Request $request)
    {
        // Validate
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        // Insert to database
        Blog::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect()->route('dashboard')->with('success', 'Blog created successfully!');
    }
}
