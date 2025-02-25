<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogController extends Controller
{
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function create(Request $request)
    {
        $this->blogService->createBlog($request);
        return redirect()->route('dashboard');
    }

    public function getAllBlog()
    {
        $data = $this->blogService->getAllBlogData();
        return Inertia::render('Blogs/Dashboard', $data);
    }

    public function getAllBlogForAdmin()
    {
        $data = $this->blogService->getAllBlogData();
        return Inertia::render('Admin/Dashboard', $data);
    }

    public function destroy($id)
    {
        $this->blogService->deleteBlog($id);
        return redirect()->back()->with('success', 'Blog deleted successfully!');
    }
}
