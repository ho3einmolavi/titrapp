<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::latest()->paginate(20);
        return view('admin.plan.list', compact('plans'));
    }

    public function create()
    {
        return view('admin.plan.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
            'dayCount' => 'required',
        ]);

        $price = str_replace(',', '', $request['price']);

        Plan::create([
            'title' => $request['title'],
            'price' => $price,
            'dayCount' => $request['dayCount'],
        ]);

        alert()->success('عملیات با موفقیت انجام شد', 'پلن با موفقیت اضافه شد');
        return redirect(route('plan.index'));

    }

    public function edit($id)
    {
        $plan = Plan::find($id);
        return view('admin.plan.edit', compact('plan'));
    }

    public function update(Request $request, Plan $plan)
    {
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
            'dayCount' => 'required',
        ]);

        $price = str_replace(',', '', $request['price']);
        $plan->update([
            'title' => $request['title'],
            'price' => $price,
            'dayCount' => $request['dayCount'],
        ]);

        alert()->success('عملیات موفق', 'ویرایش با موفقیت انجام شد');

        return redirect(route('plan.index'));
    }

    public function destroy($id)
    {
        $plan = Plan::find($id);

        $plan->delete();
        alert()->info('حذف شد!', 'آیتم مورد نظر با موفقیت حذف شد');
        return redirect(route('plan.index'));
    }
}
