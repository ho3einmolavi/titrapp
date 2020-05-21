@extends('admin.formLayout')
@section('title', 'ویرایش کاربر')

@section('style')



@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('user.index') }}" class="btn btn-success"><i
                                class="fa fa-arrow-right"></i> بازگشت به لیست </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">داشبورد</a></li>
                        <li class="breadcrumb-item active">ویرایش کاربر</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <form class="form-horizontal" action="{{ route('user.update',$user->id) }}" method="post"
                  enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">اطلاعات مربوطه را وارد کرده و ثبت کنید</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            @include('admin.sections.errors')
                            <div class="form-group">
                                <label for="exampleInputEmail1">شماره موبایل</label>
                                <input type="text" disabled="" class="form-control" name="phone" placeholder="شماره موبایل را وارد کنید"
                                       value="{{$user->phone}}">
                            </div>
                            <div class="form-group">
                                <label for="name">نام و نام خانوادگی</label>
                                <input type="text" id="name" class="form-control" name="name" placeholder="نام و نام خانوادگی"
                                       value="{{$user->name}}">
                            </div>



                            <div class="form-group">
                                <label for="email">ایمیل</label>
                                <input type="text" id="email" class="form-control" name="email"
                                       placeholder="ایمیل" value="{{$user->email}}">
                            </div>

                            <div class="form-group">
                                <label>
                                    <input value="1" {{$user->active == true ? 'checked' : ''}} name="active" type="checkbox" class="minimal">
                                    فعال
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>نوع کاربری</label>
                                <select class="form-control select2" name="type" required style="width: 100%;">
                                    <option value="" >نوع کاربری را انتخاب کنید</option>

                                    @for ($i = 1; $i <= count(\App\Enums\UserType::getKeys())  ; $i++)
                                        <option value="{{$i}}" {{$user->type == $i ? 'selected' : ''}}>{{\App\Enums\userType::getUserType($i)}}</option>
                                    @endfor

                                </select>
                            </div>
                            <div class="form-group">
                                <label>شهر</label>
                                <select class="form-control select2" name="city_id" style="width: 100%;">
                                    <option value="">انتخاب شهر</option>
                                    @foreach(\App\City::all() as $city)
                                        <option value="{{$city->id}}" {{$user->city_id == $city->id ? 'selected' : ''}}>{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>محل نمایش کاربر</label>
                                <select class="form-control select2" name="position"  style="width: 100%;">
                                    <option value="" >هیچکدام</option>
                                    @for ($i = 1; $i <= count(\App\Enums\UserPoistion::getKeys())  ; $i++)
                                        <option value="{{$i}}" {{$user->position == $i ? 'selected' : ''}}>{{\App\Enums\UserPoistion::getUserPosition($i)}}</option>
                                    @endfor

                                </select>
                            </div>


                            <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fa fa-info"></i> تاریخ انقضا عضویت ویژه </h5>
                                اتمام عضویت ویژه :  {{\Morilog\Jalali\Jalalian::forge($user->vipTime)->format('Y/m/d   -    H:i:s')}}
                            </div>

                            <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fa fa-info"></i> وضعیت فعلی کاربر </h5>
                                {{$user->isVip() == true ? ' عضویت ویژه ' : ' عضویت معمولی '}}
                            </div>

                            <div class="form-group">
                                <label for="grade">افزودن یا کسر  تعداد روز عضویت ویژه</label>
                                <input type="number" id="vip" class="form-control" name="vip"
                                       placeholder="تعداد روز را وارد کنید" value="{{old('vip')}}">
                            </div>


                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">به روز رسانی اطلاعات</button>
                </div>

            </div>


            </form>
        </div>
    </section>
@endsection


@section('script')

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
            //Money Euro
            $('[data-mask]').inputmask()

            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            })
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            })
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            })

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()


            $('.normal-example').persianDatepicker();


        })
    </script>
@endsection
