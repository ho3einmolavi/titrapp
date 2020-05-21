@extends('front.frontLayout')
@section('title', 'ورود')

@section('content')

    <div class="landing-page">
        <div class="content-bg-wrap"></div>

        <div class="header-spacer--standard"></div>


        <div class="container">
            <div class="row display-flex">
                <div class="col col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                </div>

                <div class="col col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">


                    <div class="registration-login-form">

                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel" data-mh="log-tab">
                                <div class="title h6">ورود به تیتر اَپ</div>


                                <form class="content" action="{{route('login')}}" method="post">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group label-floating is-empty">
                                                <label id="phone" class="control-label">شماره موبایل </label>
                                                <input class="form-control phone-format" style="text-align: center; direction: ltr;" value="{{old('phone')}}" name="phone" id="phone" type="text">
                                                @error('phone')
                                                <div style="margin-top:8px; color: red; font-size: 12px;"><span style="margin-left: 4px;" class="fa fa-times"></span> {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group label-floating is-empty text-center">
                                                <div>
                                                    {!! captcha_img(); !!}
                                                </div>
                                            </div>
                                            <div class="form-group label-floating is-empty">
                                                <label id="captcha" class="control-label">عبارت امنیتی </label>
                                                <input class="form-control"  name="captcha" id="captcha" type="text">
                                                @error('captcha')
                                                <div style="margin-top:8px; color: red; font-size: 12px;"><span style="margin-left: 4px;" class="fa fa-times"></span> {{ $message }}</div>
                                                @enderror
                                            </div>


                                            <button type="submit" class="btn btn-lg btn-primary full-width">ورود</button>

                                            <p>
                                                با ورود و تکمیل پروفایل خود دیده شوید!
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>

                    <!-- ... end Login-Registration Form  -->
                </div>

                <div class="col col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">

                </div>
            </div>
        </div>

        <br/>
        <br/>
        <br/>
    </div>


@endsection

@section('script')
    <script src="/assets/dist/js/cleave.min.js"></script>
    <script src="/assets/dist/js/phone-type-formatter.ir.js"></script>
    <script>
        var cleave = new Cleave('.phone-format', {
            phone: true,
            phoneRegionCode: 'IR',
            max:11
        });
    </script>
@endsection
