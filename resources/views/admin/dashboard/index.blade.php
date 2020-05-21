@extends('admin.layout')
@section('title', 'داشبورد')

@section('style')
@endsection


@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">داشبورد</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{\App\Payment::all()->count()}}</h3>
                            <p>پرداخت ها </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-folder-open"></i>
                        </div>
                        <a href="/admin/payment" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{\App\Ticket::all()->count()}}<sup style="font-size: 20px"></sup></h3>

                            <p>تیکت</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-ticket"></i>
                        </div>
                        <a href="/admin/ticket" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{\App\User::all()->count()}}</h3>

                            <p>کاربران ثبت شده</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="/admin/user" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{\App\Message::all()->count()}}</h3>

                            <p>پیام ثبت شده</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <a href="/admin/message" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

@section('script')
@endsection
