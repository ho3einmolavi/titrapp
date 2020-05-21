@extends('admin.formLayout')
@section('title', 'ویرایش پلن')

@section('style')



@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('plan.index') }}" class="btn btn-success"><i
                                class="fa fa-arrow-right"></i> بازگشت به لیست </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">داشبورد</a></li>
                        <li class="breadcrumb-item active">ویرایش پلن</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <form class="form-horizontal" action="{{ route('plan.update',$plan->id) }}" method="post" enctype="multipart/form-data">
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
                                    <label for="title">عنوان پلن</label>
                                    <input type="text" id="title" class="form-control" name="title"
                                           placeholder="عنوان را وارد کنید"
                                           value="{{$plan->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="price">قیمت (تومان)</label>
                                    <input type="text" id="price" class="form-control number-format" name="price"
                                           placeholder="قیمت را وارد کنید"
                                           value="{{$plan->price}}">
                                </div>


                                <div class="form-group">
                                    <label for="dayCount">تعداد روز اعتبار (به عدد)</label>
                                    <input type="number" id="dayCount" class="form-control" name="dayCount"
                                           placeholder="تعداد روز را وارد کنید"
                                           value="{{$plan->dayCount}}">
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

    <script>
        var cleave = new Cleave('.number-format', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
    </script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()


        })
    </script>
@endsection