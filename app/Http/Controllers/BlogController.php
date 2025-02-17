<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function create(Request $request)
    {

        // Validate
        $fields = $request->validate([
            'title' => 'required',
            'content' => ['required', 'max:1000'],
            'image' => ['image', 'file', 'nullable', 'max:300']
        ]);

        // check if there is an uploaded image
        if ($request->hasFile('image')) {
            $fields['image'] = Storage::disk('public')->put('uploads', $request->image);
        };

        // Insert to database
        Blog::create($fields);

        return redirect()->route('admin')->with('success', 'Blog created successfully!');
    }
}
