<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Blog\Blog;
use App\Model\Category;

class StoreBlogController extends BlogController
{
    use \App\Traits\Blogs\BlogFile;

    public function create(Request $request)
    {

        $this->validateBlog($request);
        $blog = Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'table_name' => 'users',
            'table_id' => auth()->id(),
            'category_id' => $request->category,
        ]);
        $request->has('file') ? $this->file($request, $blog->id) : '';
        return $this->index();
    }

    public function Category(Request $request)
    {
        $this->validateCategory($request);
        $category = Category::create([
            'category' => $request->category,
        ]);

        return response(['success' => 'Successfully created category'], 200);
    }

    protected function file($request, $id)
    {
        $image = upload_file($request, "/app/blog");
        $this->createImage($image, $id);
    }

    public function validateBlog($request)
    {
        $rules = validation_value('addBlogForm');
        return $this->validate($request, $rules);
    }

    public function validateCategory($request)
    {
        return  $request->validate([
            'category' => 'required|unique:categories',
        ]);
    }

    public function storeBlogCategory(Request $request)
    {
        $request->validate([
            'category' => 'required|unique:categories',
        ]);
        $category = Category::create([
            'category' => $request->category,
        ]);

        return response(['success' => 'Successfully created category'], 200);
    }
}
