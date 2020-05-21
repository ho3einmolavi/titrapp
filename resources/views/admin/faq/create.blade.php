@extends('admin.formLayout')
@section('title', 'سوالات متداول')

@section('style')



@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('faq.index') }}" class="btn btn-success"><i
                                class="fa fa-arrow-right"></i> بازگشت به لیست </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">داشبورد</a></li>
                        <li class="breadcrumb-item active">افزودن سوال متداول</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form class="form-horizontal" action="{{ route('faq.store') }}" method="post">
                {{ csrf_field() }}
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">اطلاعات مربوطه را وارد کرده و ثبت کنید</h3>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                @include('admin.sections.errors')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">سوال</label>
                                    <input  type="text" class="form-control" name="question" placeholder="سوال"
                                           value="{{old('question')}}">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">پاسخ</label>
                                    <textArea class="form-control" name="answere">{{old('answere')}}</textArea>

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
        CKEDITOR.replace('answere');

    </script>

@endsection
