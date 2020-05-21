@extends('admin.layout')
@section('title', 'بخش های اصلی')

@section('style')
@endsection


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('category.create') }}"  class="btn btn-primary">افزودن جدید <i class="fa fa-plus"></i></a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">داشبورد</a></li>
                        <li class="breadcrumb-item active">بخش های اصلی</li>
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
                            <h3 class="card-title">لیست بخش های اصلی</h3>

                            <div class="card-tools">

                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>نام</th>
                                    <th>تصویر</th>
                                    <th>توضیحات</th>
                                    <th>عملیات</th>
                                    <th>ترتیب</th>
                                </tr>
                                @foreach($ctegories as $category)

                                    <tr>
                                        <td>{{$category->name}} </td>
                                        <td><img src="{{$category->image}}" style="height: 50px ; width: 50px" alt=""></td>
                                        <td>{{$category->description}}</td>
                                        <td>
                                            <form action="{{ route('category.destroy', $category->id)}}" method="post">
                                                <a href="{{ route('category.edit',$category->id) }}"  class="btn btn-success">ویرایش <i class="fa fa-edit"></i></a>


                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('برای حذف این آیتم اطمینان دارید؟بار با تمام بازارچه هایش حذف خواهد شد!')" class="btn btn-danger" type="submit">  حذف <i class="fa fa-trash"></i></button>
                                            </form>

                                        </td>
                                        <td>{{ $category->sort }}</td>

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
                {!! $ctegories->render() !!}
            </div>
        </div><!-- /.container-fluid -->
    </section>

@endsection


@section('script')
@endsection
