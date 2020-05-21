<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $ctegories = Category::latest()->paginate(20);
        return view('admin.category.list', compact('ctegories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request )
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        Category::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'image' => $request['filepath'],
            'sort' => $request['sort'],
        ]);

        alert()->success('عملیات با موفقیت انجام شد', 'دسته بندی با موفقیت اضافه شد');
        return redirect(route('category.index'));

    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required',

        ]);
        $category->update([
            'name' => $request['name'],
            'image' => $request['filepath'],
            'description' => $request['description'],
            'sort' => $request['sort'],
        ]);
        alert()->success('عملیات موفق', 'ویرایش با موفقیت انجام شد');
        return redirect(route('category.index'));
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        alert()->info('حذف شد!', 'آیتم مورد نظر با موفقیت حذف شد');
        return redirect(route('category.index'));
    }
}
