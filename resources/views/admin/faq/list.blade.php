@extends('admin.layout')
@section('title', ' سوالات متداول')

@section('style')
@endsection


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('faq.create') }}"  class="btn btn-primary">افزودن جدید <i class="fa fa-plus"></i></a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">داشبورد</a></li>
                        <li class="breadcrumb-item active">سوالات متداول</li>
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
                            <h3 class="card-title">لیست سوالات متداول</h3>

                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>سوال</th>
                                    <th>عملیات</th>
                                </tr>
                                @foreach($faqs as $faq)

                                    <tr>
                                        <td>{{$faq->question}} </td>
                                        <td>
                                            <form action="{{ route('faq.destroy', $faq->id)}}" method="post">
                                                <a href="{{ route('faq.edit',$faq->id) }}"  class="btn btn-success">ویرایش <i class="fa fa-edit"></i></a>

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

            <div >
                {!! $faqs->render() !!}
            </div>
        </div>
    </section>

@endsection


@section('script')
@endsection
