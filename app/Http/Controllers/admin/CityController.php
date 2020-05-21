<?php

namespace App\Http\Controllers\admin;

use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::Filter()->latest()->paginate(20);
        return view('admin.city.list', compact('cities'));
    }
    public function filter()
    {
        $cities = City::Filter()->latest()->paginate(200);
        return view('admin.city.list', compact('cities'));
    }
    public function create()
    {
        return view('admin.city.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'province_id' => 'required',
        ]);
        City::create([
            'name' => $request['name'],
            'province_id' => $request['province_id'],
            'agency' => $request['agency'] == 1 ? true : false,
        ]);
        alert()->success('عملیات با موفقیت انجام شد', 'شهر با موفقیت اضافه شد');
        return redirect(route('city.index'));
    }

    public function edit($id)
    {
        $city = City::find($id);
        return view('admin.city.edit', compact('city'));
    }

    public function update(Request $request, City $city )
    {
        $this->validate($request, [
            'name' => 'required',
            'province_id' => 'required',
        ]);
        $city->update([
            'name' => $request['name'],
            'province_id' => $request['province_id'],
            'agency' => $request['agency'] == 1 ? true : false,
        ]);

        alert()->success('عملیات موفق', 'به روز رسانی با موفقیت انجام شد');

        return redirect(route('city.index'));
    }

    public function destroy($id)
    {
        $city = City::find($id);
        $city->delete();
        alert()->info('حذف شد!', 'آیتم مورد نظر با موفقیت حذف شد');
        return redirect(route('city.index'));
    }
}
