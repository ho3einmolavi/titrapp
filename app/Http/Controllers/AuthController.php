<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\User;
use App\Verify;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Ipecompany\Smsirlaravel\Smsirlaravel;
use MPCO\EnglishPersianNumber\Numbers;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required',
            'captcha' => 'required|captcha',
        ]);

        $request['phone'] = str_replace(' ','', $request['phone']);
        if (!is_numeric($request['phone'])) {
            alert()->error('لطفا شماره موبایل را به درستی وارد کنید', '')->showConfirmButton('باشه');
            return back();
        } else {
            $phone = Numbers::toEnglishNumbers($request['phone']);
        }
        $verify = Verify::where('phone', $phone)->first();
        if (!empty($verify->id)) {
            $verify->update([
                'active_code' => rand(1000, 9999),
            ]);

            $send = send_sms_to_user($request['phone'], $verify->active_code);
            if ($send) {
                toast('کد فعالسازی با موفقیت ارسال شد','success');

                return redirect('/verify/' . $request['phone']);
            } else {

                alert()->info('کاربر گرامی', 'مشکلی در ارسال پیام رخ داد لطفا مجددا تلاش کنید')->showConfirmButton('باشه');
                return back();
            }
        } else {
            $verify = Verify::create([
                'phone' => $phone,
                'active_code' => rand(1000, 9999),
            ]);
            if ($verify) {
                $send = send_sms_to_user($request['phone'], $verify->active_code);
                if ($send) {
                    toast('کد فعالسازی با موفقیت ارسال شد','success');
                    return redirect('/verify/' . $request['phone']);
                } else {
                    alert()->info('کاربر گرامی', 'مشکلی در ارسال پیام رخ داد لطفا مجددا تلاش کنید')->showConfirmButton('باشه');
                    return back();
                }
            }
        }

    }


    public function verifyView($phone)
    {
        return view('auth.verify', compact('phone'));
    }


    public function verify(Request $request)
    {
        $this->validate($request, [
            'active_code' => 'required',
        ]);
        $request['phone'] = Numbers::toEnglishNumbers($request['phone']);
        $verify = Verify::where('phone', $request['phone'])->first();


        $active_code = $request['active_code'];
        if (!is_numeric($request['active_code'])) {
            alert()->error('لطفا کد فعالسازی را به درستی وارد کنید', '')->showConfirmButton('باشه');
            return back();
        } else {
            $active_code = Numbers::toEnglishNumbers($active_code);
        }

        if ($verify->active_code == $active_code) {
            $user = User::where('phone', $request['phone'])->first();

            if (!empty($user->id)) {
                auth()->loginUsingId($user->id);
                $verify->update([
                    'active_code' => rand(1000, 9999),
                ]);

                if ($user->active == true) {
                    toast('ورود با موفقیت انجام شد','success');
                    return redirect('/user/profile');

                } else {

                    alert()->info('کاربر گرامی', 'حساب کاربری شما غیر فعال است لطفا با پشتیبانی تماس بگیرید')->showConfirmButton('باشه');
                    return back();
                }

            } else {
                $createUser = User::create([
                    'phone' => $request['phone'],
                    'type' => UserType::user,
                    'active' => true,
                    'api_token' => Str::random(100),
                    'ip' => request()->ip(),
                ]);

                auth()->loginUsingId($createUser->id);
                $verify->update([
                    'active_code' => rand(1000, 9999),
                ]);
                toast('ورود و ثبت نام با موفقیت انجام شد','success');
                return redirect('/user/profile');
            }


        } else {
            alert()->error('کاربر گرامی', 'کد فعالسازی وارد شده اشتباه است!')->showConfirmButton('باشه');
            return back();
        }


    }


}
