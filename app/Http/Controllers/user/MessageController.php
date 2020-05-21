<?php

namespace App\Http\Controllers\user;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public  function  contact()
    {
        $contacts = Contact::where('receiver_user_id', auth()->user()->id)->orWhere('sender_user_id', auth()->user()->id)->paginate(10);
        return view('user.message.contact',compact('contacts'));
    }
    public  function  messages($id)
    {
        $user_id = auth()->user()->id;
        $target_id = $id;

        $messages = \App\Message::where([
            ['receiver_user_id', '=', $user_id],
            ['sender_user_id', '=', $target_id],
        ])
            ->orWhere([
                ['receiver_user_id', '=', $target_id],
                ['sender_user_id', '=', $user_id],
            ])
            ->latest()->paginate(6);

        $seen_message = $messages->where('receiver_user_id', $user_id);
        foreach ($seen_message as $message) {
            $message->update([
                'seen' => 1
            ]);
        }

        $data = [
            'messages'=>$messages,
            'target_id'=>$target_id
        ];

        return view('user.message.messages',compact('data'));

    }

    public  function  sendMessage(Request $request)
    {

        $contact = Contact::where([
            ['receiver_user_id', '=', auth()->user()->id],
            ['sender_user_id', '=', $request['user_id']],
        ])
            ->orWhere([
                ['receiver_user_id', '=', $request['user_id']],
                ['sender_user_id', '=', auth()->user()->id],
            ])
            ->first();

        if (empty($contact->id)) {
            Contact::create([
                'receiver_user_id' => $request['user_id'],
                'sender_user_id' => auth()->user()->id
            ]);
        }

        \App\Message::create([
            'sender_user_id' => auth()->user()->id,
            'receiver_user_id' =>$request['user_id'],
            'body' => $request['body'],
            'type' => 0,
            'seen' => false,
        ]);

        toast('پیام با موفقیت ارسال شد','success');


        return back();

    }


}
