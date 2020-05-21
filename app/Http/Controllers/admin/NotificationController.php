<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        return view('admin.notification.index');
    }


    public function send(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'user' => 'required',
        ]);

        $send_to_users = send_multi_notif($request['user'], $request['title'], $request['body']);
        if ($send_to_users) {
            alert()->success('عملیات موفق', 'نوتیفیکیشن با موفقیت ارسال شد');
            return back();
        } else {
            alert()->error('عملیات ناموفق', 'مجددا تلاش کنید');
            return back();
        }

    }
}
