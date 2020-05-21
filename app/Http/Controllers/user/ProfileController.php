<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {

        $user = User::find(auth()->user()->id);

        return view('user.profile.index', compact('user'));
    }

    public function skils()
    {
        $user = User::find(auth()->user()->id);
        return view('user.profile.skil', compact('user'));
    }

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
                alert()->error('عملیات ناموفق', 'لطفا لینک معتبری را وارد کنید');
                return back();
            }
        }

        if ($request->telegram)
        {
            if (!strpos($request->telegram , 't.me'))
            {
                alert()->error('عملیات ناموفق', 'لطفا لینک معتبری را وارد کنید');
                return back();
            }
        }

        if ($request->whatsapp)
        {
            if (!strpos($request->whatsapp , 'wa.me'))
            {
                alert()->error('عملیات ناموفق', 'لطفا لینک معتبری را وارد کنید');
                return back();
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

        alert()->success('عملیات موفق', 'اطلاعات پروفایل با موفقیت به روز رسانی شد');
        return back();
    }

    public function updateSkil(Request $request)
    {
        auth()->user()->genres()->sync($request['genre']);
        auth()->user()->skils()->sync($request['skil']);

        alert()->success('عملیات موفق', 'اطلاعات پروفایل با موفقیت به روز رسانی شد');
        return back();
    }

}
