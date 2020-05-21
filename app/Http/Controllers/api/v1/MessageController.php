<?php

namespace App\Http\Controllers\api\v1;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\MessageCollection;
use App\Http\Resources\v1\ContactCollection;
use App\Message;
use App\User;
use App\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Filesystem\Filesystem;


class MessageController extends Controller
{
    public function send(Request $request, Filesystem $filesystem)
    {
        $validator = Validator::make($request->all(), [
            'receiver_user_id' => 'required',
            'type' => 'required',
        ]);
        if ($validator->fails()) {
            return response([
                'errors' => $validator->errors()->first(),
                'success' => false
            ]);
        }
        $contact = Contact::where([
            ['receiver_user_id', '=', auth()->user()->id],
            ['sender_user_id', '=', $request['receiver_user_id']],
        ])
            ->orWhere([
                ['receiver_user_id', '=', $request['receiver_user_id']],
                ['sender_user_id', '=', auth()->user()->id],
            ])
            ->first();

        if (empty($contact->id)) {
            Contact::create([
                'receiver_user_id' => $request['receiver_user_id'],
                'sender_user_id' => auth()->user()->id
            ]);
        }


        if (!empty($request['voice'])) {

            $file = $request->file('voice');
            $year = Carbon::now()->year;
            $month = Carbon::now()->month;

            $imagePath = "/upload/voice/{$year}/{$month}";


            $filename = $file->getClientOriginalName();

            if ($filesystem->exists(public_path("{$imagePath}/{$filename}"))) {
                $filename = Carbon::now()->timestamp . "-{$filename}";
            }

            $file->move(public_path($imagePath), $filename);

            $dir = "public{$imagePath}/{$filename}";
        }
        $message = \App\Message::create([
            'sender_user_id' => auth()->user()->id,
            'receiver_user_id' => $request['receiver_user_id'],
            'body' => $request['body'],
            'type' => $request['type'],
            'seen' => false,
            'voice' => !empty($dir) ? $dir : null,
        ]);

        if (!empty($message->id)) {

            return response([
                'data' => [
                    'id' => $message->id,
                    'user' => [
                        'id' => $message->sender->id,
                        'username' => $message->sender->phone,
                        'name' => $message->sender->name,
                    ],
                    'message_type' => $message->type,
                    'seen' => $message->seen,
                    'body' => is_null($message->body) ? '' : $message->body,
                    'voice' => is_null($message->voice) ? '' : $message->voice,
                    'date' => $message->created_at,
                ],
                'message' => 'پیام با موفقیت ارسال شد',
                'success' => true
            ]);
        } else {
            return response([
                'message' => 'مشکلی در ارسال پیام به وجود آمد لطفا مجددا تلاش کنید!',
                'success' => false
            ]);
        }
    }

    public function contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'per_page' => 'required',
        ]);
        if ($validator->fails()) {
            return response([
                'message' => $validator->errors()->first(),
                'success' => false
            ]);
        }

        $contacts = Contact::where('receiver_user_id', auth()->user()->id)->orWhere('sender_user_id', auth()->user()->id)->paginate($request['perpage']);

        return new ContactCollection($contacts);
    }


    public function get(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'per_page' => 'required',
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response([
                'message' => $validator->errors()->first(),
                'success' => false
            ]);
        }

        $user_id = auth()->user()->id;
        $target_id = $request['user_id'];

        $messages = \App\Message::where([
            ['receiver_user_id', '=', $user_id],
            ['sender_user_id', '=', $target_id],
        ])
            ->orWhere([
                ['receiver_user_id', '=', $target_id],
                ['sender_user_id', '=', $user_id],
            ])
            ->latest()->paginate($request['per_page']);

        $seen_message = $messages->where('receiver_user_id', $user_id);
        foreach ($seen_message as $message) {
            $message->update([
                'seen' => 1
            ]);
        }
        return new MessageCollection($messages);


    }


    public function unread()
    {

        $message = \App\Message::where('receiver_user_id', auth()->user()->id)->where('seen', false)->get()->count();

        return response(
            [
                'data' => $message,
                'success' => true
            ]
        );
    }


    public function deleteContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'contact_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response([
                'errors' => $validator->errors()->first(),
                'success' => false
            ]);
        }

        $contact = Contact::find($request['contact_id']);

        if (!empty($contact->id)) {


            $user_id = auth()->user()->id;

            if ($user_id == $contact->receiver_user_id) {
                $target_id = $contact->sender_user_id;
            } else if ($user_id == $contact->sender_user_id) {
                $target_id = $contact->receiver_user_id;
            } else {
                $target_id = $contact->receiver_user_id;
            }

            $messages = \App\Message::where([
                ['receiver_user_id', '=', $target_id],
                ['sender_user_id', '=', $user_id],
            ])
                ->get();

            foreach ($messages as $message) {
                $message->delete();
            }
            $contact->delete();

            return response([
                'message'=>'گفتگو و پیام ها  با موفقیت حذف شد',
                'success'=>true
            ]);
        } else {
            return response([
                'message' => 'گفتگو وجود ندارد!',
                'success' => false
            ]);
        }
    }


    public function deleteMessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response([
                'errors' => $validator->errors()->first(),
                'success' => false
            ]);
        }

        $message = Message::find($request['message_id']);


        if (!empty($message->id)) {
            $message->delete();
            return response([
                'message'=>'پیام با موفقیت حذف شد',
                'success'=>true
            ]);

        } else {
            return response([
                'message' => 'پیام وجود ندارد!',
                'success' => false
            ]);
        }
    }


}
