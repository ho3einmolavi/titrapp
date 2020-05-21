@extends('admin.layout')
@section('title', 'اعضای خبر نامه')

@section('style')
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="/admin/newsletterexport" class="btn btn-success">خروجی اکسل <i class="fa fa-file-excel-o"></i></a>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">داشبورد</a></li>
                        <li class="breadcrumb-item active">اعضای خبر نامه</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">لیست اعضای خبرنامه</h3>

                            <div class="card-tools">
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>ایمیل</th>
                                    <th>تاریخ ثبت</th>
                                </tr>
                                @foreach($letters as $letter)

                                    <tr>
                                        <td>{{$letter->email}} </td>
                                        <td style="font-size: 12px">{{\Morilog\Jalali\Jalalian::forge($letter->created_at)->format('Y-m-d  H:i:s')}} </td>
                                        <td>
                                            <form action="{{ route('newsletter.destroy', $letter->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('برای حذف این آیتم اطمینان دارید؟')" class="btn btn-danger" type="submit">  حذف <i class="fa fa-trash"></i></button>
                                            </form>

                                        </td>
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
                {!! $letters->render() !!}
            </div>
        </div><!-- /.container-fluid -->
    </section>

@endsection


@section('script')
@endsection
