@extends('admin.formLayout')
@section('title', 'ویرایش اسلایدر')

@section('style')



@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('slider.index') }}" class="btn btn-success"><i
                                class="fa fa-arrow-right"></i> بازگشت به لیست </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">داشبورد</a></li>
                        <li class="breadcrumb-item active">ویرایش اسلایدر</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <form class="form-horizontal" action="{{ route('slider.update',$slider->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">اطلاعات مربوطه را وارد کرده و به روز رسانی کنید کنید</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                @include('admin.sections.errors')
                                <div class="form-group">
                                    <label for="title">عنوان </label>
                                    <input type="text" id="title" class="form-control" name="title"
                                           placeholder="عنوان را وارد کنید"
                                           value="{{$slider->title}}">
                                </div>

                                <div class="form-group">
                                    <label for="button">عنوان دکمه </label>
                                    <input type="text" id="button" class="form-control" name="button"
                                           placeholder="عنوان دکمه"
                                           value="{{$slider->button}}">
                                </div>

                                <div class="form-group">
                                    <label for="link">لینک</label>
                                    <input type="text" id="link" class="form-control" name="link"
                                           placeholder="لینک را وارد کنید"
                                           value="{{$slider->link}}">
                                </div>

                                <div class="form-group">
                                    <label for="sort">ترتیب</label>
                                    <input type="text" id="sort" class="form-control" name="sort"
                                           placeholder="ترتیب را وارد کنید"
                                           value="{{$slider->sort}}">
                                </div>


                            </div>
                            <div class="col-md-6">

                                <br>
                                <div class="form-group">
                                    <div class="input-group">
                                         <span class="input-group-btn">
                                         <a style="color: white;"  id="lfm" data-input="background" data-preview="holder" class="btn btn-primary">
                                   <i class="fa fa-picture-o"></i>  تصویر پس زمینه
                                   </a>
                                          </span>
                                        <input id="background" class="form-control" type="text" name="background" value="{{$slider->background}}">
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputFile"> تصویر پس زمینه</label>
                                    <div class="input-group">
                                        <img src="{{$slider->background}}" style="height: 200px; width: 200px;" alt="">
                                    </div>
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

    <script src="/assets/dist/js/cleave.min.js"></script>

    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

    <script>
        $('#lfm').filemanager('image');
        $('#lfm2').filemanager('image');
        $('#lfm3').filemanager('image');
    </script>
@endsection
