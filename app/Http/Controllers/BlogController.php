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

    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 10); // Default to 10
        $data = $this->blogService->getAllBlogData($perPage);
        return Inertia::render('Blogs/Dashboard', array_merge($data,[
            'perPage' => $perPage,
        ]));
    }


    public function create(Request $request)
    {
        $this->blogService->createBlog($request);
        return redirect()->route('admin.index')->with(['message', 'Blog created successfully!', 'type', 'success']);
    }

    public function viewBlogs()
    {
        $data = $this->blogService->getAllBlogData();
        return Inertia::render('Blogs/Blogs', $data);
    }

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
