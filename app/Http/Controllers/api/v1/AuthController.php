<?php

namespace App\Http\Controllers\api\v1;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\UserResource;
use App\User;
use App\Verify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|max:11',
        ]);

        if ($validator->fails()) {
            return response([
                'message' => $validator->errors()->first(),
                'success' => false
            ]);
        }
        $verify = Verify::wherePhone($request['phone'])->first();

        if (!empty($verify->id)) {
            $verify->update([
                'active_code' => rand(1000, 9999)
            ]);

            $send = send_sms_to_user($request['phone'], $verify->active_code);
            if ($send) {
                return response([
                    'message' => 'کد فعالسازی ارسال شد',
                    'success' => true
                ]);
            } else {

                return response([
                    'message' => 'لطفا مجددا تلاش کنید',
                    'success' => false
                ]);
            }

        } else {
            $verify = Verify::create([
                'phone' => $request['phone'],
                'active_code' => rand(1000, 9999),
            ]);
            $send = send_sms_to_user($request['phone'], $verify->active_code);
            if ($send) {
                return response([
                    'message' => 'کد فعالسازی ارسال شد',
                    'success' => true
                ]);
            } else {

                return response([
                    'message' => 'لطفا مجددا تلاش کنید',
                    'success' => false
                ]);
            }
        }
    }
    public function verify(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'active_code' => 'required|int',
            'phone' => 'required|max:11',
        ]);
        if ($validator->fails()) {
            return response([
                'message' => $validator->errors()->first(),
                'success' => false
            ]);
        }
        $code = $request['active_code'];
        $verify = Verify::wherePhone($request['phone'])->first();
        if (empty($verify->id)) {
            return response([
                'message' => 'کاربری پیدا نشد!مجددا تلاش کنید',
                'success' => false
            ]);
        }

        if ($verify->active_code == $code) {
            $user = User::wherePhone($request['phone'])->first();
            if (!empty($user->id)) {
                if ($user->active == true) {

                    $verify->update([
                        'active_code' => rand(1000, 9999),
                    ]);
                    $user->update([
                        'api_token' => Str::random(100),
                    ]);

                    auth()->loginUsingId($user->id);
                    return new UserResource($user,false);
                } else {
                    return response([
                        'message' => 'حساب کاربری شما غیر فعال است لطفا با پشتیبانی تماس بگیرید',
                        'success' => false
                    ]);
                }

            } else {

                $user = User::create([
                    'phone' => $request['phone'],
                    'type' => UserType::user,
                    'active' => true,
                    'api_token' => Str::random(100),
                    'ip' => request()->ip(),
                ]);

                auth()->loginUsingId($user->id);
                $verify->update([
                    'active_code' => rand(1000, 9999),
                ]);
                return response([
                    'data' => new UserResource($user,true),
                    'message' => 'ثبت نام شما با موفقیت انجام شد',
                    'success' => true
                ]);
            }
        } else {
            return response([
                'message' => 'کد فعالسازی اشتباه است!',
                'success' => false
            ]);
        }
    }
}
