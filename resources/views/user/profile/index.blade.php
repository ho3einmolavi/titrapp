@extends('front.frontLayout')
@section('title', 'پروفایل من')

@section('style')

@endsection

@section('content')


    @include('user.sections.profileHeader')
    <div class="container">
        <div class="row">
            <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">اطلاعات پروفایل</h6>
                    </div>
                    <div class="ui-block-content">
                        <form class="form-horizontal" action="{{route('updateProfile')}}" method="post"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label"> نام و نام خانوادگی</label>
                                        <input class="form-control" placeholder="" type="text" name="name"
                                               value="{{$user->name}}">
                                        @error('name')
                                        <div style="margin-top:8px; color: red; font-size: 12px;"><span
                                                    style="margin-left: 4px;" class="fa fa-times"></span> {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group label-floating">
                                        <label class="control-label">ایمیل </label>
                                        <input class="form-control" placeholder="" name="email" type="email"
                                               value="{{$user->email}}">
                                        @error('email')
                                        <div style="margin-top:8px; color: red; font-size: 12px;"><span
                                                    style="margin-left: 4px;" class="fa fa-times"></span> {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                         <span class="input-group-btn">
                                         <a id="lfm" data-input="thumbnail" data-preview="holder"
                                            class="btn btn-primary text-white">
                                   <i class="fa fa-picture-o"></i> انتخاب تصویر پروفایل
                                   </a>

                                          </span>
                                            <input id="thumbnail" type="hidden" value="{{$user->image}}" name="image">

                                        </div>
                                    </div>

                                    <div class="form-group label-floating">

                                    <img id="myImage" class="img-thumbnail" src="" style="height: 100px;width: 100px;"
                                         alt="">
                                    </div>
                                    <div class="form-group">
                                        <label>زمینه کاری </label>
                                        <select class="form-control select2" name="category[]" multiple="multiple"
                                                data-placeholder=" زمینه کاری را انتخاب کنید"
                                                style="width: 100%;text-align: right">
                                            @foreach(\App\Category::all() as $category)
                                                <option value="{{$category->id}}" {{ in_array(trim($category->id) , $user->categories->pluck('id')->toArray()) ? 'selected' : ''  }}>{{ $category->name }} </option>
                                            @endforeach

                                        </select>
                                    </div>


                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">شماره موبایل</label>
                                        <input class="form-control" disabled placeholder="" type="text"
                                               value="{{$user->phone}}">
                                    </div>


                                    <div class="form-group label-floating ">
                                        <label class="control-label">شماره تماس برای نمایش </label>
                                        <input class="form-control" name="phoneshow" value="{{$user->phoneshow}}"
                                               placeholder="" type="text">
                                    </div>

                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">در مورد خودتان بنویسید</label>
                                        <textarea class="form-control" name="bio"
                                                  placeholder="">{{$user->bio}}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">


                                    <div class="form-group ">
                                        <label class="my-1 mr-2" for="city">استان</label>
                                        <select class=" custom-select dynamic" id="province">
                                            <option value="">استان خود را انتخاب کنید</option>
                                            @foreach(\App\Province::orderBy('name')->get() as $province)
                                                <option value="{{$province->id}}" {{ !empty(\App\City::find($user->city_id)->province_id) ? \App\City::find($user->city_id)->province_id == $province->id ? 'selected' : '' : '' }}>{{$province->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="my-1 mr-2" for="city">شهر</label>
                                        <select class="custom-select  cityId" id="city" name="city_id">
                                            @if(!empty($user->city_id))
                                                @if(!empty(\App\City::find($user->city_id)->province_id))

                                                    @foreach(\App\City::where('province_id',\App\City::find($user->city_id)->province_id)->get() as $city)
                                                        <option value="{{$city->id}}" {{$user->city_id == $city->id ? 'selected' : ''}} >{{$city->name}}</option>
                                                    @endforeach
                                                @endif

                                            @else
                                                <option value="">لطفا ابتدا استان خود را انتخاب کنید</option>

                                            @endif
                                        </select>
                                    </div>
                                </div>


                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group with-icon label-floating">
                                        <label class="control-label">لینک اینستگرام</label>
                                        <input class="form-control" type="text" name="instagram"
                                               value="{{$user->instagram}}">
                                        <i class="fa fa-instagram " aria-hidden="true"></i>
                                    </div>
                                    <div class="form-group with-icon label-floating">
                                        <label class="control-label">لینک تلگرام</label>
                                        <input class="form-control" type="text" name="telegram"
                                               value="{{$user->telegram}}">
                                        <i class="fa fa-send" aria-hidden="true"></i>
                                    </div>
                                    <div class="form-group with-icon label-floating ">
                                        <label class="control-label">لینک واتس اپ</label>
                                        <input class="form-control" type="text" name="whatsapp"
                                               value="{{$user->whatsapp}}">
                                        <i class="fa fa-whatsapp " aria-hidden="true"></i>
                                    </div>

                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <button class="btn btn-primary btn-lg full-width">ثبت تغییرات</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>


            @include('user.sections.profileSidebar')
        </div>
    </div>

@endsection

@section('script')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>


    <script>
        $(document).ready(function () {

            $('#thumbnail').change(function () {

                var image = $("#thumbnail").val();

                $('#myImage').attr('src', image);

            });
        });
    </script>

    <script>
        $('#lfm').filemanager('image');

    </script>
    <script>
        $(document).ready(function () {
            $('.dynamic').change(function () {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: "{{route('getCityByProvince')}}",
                        method: "POST",
                        data: {
                            select: select, value: value,
                            _token: _token
                        },
                        success: function (result) {
                            console.log(result);
                            $('.cityId').html(result);
                        }

                    })

                }
            });
        });
    </script>

@endsection
