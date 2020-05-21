<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Skil;
use Illuminate\Http\Request;

class SkilController extends Controller
{
    public function index()
    {
        $skils = Skil::where('parent_id', 0)->latest()->paginate(20);
        return view('admin.skil.list', compact('skils'));
    }

    public function subskil($id)
    {
        $skils = Skil::where('parent_id', $id)->latest()->paginate(20);
        return view('admin.skil.list', compact('skils'));
    }

    public function create()
    {
        return view('admin.skil.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'parent_id' => 'required',
        ]);

            Skil::create([
                'name' => $request['name'],
                'parent_id' => $request['parent_id'],
                'category_id' => $request['category_id'],
                'image' => $request['image'],
            ]);


        alert()->success('عملیات با موفقیت انجام شد', 'تخصص با موفقیت اضافه شد');
        return redirect(route('skil.index'));

    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Skil $skil)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'parent_id' => 'required',

        ]);


        $skil->update([
            'name' => $request['name'],
            'parent_id' => $request['parent_id'],
            'category_id' => $request['category_id'],
            'image' => $request['image'],
        ]);

        alert()->success('عملیات موفق', 'ویرایش با موفقیت انجام شد');

        return redirect(route('skil.index'));
    }

    public function destroy($id)
    {
        $skil = Skil::find($id);

        $subs = Skil::where('parent_id', $id)->get();

        if (count($subs))
        {
            foreach ($subs as $sub) {
                $sub->delete();
            }
        }


        $skil->delete();
        alert()->info('حذف شد!', 'آیتم مورد نظر با موفقیت حذف شد');
        return redirect(route('skil.index'));
    }
}
