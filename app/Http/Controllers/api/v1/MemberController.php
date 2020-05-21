<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\UserResource;
use App\Http\Resources\v1\UsersCollection;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    public function search(Request $request , User $users)
    {
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $type = $request->type;
        $city = $request->city;
        $category_id = $request->category_id;
        $province = $request->province;
        $genreId = $request->genreId;
        $skilId = $request->skilId;

        if ($name)
        {
            $users = $users->where('name', 'LIKE', '%' . $name . '%');
        }

        if ($email)
        {
            $users = $users->where('email', 'LIKE', '%' . $email . '%');
        }

        if ($phone)
        {
            $users = $users->where('phone', 'LIKE', '%' . $phone . '%');
        }

        if ($type)
        {
            $users = $users->where('type', 'LIKE', '%' . $type . '%');
        }

        if ($category_id)
        {
             $ids = DB::table('category_user')->where('category_id', $category_id)->get()->pluck('user_id');
             $users = $users->whereIn('id' , $ids);
        }

        if ($city)
        {
            $users = $users->where('city', 'LIKE', '%' . $city . '%');
        }

        if ($province)
        {
            $users = $users->where('province', 'LIKE', '%' . $province . '%');
        }

        if ($genreId)
        {
            $ids = DB::table('genre_user')->where('genre_id', $genreId)->get()->pluck('user_id');
            $users = $users->whereIn('id', $ids);
        }

        if ($skilId)
        {
            $ids = DB::table('skil_user')->where('skil_id', $skilId)->get()->pluck('user_id');
            $users = $users->whereIn('id', $ids);
        }

        return UserResource::collection($users->get())->additional([
            'success' => true
        ]);

    }

    public function skills(Request $request , User $users)
    {
        $validate = Validator::make($request->all() , [
            'skills_id' => 'required'
        ]);

        if ($validate->fails())
        {
            return response()->json([
                'message' => $validate->errors()->all()
            ] , 400);
        }

        $ids = DB::table('skil_user')->where('skil_id', $request->skills_id)->get()->pluck('user_id');
        $users = $users->whereIn('id' , $ids);

        return UserResource::collection($users->get())->additional([
            'success' => true
        ]);
    }
}
