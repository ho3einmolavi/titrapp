@extends('admin.formLayout')
@section('title', 'ویرایش بخش')

@section('style')



@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('category.index') }}" class="btn btn-success"><i
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

            <form class="form-horizontal" action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form-data">
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
                                    <label for="exampleInputEmail1">نام بخش</label>
                                    <input type="text" class="form-control" name="name" placeholder="نام را وارد کنید"
                                           value="{{$category->name}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">توضیح بخش</label>
                                    <input type="text" class="form-control" name="description" placeholder="توضیح را وارد کنید"
                                           value="{{$category->description}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">ترتیب</label>
                                    <input type="number" class="form-control" name="sort" placeholder="ترتیب را وارد کنید"
                                           value="{{$category->sort}}">
                                </div>

                                <br>
                                <div class="form-group">
                                    <div class="input-group">
                                         <span class="input-group-btn">
                                         <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                   <i class="fa fa-picture-o"></i> انتخاب تصویر
                                   </a>
                                          </span>
                                        <input id="thumbnail" class="form-control" type="text" value="{{$category->image}}" name="filepath">

                                    </div>
                                    <img  id="thumbnail"  value="{{$category->image}}" style="margin-top:15px;max-height:100px;">
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputFile">تصویر فعلی</label>
                                    <div class="input-group">
                                        <img src="{{$category->image}}" style="height: 200px; width: 200px;" alt="">
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
