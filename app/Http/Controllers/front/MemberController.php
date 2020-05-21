<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Sample;
use App\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public  function  members()
    {
        $users = User::filter()->latest()->paginate(12);
        return view('front.member.members',compact('users'));
    }

    public  function  member($id)
    {

        $user = User::find($id);
        return view('front.member.member',compact('user'));
    }

    public  function  sample($id)
    {

        $samples = Sample::where('user_id',$id)->latest()->get();
        $user = User::find($id);

        $data = [
            'user'=>$user,
            'samples'=>$samples
        ];
        return view('front.member.samples',compact('data'));

    }
}
