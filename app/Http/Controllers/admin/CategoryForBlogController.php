<?php

namespace App\Http\Controllers\admin;

use App\CategoryForBlog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryForBlogController extends Controller
{
    public function index()
    {
        $cats = CategoryForBlog::where('parent_id', 0)->latest()->paginate(20);
        return view('admin.catsForBlogs.list', compact('cats'));
    }

    public function sub($id)
    {
        $cats = CategoryForBlog::where('parent_id', $id)->latest()->paginate(20);
        return view('admin.catsForBlogs.list', compact('cats'));
    }

    public function create()
    {
        return view('admin.catsForBlogs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'parent_id' => 'required',
        ]);

        CategoryForBlog::create([
            'name' => $request['name'],
            'parent_id' => $request['parent_id'],
            'category_id' => $request['category_id'],
        ]);


        alert()->success('عملیات با موفقیت انجام شد', 'تخصص با موفقیت اضافه شد');
        return back();

    }

    public function edit($id)
    {
        $skil = CategoryForBlog::find($id);
        return view('admin.catsForBlogs.edit', compact('skil'));
    }

    public function update($id , Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'parent_id' => 'required',

        ]);

        $cat = CategoryForBlog::find($id);

        $cat->update([
            'name' => $request['name'],
            'parent_id' => $request['parent_id'],
            'category_id' => $request['category_id'],
        ]);

        alert()->success('عملیات موفق', 'ویرایش با موفقیت انجام شد');

        return back();
    }

    public function destroy($id)
    {
        $skil = CategoryForBlog::find($id);

        $subs = CategoryForBlog::where('parent_id', $id)->get();

        if (count($subs))
        {
            foreach ($subs as $sub) {
                $sub->delete();
            }
        }


        $skil->delete();
        alert()->info('حذف شد!', 'آیتم مورد نظر با موفقیت حذف شد');
        return back();
    }
}
