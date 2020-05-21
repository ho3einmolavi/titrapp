@extends('admin.layout')
@section('title', 'نوشته ها')

@section('style')
@endsection


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('blog.create') }}" class="btn btn-primary">افزودن جدید <i
                                class="fa fa-plus"></i></a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">داشبورد</a></li>
                        <li class="breadcrumb-item active">نوشته ها</li>
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
                            <h3 class="card-title">لیست نوشته ها</h3>

                            <div class="card-tools">
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>عنوان</th>
                                    <th>دسته بندی</th>
                                    <th>تعداد بازدید</th>
                                    <th>تاریخ ثبت</th>
                                    <th>تصویر</th>
                                    <th>عملیات</th>
                                </tr>
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{$blog->title}} </td>
                                        <td>{{!empty($blog->category->name) ? $blog->category->name : ''}} </td>
                                        <td>{{$blog->view}}</td>
                                        <td><img src="{{$blog->image}}" style="height: 40px ; width: 40px;"
                                                 class="img-thumbnail" alt=""></td>
                                        <td style="font-size: 12px">{{\Morilog\Jalali\Jalalian::forge($blog->created_at)->format('Y-m-d  H:i:s')}} </td>
                                        <td>
                                            <form action="{{ route('blog.destroy', $blog->id)}}" method="post">
                                                <a href="{{ route('blog.edit',$blog->id) }}"
                                                   class="btn btn-success">ویرایش <i class="fa fa-edit"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('برای حذف این آیتم اطمینان دارید؟بار با تمام بازارچه هایش حذف خواهد شد!')"
                                                        class="btn btn-danger" type="submit"> حذف <i
                                                            class="fa fa-trash"></i></button>
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
                {!! $blogs->render() !!}
            </div>
        </div>
    </section>

@endsection


@section('script')
@endsection
