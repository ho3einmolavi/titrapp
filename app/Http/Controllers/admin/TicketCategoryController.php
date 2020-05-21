<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\TicketCategory;
use Illuminate\Http\Request;

class TicketCategoryController extends Controller
{
    public function index()
    {
        $ticketCategories = TicketCategory::latest()->paginate(20);
        return view('admin.ticketCategory.list', compact('ticketCategories'));
    }

    public function create()
    {
        return view('admin.ticketCategory.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $ticket = TicketCategory::create([
            'name' => $request['name'],
        ]);


        if ($ticket) {
            alert()->success('عملیات با موفقیت انجام شد', 'دسته بندی با موفقیت اضافه شد');
            return redirect(route('ticketCategory.index'));
        } else {
            alert()->error('خطای سرور!', 'دسته بندی با موفقیت اضافه نشد');
            return redirect(route('ticketCategory.index'));
        }


    }

    public function edit($id)
    {
        $ticketCategory = TicketCategory::find($id);
        return view('admin.ticketCategory.edit', compact('ticketCategory'));
    }

    public function update(Request $request, TicketCategory $ticketCategory)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $update = $ticketCategory->update([
            'name' => $request['name'],
        ]);


        if ($update) {
            alert()->success('عملیات موفق', 'به روز رسانی با موفقیت انجام شد');
            return redirect(route('ticketCategory.index'));
        } else {
            alert()->error('خطای سرور!', 'به روز رسانی نشد نشد');
            return redirect(route('ticketCategory.index'));
        }

    }

    public function destroy($id)
    {
        $ticketCategory = TicketCategory::find($id);
        $delete = $ticketCategory->delete();
        if ($delete){
            alert()->success('حذف شد!', 'آیتم مورد نظر با موفقیت حذف شد');
            return redirect(route('ticketCategory.index'));
        }
        else{
            alert()->error('خاطای سرور!', 'آیتم مورد نظر با موفقیت حذف نشد');
            return redirect(route('ticketCategory.index'));
        }

    }
}
