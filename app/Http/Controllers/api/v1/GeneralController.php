<?php

namespace App\Http\Controllers\api\v1;

use App\General;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\GeneralResource;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public  function  generals(Request $request)
    {
        $general = General::first();
        return new GeneralResource($general);
    }
}
