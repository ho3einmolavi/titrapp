<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function index()
    {
        $users = User::Filter()->latest()->paginate(20);
        return view('admin.user.list', compact('users'));
    }


    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'phone' => 'unique:users',
            'email' => 'unique:users',
            'type' => 'required',
        ]);

        $user = User::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'api_token' => \Illuminate\Support\Str::random(100),
            'type' => $request['type'],
            'position' => $request['position'],
            'active' => $request['active'] == 1 ? true : false,
            'email' => $request['email'],
            'city_id' => $request['city_id'],
            'ip'=>request()->ip()
        ]);

        if ($user) {
            if (!empty($request['vip']))
            {
                $vipTime = $user->vipTime > Carbon::now() ? Carbon::parse($user->vipTime) : Carbon::now();
                $user->update([
                    'vipTime' => $vipTime->addDays($request['vip'])
                ]);
            }
            alert()->success('عملیات با موفقیت انجام شد', 'کاربر با موفقیت اضافه شد');
            return redirect(route('user.index'));
        } else {
            alert()->error('خطای سرور!', 'کاربر با موفقیت اضافه نشد');
            return redirect(route('user.index'));
        }

    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'type' => 'required',
            'confirmPassword'=>'required_with:password|same:password'
        ]);


        $update = $user->update([
            'name' => $request['name'],
            'api_token' => \Illuminate\Support\Str::random(100),
            'type' => $request['type'],
            'position' => $request['position'],
            'active' => $request['active'] == 1 ? true : false,
            'email' => $request['email'],
            'city_id' => $request['city_id'],
            'ip'=>request()->ip()
        ]);

        if ($update) {
            if ( $request['active'] =! 1)
            {
                $user->update([
                    'api_token' => \Illuminate\Support\Str::random(100),
                    'active' => $request['active'] == 1 ? true : false,
                ]);
            }

            if (!empty($request['vip']))
            {
                $vipTime = $user->vipTime > Carbon::now() ? Carbon::parse($user->vipTime) : Carbon::now();
                $user->update([
                    'vipTime' => $vipTime->addDays($request['vip'])
                ]);
            }
            alert()->success('عملیات موفق', 'ویرایش با موفقیت انجام شد');

            return redirect(route('user.index'));
        } else {
            alert()->error('خطای سرور', 'ویرایش با موفقیت انجام نشد');

            return redirect(route('user.index'));
        }


    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        alert()->info('حذف شد!', 'آیتم مورد نظر با موفقیت حذف شد');
        return redirect(route('user.index'));
    }
}
