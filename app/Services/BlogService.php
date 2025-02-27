<?php

namespace App\Services;

use App\Repositories\BlogRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogService
{
    protected $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function getAllBlogData()
    {
        return [
            'blogs' => $this->blogRepository->getAllBlogs(),
            'featuredBlogs' => $this->blogRepository->countFeaturedBlogs(),
            'activeBlogs' => $this->blogRepository->countActiveBlogs(),
            'inactiveBlogs' => $this->blogRepository->countInactiveBlogs(),
        ];
    }

    public function createBlog(Request $request)
    {
        $fields = $request->validate([
            'title' => 'required',
            'content' => ['required', 'max:10000'],
            'image' => ['image', 'file', 'nullable', 'max:300']
        ]);

        if ($request->hasFile('image')) {
            $fields['image'] = Storage::disk('public')->put('uploads', $request->image);
        }

        return $this->blogRepository->createBlog($fields);
    }

    public function deleteBlog($id)
    {
        return $this->blogRepository->deleteBlog($id);
    }

    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:blogs,id'
        ]);

        return $this->blogRepository->bulkDelete($request->ids);
    }
}
