<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function update(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => Rule::unique('users')->ignore(auth()->user()->id),
        ]);

        if ($request->instagram)
        {
            if (!strpos($request->instagram , 'instagram.com'))
            {
                return response()->json([
                    'message' => 'لطفا لینک معتبری را وارد کنید'
                ] , 400);
            }
        }

        if ($request->telegram)
        {
            if (!strpos($request->telegram , 't.me'))
            {
                return response()->json([
                    'message' => 'لطفا لینک معتبری را وارد کنید'
                ] , 400);
            }
        }

        if ($request->whatsapp)
        {
            if (!strpos($request->whatsapp , 'wa.me'))
            {
                return response()->json([
                    'message' => 'لطفا لینک معتبری را وارد کنید'
                ] , 400);
            }
        }

        auth()->user()->update([
            'city_id' => $request['city_id'],
            'email' => $request['email'],
            'name' => $request['name'],
            'bio' => $request['bio'],
            'instagram' => $request['instagram'],
            'telegram' => $request['telegram'],
            'whatsapp' => $request['whatsapp'],
            'phoneshow' => $request['phoneshow'],
            'image' => !empty($request['image']) ? $request['image'] : auth()->user()->image,
        ]);

        auth()->user()->categories()->sync($request['category']);

            return response()->json([
                'message' => 'تغییرات با موفقیت اعمال شد'
            ] , 200);
    }

    public function updateSkil(Request $request)
    {
        auth()->user()->genres()->sync($request['genre']);
        auth()->user()->skils()->sync($request['skil']);

        return response()->json([
            'message' => 'اطلاعات پروفایل با موفقیت به روز رسانی شد' ,
        ]);
    }

    public function index()
    {
        $user = User::find(auth()->user()->id);
        $user['skills'] = $user->skils;
        unset($user['skils']);
        return response()->json($user);
    }
}
