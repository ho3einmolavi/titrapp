@extends('front.frontLayout')
@section('title', 'تایید شماره موبایل')

@section('content')

    <div class="landing-page">
        <div class="content-bg-wrap"></div>

        <!-- ... end Header Standard Landing  -->
        <div class="header-spacer--standard"></div>


        <div class="container">
            <div class="row display-flex">
                <div class="col col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                </div>

                <div class="col col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">

                    <!-- Login-Registration Form  -->

                    <div class="registration-login-form">
                        <!-- Nav tabs -->

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel" data-mh="log-tab">
                                <div class="title h6"> کد فعالسازی به شماره موبایل {{$phone}} </div>


                                <form class="content" action="{{route('verify')}}" method="post">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group label-floating is-empty">
                                                <label id="active_code" class="control-label">کد فعالسازی </label>
                                                <input class="form-control" style="text-align: center; direction: ltr;" name="active_code" id="active_code" type="text">
                                                <input type="hidden" name="phone" value="{{$phone}}">
                                                @error('active_code')
                                                <div style="margin-top:8px; color: red; font-size: 12px;"><span style="margin-left: 4px;" class="fa fa-times"></span> {{ $message }}</div>
                                                @enderror
                                            </div>

                                            <button type="submit" class="btn btn-lg btn-primary full-width">ثبت و مرحله بعد</button>
                                                <p>
                                                    <a href="/login">ارسال مجدد کد فعالسازی</a>
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

@endsection
