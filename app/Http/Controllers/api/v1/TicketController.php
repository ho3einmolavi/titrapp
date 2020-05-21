<?php

namespace App\Http\Controllers\api\v1;

use App\Enums\TicketStatus;
use App\Enums\TicketType;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ReplyCollection;
use App\Http\Resources\v1\ReplyResource;
use App\Http\Resources\v1\TicketCategoryCollection;
use App\Http\Resources\v1\TicketCollection;
use App\Product;
use App\Ticket;
use App\TicketCategory;
use App\TicketReply;
use Carbon\Carbon;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    public function addTicket(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'category_id' => 'required',
            'priority' => 'required',
            'type' => 'required',
        ]);
        if ($validator->fails()) {
            return response([
                'message' => $validator->errors()->first(),
                'success' => false
            ]);
        }

        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $filename = Carbon::now()->timestamp . "-{$filename}";
            $path = $request->file('file')->storeAs('ticket', $filename);

        }


        $ticket = Ticket::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request['category_id'],
            'priority' => $request['priority'],
            'status' => TicketStatus::waiting,
            'file' => Storage::url($path),
            'title' => $request['title'],
            'body' => $request['body'],
        ]);


        if ($ticket) {

            TicketReply::create([
                'user_id' => auth()->user()->id,
                'ticket_id' => $ticket->id,
                'file' => !empty($dir) ? $dir : null,
                'body' => $request['body'],
                'type' => $request['type']
            ]);


            return response([
                'message' => 'تیکت  با موفقیت ارسال شد',
                'success' => true
            ]);
        } else {
            return response([
                'message' => 'خطای سرور! مجددا تلاش کنید',
                'success' => false
            ]);
        }
    }

    public function addReply(Request $request, Filesystem $filesystem)
    {
        $validator = Validator::make($request->all(), [
            'ticket_id' => 'required',
            'type' => 'required',
        ]);
        if ($validator->fails()) {
            return response([
                'message' => $validator->errors()->first(),
                'success' => false
            ]);
        }
        $ticket = Ticket::find($request['ticket_id']);
        if (empty($ticket)) {
            return response([
                'message' => 'تیکت وجود ندارد!',
                'success' => false
            ]);
        }
        $ticket->update([
            'status' => TicketStatus::customeAnswere
        ]);

        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $year = Carbon::now()->year;
            $filePath = "/upload/ticket/{$year}";
            $filename = $file->getClientOriginalName();

            if ($filesystem->exists(public_path("{$filePath}/{$filename}"))) {
                $filename = Carbon::now()->timestamp . "-{$filename}";
            }
            $file->move(public_path($filePath), $filename);
            $dir = "/public{$filePath}/{$filename}";
        }
        $reply = TicketReply::create([
            'user_id' => auth()->user()->id,
            'ticket_id' => $request['ticket_id'],
            'file' => !empty($dir) ? $dir : null,
            'type' => $request['type'],
            'body' => $request['body'],
        ]);
        if ($reply) {
            return response([
                'data' => new ReplyResource(TicketReply::find($reply->id)),
                'message' => 'پاسخ  با موفقیت ارسال شد',
                'success' => true
            ]);
        } else {
            return response([
                'message' => 'خطای سرور! مجددا تلاش کنید',
                'success' => false
            ]);
        }
    }

    public function ticketByUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'perpage' => 'required',
        ]);
        if ($validator->fails()) {
            return response([
                'message' => $validator->errors()->first(),
                'success' => false
            ]);
        }

        $tickets = Ticket::where('user_id', auth()->user()->id)->latest()->paginate($request['per_page']);

        return new  TicketCollection($tickets);

    }

    public function replyByTicket(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ticket_id' => 'required',
            'perpage' => 'required',
        ]);
        if ($validator->fails()) {
            return response([
                'message' => $validator->errors()->first(),
                'success' => false
            ]);
        }
        $replyies = TicketReply::where('ticket_id', $request['ticket_id'])->latest()->paginate($request['perpage']);
        return new  ReplyCollection($replyies);
    }

    public function deleteTicket(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ticket_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response([
                'message' => $validator->errors()->first(),
                'success' => false
            ]);
        }
        $ticket = Ticket::find($request['ticket_id']);
        $delete = $ticket->delete();

        if ($delete) {
            return response([
                'message' => 'تیکت با موفقیت حذف شد',
                'success' => true
            ]);
        } else {
            return response([
                'message' => 'خطای سرور! مجددا تلاش کنید',
                'success' => false
            ]);
        }
    }

    public function categories()
    {

        $categories = TicketCategory::all();
        return new TicketCategoryCollection($categories);

    }


}
