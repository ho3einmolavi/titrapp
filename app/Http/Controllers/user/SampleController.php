<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Sample;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public  function  createSample()
    {
        return view('user.sample.create');
    }


    public  function  storeSample(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'type' => 'required',
            'file' => 'required',
        ]);



        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $filename = Carbon::now()->timestamp . "-{$filename}";
            $path = $request->file('file')->move('/storage/sample', $filename);

        }

        Sample::create([
            'user_id' => auth()->user()->id,
            'file' => $path,
            'title' => $request['title'],
            'link' => $request['link'],
            'type' => $request['type'],
        ]);

        alert()->success('عملیات موفق', 'نمونه کار با موفقیت افزوده شد');
        return back();
    }


    public  function  samples()
    {
        $samples = Sample::where('user_id',auth()->user()->id)->latest()->get();

        return view('user.sample.samples',compact('samples'));


    }
}
