@extends('admin.formLayout')
@section('title', 'افزودن شهر')

@section('style')



@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('city.index') }}" class="btn btn-success"><i
                                class="fa fa-arrow-right"></i> بازگشت به لیست </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">داشبورد</a></li>
                        <li class="breadcrumb-item active">افزودن شهر</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form class="form-horizontal" action="{{ route('city.store') }}" method="post">
                {{ csrf_field() }}
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">اطلاعات مربوطه را وارد کرده و ثبت کنید</h3>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                @include('admin.sections.errors')

                                <div class="form-group">
                                    <label for="exampleInputEmail1">نام شهر</label>
                                    <input required type="text" class="form-control" name="name" placeholder="نام را وارد کنید"
                                           value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label>استان</label>
                                    <select class="form-control select2" name="province_id" required style="width: 100%;">
                                        <option value="" >انتخاب استان ...</option>
                                        @foreach (\App\Province::orderBy('name')->get() as $province)
                                            <option value="{{$province->id}}" {{old('province_id') == $province->id ? 'selected' : ''}}>{{$province->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input value="1" {{old('agency') == 1 ? 'checked' : ''}} name="agency" type="checkbox" class="minimal">
                                        دارای نمایندگی
                                    </label>
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
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();

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

        })
    </script>

@endsection
