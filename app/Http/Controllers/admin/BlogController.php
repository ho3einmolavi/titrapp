<?php

namespace App\Http\Controllers\admin;

use App\Blog;
use App\Category;
use App\CategoryForBlog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs= Blog::latest()->paginate(20);
        return view('admin.blog.list', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_for_blog_id' => 'required',
            'title' => 'required',
        ]);


        Blog::create([
            'category_for_blog_id' => $request['category_for_blog_id'],
            'title' => $request['title'],
            'body' => $request['body'],
            'image' => $request['image'],
            'video' => $request['video'],
        ]);
        alert()->success('عملیات با موفقیت انجام شد', 'نوشته با موفقیت اضافه شد');
        return redirect(route('blog.index'));

    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required',
        ]);

        $blog->update([
            'category_id' => $request['category_id'],
            'title' => $request['title'],
            'body' => $request['body'],
            'image' => $request['image'],
            'video' => $request['video'],
        ]);
        alert()->success('عملیات موفق', 'ویرایش با موفقیت انجام شد');
        return redirect(route('blog.index'));
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        alert()->info('حذف شد!', 'آیتم مورد نظر با موفقیت حذف شد');
        return redirect(route('blog.index'));
    }
}
