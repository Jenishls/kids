<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Blog\Blog;


class EditBlogController extends BlogController
{

    use \App\Traits\Blogs\BlogFile;

    public function editModal($id)
    {
        $blog = Blog::where('id', $id)->with('file')->first();
        return view(default_template() . '.pages.blog.inc.editBlogModal', compact('blog'));
    }

    public function editBlogs(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $blog->update([
            'title' => $request->title,
            'category_id' => $request->category,
            'description' => $request->description,
            'table_name' => 'users',
            'table_id' => auth()->id(),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        if ($request->has('file')) {
            $image = upload_file($request, "/app/blog");
            $this->updateOrCreateFile($image, $blog);
        }
        return $this->index();
    }
}
