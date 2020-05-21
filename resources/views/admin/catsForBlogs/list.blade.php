@extends('admin.layout')
@section('title', 'دسته بندی نوشته ها')

@section('style')
@endsection


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('catsForBlogs.create') }}"  class="btn btn-primary">افزودن جدید <i class="fa fa-plus"></i></a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">داشبورد</a></li>
                        <li class="breadcrumb-item active">دسته بندی نوشته ها</li>
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
                            <h3 class="card-title">لیست دسته بندی نوشته ها</h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>نام</th>
                                    <th>بخش مربوطه</th>
                                    <th>عملیات</th>
                                </tr>
                                @foreach($cats as $skil)

                                    <tr>
                                        <td>{{$skil->name}} </td>
                                        <td>{{!empty($skil->category->name) ? $skil->category->name :''}} </td>
                                        <td>
                                            <form action="{{ route('catsForBlogs.destroy', $skil->id)}}" method="post">
                                                @if (\App\CategoryForBlog::where('parent_id',$skil->id)->count()>0)
                                                    <a target="_blank" href="{{ route('catsForBlogs.sub',$skil->id) }}"  class="btn btn-info">مشاهده زیر دسته ها <i class="fa fa-angle-double-left"></i></a>

                                                @endif

                                                <a href="{{ route('catsForBlogs.edit',$skil->id) }}"  class="btn btn-success">ویرایش <i class="fa fa-edit"></i></a>


                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('برای حذف این آیتم اطمینان دارید؟بار با تمام بازارچه هایش حذف خواهد شد!')" class="btn btn-danger" type="submit">  حذف <i class="fa fa-trash"></i></button>
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
                {!! $cats->render() !!}
            </div>
        </div><!-- /.container-fluid -->
    </section>

@endsection


@section('script')
@endsection
