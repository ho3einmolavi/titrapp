<?php

namespace App\Http\Controllers\admin;

use App\General;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;

class GeneralController extends Controller
{


    public function create()
    {
        $general = General::first();
        return view('admin.general.create',compact('general'));
    }

    public function store(Request $request)
    {
        General::create([
            'phone1' => $request['phone1'],
            'phone2' => $request['phone2'],
            'email' => $request['email'],
            'address' => $request['address'],
            'instagram' => $request['instagram'],
            'telegram' => $request['telegram'],
            'whatsapp' => $request['whatsapp'],
            'facebook' => $request['facebook'],
            'twitter' => $request['twitter'],
            'aboutus' => $request['aboutus'],
            'guide' => $request['guide'],
            'services' => $request['services'],
            'android' => $request['android'],
            'sibche' => $request['sibche'],
            'googleplay' => $request['googleplay'],
            'bazar' => $request['bazar'],
            'iapps' => $request['iapps'],
        ]);

        alert()->success('عملیات با موفقیت انجام شد', 'به روز رسانی  با موفقیت انجام شد');
        return back();

    }

    public function update(Request $request, General $general)
    {


        $general->update([
            'phone1' => $request['phone1'],
            'phone2' => $request['phone2'],
            'email' => $request['email'],
            'address' => $request['address'],
            'instagram' => $request['instagram'],
            'telegram' => $request['telegram'],
            'whatsapp' => $request['whatsapp'],
            'facebook' => $request['facebook'],
            'twitter' => $request['twitter'],
            'aboutus' => $request['aboutus'],
            'guide' => $request['guide'],
            'services' => $request['services'],
            'android' => $request['android'],
            'sibche' => $request['sibche'],
            'googleplay' => $request['googleplay'],
            'bazar' => $request['bazar'],
            'iapps' => $request['iapps'],
        ]);

        alert()->success('عملیات موفق', 'ویرایش با موفقیت انجام شد');

        return back();
    }




}
