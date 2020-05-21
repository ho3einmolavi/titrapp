@extends('admin.formLayout')
@section('title', 'ویرایش نوشته')

@section('style')

    <link rel="stylesheet" href="/assets/dist/taginput/tagsinput.css">


@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('blog.index') }}" class="btn btn-success"><i
                                class="fa fa-arrow-right"></i> بازگشت به لیست </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">داشبورد</a></li>
                        <li class="breadcrumb-item active">ویرایش نوشته</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <form class="form-horizontal" action="{{ route('blog.update',$blog->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{method_field('PATCH')}}
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">اطلاعات مربوطه را وارد کرده و به روز رسانی کنید کنید</h3>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                @include('admin.sections.errors')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">عنوان نوشته</label>
                                    <input type="text" class="form-control" name="title" placeholder="عنوان را وارد کنید"
                                           value="{{$blog->title}}">
                                </div>

                                <div class="form-group">
                                    <label for="type">دسته بندی</label>
                                    <select id="type" class="form-control select2" name="category_id"  style="width: 100%;">
                                        <option value="">انتخاب دسته بندی </option>
                                        @foreach(\App\Category::orderBy('name')->get() as $category)
                                            <option value="{{$category->id}}" {{$blog->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                         <span class="input-group-btn">
                                         <a style="color: white;" id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                   <i class="fa fa-picture-o"></i> انتخاب تصویر
                                   </a>
                                          </span>
                                        <input id="thumbnail" class="form-control" type="text" name="image" value="{{$blog->image}}">
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                         <span class="input-group-btn">
                                         <a style="color: white;" id="lfm2" data-input="videoUrl" data-preview="holder" class="btn btn-primary">
                                   <i class="fa fa-video-camera"></i>  ویدیو
                                   </a>
                                          </span>
                                        <input id="videoUrl" class="form-control" type="text" name="video" value="{{$blog->video}}">
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                </div>


                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="body">توضیحات دوره</label>
                                    <textArea id="body" name="body" class="form-control">{{$blog->body}}</textArea>
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

    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body');
    </script>


    <script>
        var cleave = new Cleave('.number-format', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
    </script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

    <script>
        $('#lfm').filemanager('image');
        $('#lfm2').filemanager('file');

    </script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        })
    </script>
@endsection
