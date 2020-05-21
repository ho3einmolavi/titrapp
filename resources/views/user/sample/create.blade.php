@extends('front.frontLayout')
@section('title', 'افزودن نمونه کار')

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
                        <form class="form-horizontal" action="{{route('storeSample')}}" method="post"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group label-floating">

                                        <label class="control-label"> عنوان و توضیح</label>
                                        <input class="form-control" placeholder="" type="text" name="title"
                                               value="{{old('title')}}">
                                        @error('title')
                                        <div style="margin-top:8px; color: red; font-size: 12px;"><span
                                                    style="margin-left: 4px;" class="fa fa-times"></span> {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <select name="type" id="">
                                            <option value="">نوع نمونه کار را انتخاب کنید</option>
                                            @for ($i = 1; $i <= count(\App\Enums\SampleType::getKeys())  ; $i++)
                                                <option value="{{$i}}" {{old('type') == $i ? 'selected' : ''}}>{{\App\Enums\SampleType::getSampleType($i)}}</option>
                                            @endfor
                                        </select>

                                        @error('type')
                                        <div style="margin-top:8px; color: red; font-size: 12px;"><span
                                                    style="margin-left: 4px;" class="fa fa-times"></span> {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <br/>
                                    <br/>
                                    <div class="form-group label-floating ">
                                        <div class="file-upload">
                                            <label for="upload" class="file-upload__label bg-blue">فایل نمونه کار را انتخاب کنید</label>
                                            <input id="upload" class="file-upload__input" type="file" name="file">
                                        </div>
                                        @error('file')
                                        <div style="margin-top:8px; color: red; font-size: 12px;"><span
                                                    style="margin-left: 4px;" class="fa fa-times"></span> {{ $message }}
                                        </div>
                                        @enderror
                                    </div>



                                    <div class="form-group label-floating">

                                        <label class="control-label">لینک مربوطه (اختیاری)</label>
                                        <input class="form-control" placeholder="" type="text" name="link"
                                               value="{{old('link')}}">

                                    </div>


                                </div>



                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <button class="btn btn-primary btn-lg full-width">افزودن نمونه کار</button>
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
@endsection
