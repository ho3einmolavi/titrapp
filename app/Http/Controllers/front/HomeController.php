<?php

namespace App\Http\Controllers\front;

use App\Category;
use App\City;
use App\Faq;
use App\Genre;
use App\Http\Controllers\Controller;
use App\NewsLetter;
use App\Skil;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('front.home.index');
    }

    public function category($id)
    {
        $category = Category::find($id);

        return view('front.home.category', compact('category'));
    }

    public function getCityByProvince(Request $request)
    {
        $select = $request['select'];
        $value = $request['value'];
        $dependent = $request['dependent'];
        $cities = City::where('province_id', $value)->get();
        $output = '';
        foreach ($cities as $city) {
            $output .= '<option value="' . $city->id . '" >' . $city->name . '</option>';
        }
        echo $output;
    }

    public function getCityByProvinceForSerach(Request $request)
    {
        $select = $request['select'];
        $value = $request['value'];
        $dependent = $request['dependent'];
        $cities = City::where('province_id', $value)->get();
        $output = '<option value="" >همه موارد</option>';
        foreach ($cities as $city) {
            $output .= '<option value="' . $city->id . '" >' . $city->name . '</option>';
        }
        echo $output;
    }


    public function getGenreByCategory(Request $request)
    {
        $value = $request['value'];
        $genres = Genre::where('category_id', $value)->get();
        $output = '<option value="" >همه موارد</option>';
        foreach ($genres as $genre) {
            $output .= '<option value="' . $genre->id . '" >' . $genre->name . '</option>';
        }
        echo $output;
    }


    public function getSkilByCategory(Request $request)
    {
        $value = $request['value'];
        $skils = Skil::where('category_id', $value)->get();
        $output = '<option value="" >همه موارد</option>';
        foreach ($skils as $skil) {
            $output .= '<option value="' . $skil->id . '" >' . $skil->name . '</option>';
        }
        echo $output;
    }


    public function aboutus()
    {
        return view('front.home.aboutus');
    }


    public function contactus()
    {
        return view('front.home.contactus');
    }


    public function newsletter(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);
        NewsLetter::create([
            'email'=>$request['email']
        ]);

        alert()->success('عضویت در خبرنامه با موفقیت انجام شد', '')->showConfirmButton('بستن');

        return back();

    }


    public  function  faq()
    {
        $faqs = Faq::latest()->get();
        return view('front.home.faq',compact('faqs'));

    }
}
