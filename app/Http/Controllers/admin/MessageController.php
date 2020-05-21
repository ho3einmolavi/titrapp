<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->paginate(20);
        return view('admin.message.list', compact('messages'));
    }

    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();
        alert()->info('حذف شد!', 'آیتم مورد نظر با موفقیت حذف شد');
        return redirect(route('message.index'));
    }
}
