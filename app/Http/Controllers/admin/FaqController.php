<?php

namespace App\Http\Controllers\admin;

use App\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::latest()->paginate(20);
        return view('admin.faq.list', compact('faqs'));
    }
    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'required',
            'answere' => 'required',
        ]);
        Faq::create([
            'question' => $request['question'],
            'answere' => $request['answere'],
        ]);
        alert()->success('عملیات با موفقیت انجام شد', 'سوال متداول با موفقیت اضافه شد');
        return redirect(route('faq.index'));
    }

    public function edit($id)
    {
        $faq = Faq::find($id);
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq )
    {
        $this->validate($request, [
            'question' => 'required',
            'answere' => 'required',
        ]);
        $faq->update([
            'question' => $request['question'],
            'answere' => $request['answere'],
        ]);
        alert()->success('عملیات موفق', 'به روز رسانی با موفقیت انجام شد');
        return redirect(route('faq.index'));
    }

    public function destroy($id)
    {
        $faq = Faq::find($id);
        $faq->delete();
        alert()->info('حذف شد!', 'آیتم مورد نظر با موفقیت حذف شد');
        return redirect(route('city.index'));
    }
}
