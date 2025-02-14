<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
    }
}
