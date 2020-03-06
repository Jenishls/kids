<?php

namespace App\Http\Controllers\Blog;

use App\Model\File;
use App\Model\Category;
use App\Model\Blog\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class BlogController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_deleted', 0)->get();
        $blogs = Blog::where('is_deleted', 0)->orderBy('created_at', 'desc')->get();
        foreach ($blogs as $key => $blog) {
            $blog->created_by = User::where('id', $blog->table_id)->first();
        }
        return view(default_template() . ".pages.blog.index", compact('blogs', 'categories'));
    }

    public function addModal()
    {
        // $blog = Blog::where('id', $id)->with('file')->first();

        return view(default_template() . '.pages.blog.inc.addBlogModal', compact('blog'));
    }

    public function addBlogCategoryModal()
    {
        return view(default_template() . '.pages.blog.inc.addBlogCategoryModal');
    }

    public function deleteBlogs(int $id)
    {
        $blog = Blog::find($id);
        $image = File::where('table_name', 'blogs')->where('table_id', $blog->id)->where('is_deleted', 0)->first();
        // dd($image);

        $blog->is_deleted = 1;
        $blog->save();
        if ($image !== null) {

            $image->is_deleted = 1;
            $image->save();
        }

        return $this->index();
    }


    public function viewBlog(int $id)
    {

        $blog = Blog::find($id);
        $image = File::where('table_name', 'blogs')->where('table_id', $blog->id)->where('is_deleted', 0)->first();


        return view(default_template() . '.pages.blog.inc.viewBlog', compact('blog', 'image'));
    }

    public function backRightBlogContent(Request $request)
    {
        $blogs = Blog::with('file')
            ->when($request->input('searchText'), function ($query, $searchedText) {
                return $query->where(function ($where) use ($searchedText) {
                    $where->orWhere('title', "like", "%$searchedText%")
                        ->orWhere('description', 'like', "%$searchedText%");
                });
            })
            ->where('is_deleted', 0)
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($blogs as $key => $blog) {
            $blog->created_by = User::where('id', $blog->table_id)->first();
        }
        return view(default_template() . '.pages.blog.inc.blogRightContent', compact('blogs'));
    }

    public function getCategory()
    {
        $categories = Category::select('id', 'category as text')->where('is_deleted', 0)->get();
        return response()->json($categories);
    }

    public function categoryBlogs(int $id)
    {
        $blogs = Blog::where('category_id', $id)->where('is_deleted', 0)->with('files')->get();
        foreach ($blogs as $key => $blog) {
            $blog->created_by = User::where('id', $blog->table_id)->first();
        }
        return view(default_template() . '.pages.blog.inc.blogRightContent', compact('blogs'));
    }
}
