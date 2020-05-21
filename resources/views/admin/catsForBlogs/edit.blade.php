@extends('admin.formLayout')
@section('title', 'ویرایش تخصص')

@section('style')



@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="/admin/category-for-blogs" class="btn btn-success"><i
                                class="fa fa-arrow-right"></i> بازگشت به لیست </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">داشبورد</a></li>
                        <li class="breadcrumb-item active">ویرایش بخش</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <form class="form-horizontal" action="{{ route('catsForBlogs.update',$skil->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">اطلاعات مربوطه را وارد کرده و به روز رسانی کنید کنید</h3>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                @include('admin.sections.errors')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">نام تخصص</label>
                                    <input type="text" class="form-control" name="name" placeholder="نام را وارد کنید"
                                           value="{{$skil->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="type">دسته بندی</label>
                                    <select id="type" class="form-control select2" name="category_id"  style="width: 100%;">
                                        <option value="">انتخاب دسته بندی </option>
                                        @foreach(\App\Category::orderBy('name')->get() as $category)
                                            <option value="{{$category->id}}" {{$skil->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>زیر مجموعه کدام تخصص شود؟  </label>
                                    <select class="form-control select2" name="parent_id" style="width: 100%;">
                                        <option value="0">هیچکدام(دسته اصلی محصوب می شود) </option>
                                        @foreach(\App\CategoryForBlog::orderBy('name')->get() as $skil)
                                            <option value="{{$skil->id}}" {{$skil->parent_id == $skil->id ? 'selected' : ''}}>{{$skil->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{--<div class="form-group">--}}
                                    {{--<div class="input-group">--}}
                                         {{--<span class="input-group-btn">--}}
                                         {{--<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">--}}
                                   {{--<i class="fa fa-picture-o"></i> انتخاب آیکن--}}
                                   {{--</a>--}}
                                          {{--</span>--}}
                                        {{--<input id="thumbnail" class="form-control" type="text" name="image" value="{{$skil->image}}">--}}
                                    {{--</div>--}}
                                    {{--<img id="holder" style="margin-top:15px;max-height:100px;">--}}
                                {{--</div>--}}

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
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

    <script>
        $('#lfm').filemanager('image');

    </script>

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
