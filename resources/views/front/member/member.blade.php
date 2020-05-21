@extends('front.frontLayout')
@section('title', 'اعضا')

@section('content')

    <div class="header-spacer"></div>

    <div class="container">
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="top-header top-header-favorit">
                        <div class="top-header-thumb">
                            <img src="/theme/img/top-header2.jpg" alt="nature">
                            <div class="top-header-author">
                                <div class="author-thumb">
                                    <img src="{{!empty($user->image) ?  $user->image : '/theme/img/user.png'}}"
                                         alt="author">
                                </div>
                                <div class="author-content">
                                    <div class="h3 author-name">{{!empty($user->name) ? $user->name : $user->phone}}</div>
                                    {{--<div class="country">تهران - ایران </div>--}}
                                </div>
                            </div>
                        </div>
                        <div class="profile-section">
                            <div class="row">
                                <div class="col-xl-8 m-auto col-lg-8 col-md-12">
                                    <ul class="profile-menu">
                                        <li>
                                            <a href="/member/{{$user->id}}" class="{{setActive('member/'.$user->id,'active')}}">اطلاعات و مشخصات</a>
                                        </li>

                                        <li>
                                            <a href="/member/sample/{{$user->id}}" class="{{setActive('member/'.$user->id,'active')}}">نمونه کار ها</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="control-block-button">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-xl-8 order-xl-1 col-lg-12 order-lg-2 col-md-12 col-sm-12 col-xs-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">درباره من </h6>
                        <a href="#" class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="/thme/icons/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="ui-block-content">
                                <ul class="widget w-personal-info item-block">
                                    <li>
                                        <span class="title">شهر :</span>
                                        <span class="text">{{!empty($user->city->name) ? $user->city->name : ''}}</span>
                                    </li>
                                    <li>
                                        <span class="title">زمینه کاری:</span>

                                        @foreach($user->categories as $category)
                                            <span class="text p-1">{{$category->name}} </span>
                                        @endforeach
                                    </li>
                                    <li>
                                        <span class="title"> ژانر:</span>

                                        @foreach($user->genres as $genre)
                                            <span class="text p-1">{{$genre->name}} </span>
                                        @endforeach
                                    </li>


                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ui-block-content">
                                <ul class="widget w-personal-info item-block">

                                    <li>
                                        <span class="title"> مهارت و تخصص ها:</span>

                                        @foreach($user->skils as $skil)
                                            <span class="text p-1">{{$skil->name}} </span>
                                        @endforeach
                                    </li>
                                    <li>
                                        <span class="title">ایمیل :</span>
                                        <a href = "mailto:{{$user->email}}" class="text">{{$user->email}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-xl-4 order-xl-1 col-lg-12 order-lg-2 col-md-12 col-sm-12 col-xs-12">

                <div class="ui-block">
                    <div class="ui-block-title">
                        <div class="widget w-socials">
                            <a target="_blank" href="/member/sample/{{$user->id}}" class="btn btn-primary" style="width: 100%;">
                                نمونه کار ها
                            </a>
                        </div>
                    </div>
                </div>


                <div class="ui-block">
                    <div class="ui-block-title">
                        <div class="widget w-socials">
                            <h6 class="title">ارسال پیام </h6>
                            <a target="_blank" href="/user/message/{{$user->id}}" class="btn btn-danger" style="width: 100%;">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                ارسال پیام به این کاربر
                            </a>
                        </div>
                    </div>
                </div>


                <div class="ui-block">
                    <div class="ui-block-title">
                        <div class="widget w-socials">
                            <h6 class="title">شبکه های اجتماعی</h6>
                            @if($user->whatsapp)
                            <a target="_blank" href="{{$user->whatsapp}}" class="social-item bg-green">
                                <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                واتس اپ
                            </a>
                            @endif
                            @if($user->telegram)

                            <a  target="_blank" href="{{$user->telegram}}" class="social-item bg-twitter">
                                <i class="fa fa-send" aria-hidden="true"></i>
                                تلگرام
                            </a>
                            @endif
                            @if($user->instagram)

                            <a target="_blank" href="{{$user->instagram}}" class="social-item bg-dribbble">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                اینستگرام
                            </a>
                            @endif

                        </div>
                    </div>
                </div>

                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">اطلاعات بیشتر </h6>
                        <a href="#" class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="ui-block-content">
                        <ul class="widget w-personal-info item-block">
                            <li>
                                <span class="title">اطلاعات بیشتر :</span>
                            </li>
                            <li>
                                <span class="title">شماره تماس:</span>
                                <span class="text">{{$user->phoneshow}}</span>
                            </li>
                            <li>
                                <span class="title">پیوستن به تیتر اَپ:</span>
                                <span class="text">{{\Morilog\Jalali\Jalalian::forge($user->created_at)->ago()}}</span>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

