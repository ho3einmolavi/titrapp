@extends('admin.formLayout')
@section('title', 'اطلاعات کلی')

@section('style')



@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">داشبورد</a></li>
                        <li class="breadcrumb-item active">طلاعات کلی</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">


            @if(empty($general->id))
                <form class="form-horizontal" action="{{ route('general.store') }}" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @else
                        <form class="form-horizontal" action="{{ route('general.update',$general->id) }}" method="post"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            @endif


                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">همه فیلد ها اختیاری می باشند</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            @include('admin.sections.errors')
                                            <div class="form-group">
                                                <label for="phone1">شماره تماس 1</label>
                                                <input type="text" style="text-align: left;" class="form-control"
                                                       id="phone1" name="phone1" placeholder="شماره تماس1"
                                                       value="{{!empty($general->phone1)? $general->phone1 : ''}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="phone2">شماره تماس 2</label>
                                                <input type="text" style="text-align: left;" class="form-control"
                                                       id="phone2" name="phone2" placeholder="شماره تماس2"
                                                       value="{{!empty($general->phone2) ? $general->phone2 :''}}">
                                            </div>


                                            <div class="form-group">
                                                <label for="phone2"> ایمیل</label>
                                                <input type="text" style="text-align: left;" class="form-control"
                                                       id="email" name="email" placeholder="example@yahoo.com"
                                                       value="{{!empty($general->email) ? $general->email : ''}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="address">آدرس</label>
                                                <textArea rows="5" name="address" class="form-control"
                                                          id="address">{{!empty($general->address)? $general->address : ''}}</textArea>
                                            </div>

                                            <div class="form-group">
                                                <label for="aboutus">درباره ما</label>
                                                <textArea rows="5" name="aboutus" class="form-control"
                                                          id="aboutus">{{!empty($general->aboutus) ? $general->aboutus : ''}}</textArea>
                                            </div>

                                            <div class="form-group">
                                                <label for="guide">توضیحاتی درباره اپلیکیشن(راهنما)</label>
                                                <textArea rows="5" name="guide" class="form-control"
                                                          id="aboutus">{{!empty($general->guide) ? $general->guide : ''}}</textArea>
                                            </div>





                                        </div>
                                        <div class="col-md-6">
                                            @include('admin.sections.errors')


                                            <div class="form-group">
                                                <label for="android">لینک مستقیم اندروید</label>
                                                <input type="text" style="text-align: left;" class="form-control"
                                                       id="instagram" name="android"
                                                       placeholder=""
                                                       value="{{!empty($general->android)? $general->android : ''}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="googleplay">لینک گوگل پلی</label>
                                                <input type="text" style="text-align: left;" class="form-control"
                                                       id="googleplay" name="googleplay"
                                                       placeholder=""
                                                       value="{{!empty($general->googleplay)? $general->googleplay : ''}}">
                                            </div>


                                            <div class="form-group">
                                                <label for="sibche">لینک سیبچه</label>
                                                <input type="text" style="text-align: left;" class="form-control"
                                                       id="sibche" name="sibche"
                                                       placeholder=""
                                                       value="{{!empty($general->sibche)? $general->sibche : ''}}">
                                            </div>


                                            <div class="form-group">
                                                <label for="iapps">لینک آی اَپس</label>
                                                <input type="text" style="text-align: left;" class="form-control"
                                                       id="iapps" name="iapps"
                                                       placeholder=""
                                                       value="{{!empty($general->iapps)? $general->iapps : ''}}">
                                            </div>


                                            <div class="form-group">
                                                <label for="phone1">اینستگرام</label>
                                                <input type="text" style="text-align: left;" class="form-control"
                                                       id="instagram" name="instagram"
                                                       placeholder="http://instagram.com/example"
                                                       value="{{!empty($general->instagram)? $general->instagram : ''}}">
                                            </div>


                                            <div class="form-group">
                                                <label for="phone1">تلگرام</label>
                                                <input type="text" style="text-align: left;" class="form-control"
                                                       id="telegram" name="telegram"
                                                       placeholder="https://telegram.me/example"
                                                       value="{{!empty($general->telegram)? $general->telegram : ''}}">
                                            </div>


                                            <div class="form-group">
                                                <label for="phone1">واتس اَپ</label>
                                                <input type="text" style="text-align: left;" class="form-control"
                                                       id="whatsapp" name="whatsapp" placeholder="09"
                                                       value="{{!empty($general->whatsapp)? $general->whatsapp : ''}}">
                                            </div>


                                            <div class="form-group">
                                                <label for="phone1">فیسبوک</label>
                                                <input type="text" style="text-align: left;" class="form-control"
                                                       id="facebook" name="facebook"
                                                       placeholder="https://facebook.com/example"
                                                       value="{{!empty($general->facebook)? $general->facebook : ''}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="phone1">توئیتر</label>
                                                <input type="text" style="text-align: left;" class="form-control"
                                                       id="twitter" name="twitter"
                                                       placeholder="http://twitter.com/example"
                                                       value="{{!empty($general->twitter)? $general->twitter : ''}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="guide">خدمات </label>
                                                <textArea  rows="5" name="services" class="form-control"
                                                          id="aboutus">{{!empty($general->services) ? $general->services : ''}}</textArea>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">ثبت اطلاعات</button>
                                </div>
                            </div>

                        </form>


        </div>
    </section>
@endsection


@section('script')

    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('services');
        CKEDITOR.replace('aboutus');
        CKEDITOR.replace('guide');
    </script>
@endsection
