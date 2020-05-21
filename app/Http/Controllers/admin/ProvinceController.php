<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index()
    {
        $provinces = Province::latest()->paginate(20);
        return view('admin.province.list', compact('provinces'));
    }

    public function create()
    {
        return view('admin.province.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        Province::create([
            'name' => $request['name'],
        ]);
        alert()->success('عملیات با موفقیت انجام شد', 'استان با موفقیت اضافه شد');
        return redirect(route('province.index'));
    }

    public function edit($id)
    {
        $province = Province::find($id);
        return view('admin.province.edit', compact('province'));
    }

    public function update(Request $request, Province $province )
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $province->update([
            'name' => $request['name'],
        ]);

        alert()->success('عملیات موفق', 'به روز رسانی با موفقیت انجام شد');

        return redirect(route('province.index'));
    }

    public function destroy($id)
    {
        $province = Province::find($id);
        $province->delete();
        alert()->info('حذف شد!', 'آیتم مورد نظر با موفقیت حذف شد');
        return redirect(route('province.index'));
    }
}
