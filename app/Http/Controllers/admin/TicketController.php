<?php

namespace App\Http\Controllers\admin;

use App\Enums\TicketStatus;
use App\Enums\TicketType;
use App\Http\Controllers\Controller;
use App\Ticket;
use App\TicketReply;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::Filter()->latest()->paginate(20);
        return view('admin.ticket.list', compact('tickets'));
    }



//    public function create()
//    {
//        return view('admin.ticket.create');
//    }
//
//    public function store(Request $request)
//    {
//        $this->validate($request, [
//            'name' => 'required',
//        ]);
//
//        $ticket = TicketCategory::create([
//            'name' => $request['name'],
//        ]);
//
//
//        if ($ticket) {
//            alert()->success('عملیات با موفقیت انجام شد', 'دسته بندی با موفقیت اضافه شد');
//            return redirect(route('ticketCategory.index'));
//        } else {
//            alert()->error('خطای سرور!', 'دسته بندی با موفقیت اضافه نشد');
//            return redirect(route('ticketCategory.index'));
//        }
//
//
//    }

    public function edit($id)
    {
        $ticket = Ticket::find($id);
        return view('admin.ticket.edit', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $update = $ticket->update([
            'name' => $request['name'],
        ]);

        if ($update) {
            alert()->success('عملیات موفق', 'به روز رسانی با موفقیت انجام شد');
            return redirect(route('ticket.index'));
        } else {
            alert()->error('خطای سرور!', 'به روز رسانی نشد نشد');
            return redirect(route('ticket.index'));
        }

    }

    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        $delete = $ticket->delete();
        if ($delete) {
            alert()->success('حذف شد!', 'آیتم مورد نظر با موفقیت حذف شد');
            return redirect(route('ticket.index'));
        } else {
            alert()->error('خاطای سرور!', 'آیتم مورد نظر با موفقیت حذف نشد');
            return redirect(route('ticket.index'));
        }

    }


    public function replyView($id)
    {

        $replys = TicketReply::where('ticket_id', $id)->oldest()->paginate(20);
        $data = [
            'replys' => $replys,
            'id' => $id
        ];

        return view('admin.ticket.reply', compact('data'));

    }

    public function closeTicket($id)
    {

        $ticket = Ticket::find($id);

        $ticket->update([
            'status' => TicketStatus::closed
        ]);
        alert()->success('عملیات موفق', 'وضعیت تیکت به بسته شده تغییر پیدا کرد');
        return back();
    }


    public function addReply($id, Request $request)
    {
        $this->validate($request, [

        ]);

        $ticket = Ticket::find($id);
        $ticket->update([
            'status' => TicketStatus::adminAnswere
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $filename = Carbon::now()->timestamp . "-{$filename}";
            $path = $request->file('file')->storeAs('ticket', $filename);

        }
        $reply = TicketReply::create([
            'user_id' => auth()->user()->id,
            'ticket_id' => $id,
            'type' =>  !empty($path) ? TicketType::image : TicketType::text ,
            'file' => !empty($path) ? $path : null,
            'body' => $request['body'],
        ]);


        if ($reply) {
            alert()->success('عملیات موفق', 'پاسخ با موفقیت ارسال شد');
            return back();
        } else {
            alert()->success('خطای سرور!', 'لطفا مجددا تلاش کنید');
            return back();
        }

    }
}
