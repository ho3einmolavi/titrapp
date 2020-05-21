@extends('admin.layout')
@section('title', 'شهر ها')

@section('style')
@endsection


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('city.create') }}"  class="btn btn-primary">افزودن جدید <i class="fa fa-plus"></i></a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">داشبورد</a></li>
                        <li class="breadcrumb-item active">شهر ها</li>
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
            <form class="form-horizontal" action="{{ route('city.index') }}" method="get">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>استان</label>
                                <select class="form-control select2" name="province_id"  style="width: 100%;">
                                    <option value="">همه استان ها </option>
                                    @foreach(\App\Province::orderBy('name')->get() as $province)
                                        <option value="{{$province->id}}"  {{request('province_id') == $province->id ? 'selected' :''}} >{{$province->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><span class="fa fa-filter"></span>   اعمال فیلتر </button>
                    <a href="{{route('city.index')}}" class="btn btn-danger"><span class="fa fa-"></span>   حذف همه فیلتر ها </a>
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
                            <h3 class="card-title">لیست شهر ها</h3>

                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>کد</th>
                                    <th>نام</th>
                                    <th>استان</th>
                                    <th>دارای نمایندگی؟</th>
                                    <th>عملیات</th>
                                </tr>
                                @foreach($cities as $city)

                                    <tr>
                                        <td>{{$city->id}} </td>
                                        <td>{{$city->name}} </td>
                                        <td>{{!empty(\App\Province::find($city->province_id)->name) ?\App\Province::find($city->province_id)->name : '' }} </td>
                                        <td>{{$city->agency == true ? 'بلی' : 'خیر'}} </td>
                                        <td>
                                            <form action="{{ route('city.destroy', $city->id)}}" method="post">
                                                <a href="{{ route('city.edit',$city->id) }}"  class="btn btn-success">ویرایش <i class="fa fa-edit"></i></a>

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
                {!! $cities->appends(['province_id'=>request('province_id')])->render() !!}
            </div>
        </div>
    </section>

@endsection


@section('script')
@endsection