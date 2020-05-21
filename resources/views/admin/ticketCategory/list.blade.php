@extends('admin.layout')
@section('title', 'دسته بندی پشتیبانی')

@section('style')
@endsection


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('ticketCategory.create') }}"  class="btn btn-primary">افزودن جدید <i class="fa fa-plus"></i></a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">داشبورد</a></li>
                        <li class="breadcrumb-item active">دسته بندی پشتیبانی</li>
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
                            <h3 class="card-title">لیست دسته بندی ها</h3>

                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>کد</th>
                                    <th>نام</th>
                                    <th>عملیات</th>
                                </tr>
                                @foreach($ticketCategories as $tc)

                                    <tr>
                                        <td>{{$tc->id}} </td>
                                        <td>{{$tc->name}} </td>
                                        <td>
                                            <form action="{{ route('ticketCategory.destroy', $tc->id)}}" method="post">
                                                <a href="{{ route('ticketCategory.edit',$tc->id) }}"  class="btn btn-success">ویرایش <i class="fa fa-edit"></i></a>

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
            <div >
                {!! $ticketCategories->render() !!}
            </div>
        </div><!-- /.container-fluid -->
    </section>

@endsection


@section('script')
@endsection