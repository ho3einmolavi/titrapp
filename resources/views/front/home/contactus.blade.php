@extends('front.frontLayout')
@section('title', 'تماس با ما')

@section('content')

    <div class="stunning-header bg-primary-opacity">
        <div class="header-spacer--standard"></div>

        <div class="stunning-header-content">
            <h1 class="stunning-header-title">تماس با ما</h1>
            <ul class="breadcrumbs">
                <li class="breadcrumbs-item">
                    <a href="/">صفحه اصلی</a>
                    <span class="icon breadcrumbs-custom">/</span>
                </li>
                <li class="breadcrumbs-item active">
                    <span>تماس با ما</span>
                </li>
            </ul>
        </div>

        <div class="content-bg-wrap stunning-header-bg1"></div>
    </div>
    <section class="medium-padding120">
        <div class="container">
            <div class="row">
                <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">

                    <div class="contact-item-wrap">
                        <h3 class="contact-title">شماره تماس </h3>
                        <div class="contact-item">
                            <h6 class="sub-title">شماره تماس 1:</h6>
                            <a >{{\App\General::first()->phone1}}</a>
                        </div>
                        <div class="contact-item">
                            <h6 class="sub-title">شماره تماس 2:</h6>
                            <a >{{\App\General::first()->phone2}}</a>
                        </div>
                    </div>
                </div>

                <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">

                    <div class="contact-item-wrap">
                        <h3 class="contact-title">ایمیل</h3>
                        <div class="contact-item">
                            <a href="mailto:{{\App\General::first()->email}}">{{\App\General::first()->email}}</a>
                        </div>
                    </div>
                </div>
                <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">

                    <div class="contact-item-wrap">
                        <h3 class="contact-title">آدرس</h3>
                        <div class="contact-item">
                            <a>{{\App\General::first()->address}}</a>
                        </div>

                    </div>
                </div>
                <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">


                    <div class="contact-item-wrap">
                        <h3 class="contact-title">شبکه های اجتماعی</h3>
                        <div class="contact-item">
                            <div class="row">
                                <a style="    padding-right: 28px;"  target="_blank" href="{{\App\General::first()->instagram}}"><span style="font-size: 53px;" class="fa fa-instagram"></span></a>
                                <a style="    padding-right: 28px;" target="_blank" href="{{\App\General::first()->telegram}}"><span style="font-size: 53px;" class="fa fa-send"></span></a>
                                <a style="    padding-right: 28px;" target="_blank" href="{{\App\General::first()->whatsapp}}"><span style="font-size: 53px;" class="fa fa-whatsapp"></span></a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

