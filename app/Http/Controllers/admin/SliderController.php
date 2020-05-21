<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->paginate(20);
        return view('admin.slider.list', compact('sliders'));
    }


    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request )
    {
        $this->validate($request, [
            'background' => 'required',
            'sort' => 'required',
        ]);
        Slider::create([
            'title' => $request['title'],
            'button' => $request['button'],
            'background' => $request['background'],
            'link' => $request['link'],
            'sort' => $request['sort'],
        ]);

        alert()->success('عملیات با موفقیت انجام شد', 'دسته بندی با موفقیت اضافه شد');
        return redirect(route('slider.index'));

    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'background' => 'required',
            'sort' => 'required',

        ]);
        $slider->update([
            'title' => $request['title'],
            'button' => $request['button'],
            'background' => $request['background'],
            'link' => $request['link'],
            'sort' => $request['sort'],
        ]);
        alert()->success('عملیات موفق', 'ویرایش با موفقیت انجام شد');
        return redirect(route('slider.index'));
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        alert()->info('حذف شد!', 'آیتم مورد نظر با موفقیت حذف شد');
        return redirect(route('slider.index'));
    }
}
