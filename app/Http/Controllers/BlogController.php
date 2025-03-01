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
        return redirect()->route('dashboard')->with(['message', 'Blog created successfully!', 'type', 'success']);
    }

    public function getAllBlog()
    {
        $data = $this->blogService->getAllBlogData();
        return Inertia::render('Blogs/Dashboard', $data);
    }

    // public function getAllBlogForAdmin()
    // {
    //     $data = $this->blogService->getAllBlogData();
    //     return Inertia::render('Admin/Dashboard', $data);
    // }

    public function destroy($id)
    {
        $this->blogService->deleteBlog($id);
        return redirect()->back()->with(['message', 'Blog deleted successfully!', 'type', 'danger']);
    }

    public function bulkDelete(Request $request)
    {
        $this->blogService->bulkDelete($request);
        return redirect()->back()->with('success', 'Blogs deleted successfully!');
    }
}
