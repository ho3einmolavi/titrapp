@extends('front.frontLayout')
@section('title', 'صفحه اصلی')

@section('content')


    <div class="header-spacer "></div>

    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $item = 0?>

                @foreach(\App\Slider::orderBy('sort')->get() as $slider)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$item}}"
                        class=""></li>

                        <?php $item = $item+1?>

                    @endforeach

            </ol>
            <div class="carousel-inner">
                @foreach(\App\Slider::orderBy('sort')->get() as $slider)

                    <div class="carousel-item    {{$loop->first ? 'active' : ''}} ">
                        <img src="{{$slider->background}}" alt="{{$slider->title}}">
                        <div class="carousel-caption  d-md-block ">

                            @if(!empty($slider->title))
                                <p>{{$slider->title}}</p>
                            @endif

                            @if(!empty($slider->link))
                                <p>
                                    <a target="_blank" href="{{$slider->link}}"
                                       class="btn btn-primary btn-md">{{$slider->button ? $slider->button : 'کلیک کنید'}}</a>
                                </p>
                            @endif
                        </div>

                    </div>

                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>



    @include('front.sections.mainSections')


    <section class="medium-padding80 bg-white">
        <div class="container">
            <div class="row">
                <div class="col col-xl-7 col-lg-7 col-md-12 col-sm-12  mt-5">
                    <div class="crumina-module crumina-heading">
                        <h2 class="heading-title"> دانلود اپلیکیشن <span class="c-primary">تیتر اَپ</span>
                        </h2>


                        <div>
                            @if(\App\General::first()->android)
                                <a href="{{\App\General::first()->android}}"><img style="height: 60px; margin-top: 10px;" src="/theme/img/new/directDownload.png" alt=""></a>
                            @endif
                                @if(\App\General::first()->googleplay)
                                    <a href="{{\App\General::first()->googleplay}}"><img style="height: 60px; margin-top: 10px;" src="/theme/img/new/GooglePlayBadge.png" alt=""></a>
                                @endif
                                @if(\App\General::first()->iapps)
                                    <a href="{{\App\General::first()->iapps}}"><img style="height: 60px; margin-top: 10px;" src="/theme/img/new/downloadiapss.png" alt=""></a>
                                @endif

                                @if(\App\General::first()->sibche)
                                    <a href="{{\App\General::first()->sibche}}"><img style="height: 60px; margin-top: 10px;" src="/theme/img/new/sibche.png" alt=""></a>
                                @endif
                        </div>
                    </div>
                </div>

                <div class="col col-xl-5 col-lg-5 ml-auto col-md-12 col-sm-12  align-right text-center">
                    <img src="/theme/img/new/home.png" alt="screen" class="negative-margin-right150">
                </div>
            </div>

        </div>
    </section>


    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h2 class="presentation-margin">اعضای برتر</h2>
            </div>


            @foreach(\App\User::where('position',\App\Enums\UserPoistion::mainpage)->get() as  $user_item)
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    @include('front.sections.userBox')

                </div>
            @endforeach

        </div>
    </div>



    @include('front.sections.whyUs')


    <section class="blog-post-wrap medium-padding80">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h2 class="presentation-margin">آخرین مطالب منتشر شده</h2>
                </div>

                @foreach(\App\Blog::latest()->take(9)->get() as $blog_item)
                    <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">

                        @include('front.sections.blogBox')

                    </div>
                @endforeach
            </div>
        </div>


    </section>


    <section class="negative-margin-top50 mb60 ">
        <div class="container">
            <div class="row">
                <div class="col col-xl-10 m-auto col-lg-10 col-md-12 col-sm-12 col-12">
                    <form class="content" action="{{route('newsletter')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-inline search-form">
                            <div class="form-group label-floating text-center">
                                <label class="control-label">برای عضویت در خبرنامه ما ایمیل خود را وارد کرده و ثبت
                                    کنید</label>
                                <input style="text-align: center;" name="email" class="form-control bg-white"
                                       placeholder=""
                                       type="email" required value="">
                                <span class="material-input"></span></div>
                            <button class="btn btn-purple btn-lg">ثبت</button>


                        </div>

                        @error('email')
                        <div style="margin-top:8px; color: red; font-size: 12px;"><span style="margin-left: 4px;"
                                                                                        class="fa fa-times"></span> {{ $message }}
                        </div>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    </section>




    @if(!auth()->check())
        <section class="align-right pt160 pb80 section-move-bg call-to-action-animation scrollme">
            <div class="container">
                <div class="row">
                    <div class="col col-xl-10 m-auto col-lg-10 col-md-12 col-sm-12 col-12">
                        <a ta href="/login" class="btn btn-primary btn-lg">
                            همین حالا ثبت نام کنید</a>
                    </div>
                </div>
            </div>
            <img class="first-img" alt="guy" src="/theme/img/guy.png"
                 style="opacity: 1; bottom: 0px; transform: scale(1);">
            <img class="second-img" alt="rocket" src="/theme/img/rocket1.png"
                 style="opacity: 1; bottom: 50%; right: 40%;">
            <div class="content-bg-wrap bg-section1"></div>
        </section>

    @endif


@endsection

