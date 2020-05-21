@extends('admin.layout')
@section('title', 'پرداخت ها')

@section('style')
@endsection


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">داشبورد</a></li>
                        <li class="breadcrumb-item active">پرداخت ها</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->


        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">فیلتر اطلاعات</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('payment.index') }}" method="get">
                {{csrf_field()}}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>نوع فاکتور</label>
                                <select class="form-control select2" name="type"  style="width: 100%;">
                                    <option value="">همه موارد </option>
                                    @for ($i = 1; $i <= count(\App\Enums\PaymentType::getKeys()); $i++)
                                        <option value="{{$i}}" {{request('type') == $i ? 'selected' : ''}} >{{\App\Enums\PaymentType::getPaymentType($i)}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label> وضعیت فاکتور</label>
                                <select class="form-control select2" name="status"  style="width: 100%;">
                                    <option value="">همه موارد </option>
                                    @for ($i = 1; $i <= count(\App\Enums\PaymentStatus::getKeys()); $i++)
                                        <option value="{{$i}}" {{request('status') == $i ? 'selected' : ''}} >{{\App\Enums\PaymentStatus::getPaymentStatus($i)}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>کاربر</label>
                                <select class="form-control select2" name="user_id"  style="width: 100%;">
                                    <option value="">همه کاربران </option>
                                    @foreach(\App\User::orderBy('name')->get() as $user)
                                        <option value="{{$user->id}}" {{request('user_id') == $user->id ? 'selected' : ''}} >{{!empty($user->phone) ? $user->phone :$user->email}} - {{$user->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><span class="fa fa-filter"></span>   اعمال فیلتر </button>
                    <a href="{{route('payment.index')}}" class="btn btn-danger"><span class="fa fa-"></span>   حذف همه فیلتر ها </a>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">لیست کاربران</h3>

                            <div class="card-tools">

                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tr>
                                    <th >کاربر</th>
                                    <th >مبلغ</th>
                                    <th >نوع</th>
                                    <th >وضعیت</th>
                                    <th >پلن</th>
                                    <th >محصول</th>
                                    <th >زمان</th>
                                    <th > ارجاع بانک</th>
                                </tr>
                                @foreach($payments as $payment)

                                    <tr>
                                        <td>{{$payment->user->name   }} - {{!empty($payment->user->phone) ? $payment->user->name   : $payment->user->email }}</td>
                                        <td>{{!empty($payment->price) ? number_format($payment->price): 'نامشخص'}}</td>
                                        <td>{{!empty($payment->type) ? \App\Enums\PaymentType::getPaymentType($payment->type) :  'نامشخص'}}</td>
                                        <td>{{!empty($payment->status) ? \App\Enums\PaymentStatus::getPaymentStatus($payment->status) :  'نامشخص'}}</td>
                                        <td style="font-size: 12px">{{\Morilog\Jalali\Jalalian::forge($payment->created_at)->format('Y-m-d  H:i:s')}} </td>
                                        <td>{{$payment->bankref}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div><!-- /.row -->
            <div>
                {!! $payments
              ->appends( [
              'type'=>request('type'),
              'status'=>request('status'),
              'user_id'=>request('user_id'),
             ])
              ->render() !!}
            </div>
        </div><!-- /.container-fluid -->
    </section>

@endsection


@section('script')
    <script>
        $(function () {
            $('.select2').select2()

        })


    </script>
@endsection
