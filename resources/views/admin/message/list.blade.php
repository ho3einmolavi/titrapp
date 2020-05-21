@extends('admin.layout')
@section('title', 'پیام ها')

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
                        <li class="breadcrumb-item active">اپیام ها</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">لیست پیام ها</h3>

                            <div class="card-tools">
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>فرستنده</th>
                                    <th>گیرنده</th>
                                    <th>متن</th>
                                    <th>تاریخ ثبت</th>
                                </tr>
                                @foreach($messages as $message)

                                    <tr>
                                        <td>
                                            {{!empty($message->sender->name)? $message->sender->name : ''}} -
                                            {{!empty($message->sender->phone)? $message->sender->phone : ''}}

                                        </td>

                                        <td>
                                            {{!empty($message->receiver->name)? $message->receiver->name : ''}} -
                                            {{!empty($message->receiver->phone)? $message->receiver->phone : ''}}

                                        </td>
                                        <td>{{$message->body}}</td>
                                        <td style="font-size: 12px">{{\Morilog\Jalali\Jalalian::forge($message->created_at)->format('Y-m-d  H:i:s')}} </td>
                                        <td>
                                            <form action="{{ route('message.destroy', $message->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('برای حذف این آیتم اطمینان دارید؟')" class="btn btn-danger" type="submit">  حذف <i class="fa fa-trash"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>

                </div>
            </div>
            <div>
                {!! $messages->render() !!}
            </div>
        </div>
    </section>

@endsection


@section('script')
@endsection
