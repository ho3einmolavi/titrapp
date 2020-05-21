@extends('admin.layout')
@section('title', 'تخصص ها')

@section('style')
@endsection


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('skil.create') }}"  class="btn btn-primary">افزودن جدید <i class="fa fa-plus"></i></a>
                    <a href="{{ route('skil.index') }}" class="btn btn-success"><i
                                class="fa fa-arrow-right"></i> بازگشت به لیست </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">داشبورد</a></li>
                        <li class="breadcrumb-item active">تخصص ها</li>
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
                            <h3 class="card-title">لیست تخصص ها</h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>نام</th>
                                    <th>بخش مربوطه</th>
                                    <th>آیکن</th>
                                    <th>عملیات</th>
                                </tr>
                                @foreach($skils as $skil)

                                    <tr>
                                        <td>{{$skil->name}} </td>
                                        <td>{{!empty($skil->category->name) ? $skil->category->name :''}} </td>
                                        <td><img src="{{$skil->image}}" style="height: 50px ; width: 50px" alt=""></td>
                                        <td>
                                            <form action="{{ route('skil.destroy', $skil->id)}}" method="post">
                                                @if (\App\Skil::where('parent_id',$skil->id)->count()>0)
                                                    <a target="_blank" href="{{ route('subskil',$skil->id) }}"  class="btn btn-info">مشاهده زیر دسته ها <i class="fa fa-angle-double-left"></i></a>

                                                @endif

                                                <a href="{{ route('skil.edit',$skil->id) }}"  class="btn btn-success">ویرایش <i class="fa fa-edit"></i></a>


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
                {!! $skils->render() !!}
            </div>
        </div><!-- /.container-fluid -->
    </section>

@endsection


@section('script')
@endsection
