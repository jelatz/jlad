<?php

namespace App\Repositories;

use App\Models\Blog;

class BlogRepository
{
    public function getAllBlogs($pagination = 10)
    {
        return Blog::paginate($pagination);
    }

    public function countFeaturedBlogs()
    {
        return Blog::where('isFeatured', true)->count();
    }

    public function countActiveBlogs()
    {
        return Blog::where('isActive', true)->count();
    }

    public function countInactiveBlogs()
    {
        return Blog::where('isActive', false)->count();
    }

    public function createBlog($data)
    {
        return Blog::create($data);
    }

    public function deleteBlog($id)
    {
        $blog = Blog::findOrFail($id);
        return $blog->delete();
    }

    public function bulkDelete($ids)
    {
        return Blog::whereIn('id', $ids)->delete();
    }
}
