<?php

namespace App\Http\Controllers\user;

use App\Enums\TicketStatus;
use App\Enums\TicketType;
use App\Http\Controllers\Controller;
use App\Ticket;
use App\TicketReply;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function ticket()
    {
        return view('user.ticket.ticket');
    }

    public function tickets()
    {
        $tickets = Ticket::where('user_id',auth()->user()->id)->latest()->paginate(10);
        return view('user.ticket.tickets' , compact('tickets'));
    }

    public function storeTicket(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);



        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $filename = Carbon::now()->timestamp . "-{$filename}";
            $path = $request->file('file')->storeAs('ticket', $filename);

        }

      $ticket=  Ticket::create([
            'user_id' => auth()->user()->id,
            'file' => !empty($path) ? $path : '',
            'title' => $request['title'],
            'body' => $request['body'],
            'category_id' => $request['category_id'],
            'priority' => $request['priority'],
            'status'=>TicketStatus::waiting,
        ]);

        TicketReply::create([
            'user_id' => auth()->user()->id,
            'ticket_id' => $ticket->id,
            'file' => !empty($path) ? $path : '',
            'body' => $request['body'],
            'type'=>!empty($path)? TicketType::image : TicketType::text
        ]);

        alert()->success('عملیات موفق', 'تیکت با موفقیت ارسال شد');
        return redirect('/user/tickets');
    }

    public function reply($id)
    {

        $replys = TicketReply::where('ticket_id', $id)->latest()->paginate(10);
        $data = [
            'replys' => $replys,
            'ticket_id' => $id
        ];

        return view('user.ticket.reply', compact('data'));

    }

    public function storeReply(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $filename = Carbon::now()->timestamp . "-{$filename}";
            $path = $request->file('file')->storeAs('ticket', $filename);

        }
        TicketReply::create([
            'user_id' => auth()->user()->id,
            'ticket_id' => $request['ticket_id'],
            'file' => !empty($path) ? $path : '',
            'body' => $request['body'],
            'type'=>!empty($path)? TicketType::image : TicketType::text
        ]);

        toast(' پاسخ با موفقیت ارسال شد','success');


        return back();
    }


}
