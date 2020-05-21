<?php

namespace App;

use App\Enums\UserType;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function isVip()
    {
        return $this->vipTime > Carbon::now() ? true : false;
    }

    public function isAdmin()
    {
        return $this->type == UserType::superAdmin ? true : false;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_user', 'user_id', 'category_id');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_user', 'user_id', 'genre_id');
    }

    public function skils()
    {
        return $this->belongsToMany(Skil::class, 'skil_user', 'user_id', 'skil_id');
    }

    public function scopeFilter($query)
    {
        $name = request('name');
        $phone = request('phone');
        $email = request('email');
        $type = request('type');
        $city = request('city');
        $category_id = request('category_id');
        $province = request('province');
        $genreId = request('genreId');
        $skilId = request('skilId');

        if (isset($name) && trim($name) != '') {
            $query->where('name', 'LIKE', '%' . $name . '%');
        }

        if (isset($phone) && trim($phone) != '') {
            $query->where('phone', $phone);
        }

        if (isset($email) && trim($email) != '') {
            $query->where('email', 'LIKE', '%' . $email . '%');
        }

        if (isset($city) && trim($city) != '') {
            $query->where('city_id', $city);
        }

        if (isset($type) && trim($type) != '') {
            $query->where('type', $type);
        }
        if (isset($province) && trim($province) != '') {

            $cities = City::where('province_id', $province)->get()->pluck('id');
            $query->whereIn('city_id', $cities);
        }


        if (isset($category_id) && trim($category_id) != '') {
            $users = DB::table('category_user')->where('category_id', $category_id)->get()->pluck('user_id');
            $query->whereIn('id', $users);
        }

        if (isset($genreId) && trim($genreId) != '') {
            $users = DB::table('genre_user')->where('genre_id', $genreId)->get()->pluck('user_id');
            $query->whereIn('id', $users);
        }

        if (isset($skilId) && trim($skilId) != '') {
            $users = DB::table('skil_user')->where('skil_id', $skilId)->get()->pluck('user_id');
            $query->whereIn('id', $users);
        }


        return $query;
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }


}
