@extends('admin.formLayout')
@section('title', 'ارسال نوتیفیکیشن')

@section('style')



@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <form class="form-horizontal" action="{{ route('sendNotification') }}" method="post"
                  enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">اطلاعات مربوطه را وارد کرده و ارسال کنید</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                @include('admin.sections.errors')

                                <div class="form-group">
                                    <label for="exampleInputEmail1">عنوان نوتیفیکشن</label>
                                    <input type="text" class="form-control" name="title" placeholder="عنوان"  value="{{old('title')}}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">متن نوتیفیکیشن</label>
                                    <input type="text" class="form-control" name="body" placeholder="متن"  value="{{old('body')}}">
                                </div>

                                <div class="form-group">
                                    <label> کاربران</label>
                                    <select class="form-control select2" name="user[]" multiple="multiple"
                                            data-placeholder=" کاربران مورد نظر را انتخاب کنید"
                                            style="width: 100%;text-align: right">
                                        @foreach(\App\User::all() as $user)
                                            <option value="{{$user->id}}" @if(old('category')){{{ in_array(trim($user->id) , old('user')) ? 'selected' : ''  }}} @endif >{{$user->first_name}} {{$user->last_name}}    {{$user->phone}}    {{$user->username}}</option>
                                        @endforeach

                                    </select>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">ارسال نوتیفیکیشن به کاربران انتخاب شده</button>
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
