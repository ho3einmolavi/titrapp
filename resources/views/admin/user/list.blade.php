@extends('admin.layout')
@section('title', 'کاربران')

@section('style')
@endsection


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('user.create') }}"  class="btn btn-primary">افزودن جدید <i class="fa fa-plus"></i></a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">داشبورد</a></li>
                        <li class="breadcrumb-item active">کاربران</li>
                    </ol>
                </div>
            </div>
        </div>


        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">فیلتر اطلاعات</h3>
            </div>
            <form class="form-horizontal" action="{{ route('user.index') }}" method="get">
                {{csrf_field()}}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name" class=" control-label">نام یا نام خانوادگی</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="code" value="{{request('name')}}" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="phone" class=" control-label">شماره تلفن</label>
                                <div class="col-sm-10">
                                    <input type="text" name="phone" class="form-control" id="phone" value="{{request('phone')}}" >
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email" class=" control-label">ایمیل</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" class="form-control" id="email" value="{{request('email')}}" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>شهر</label>
                                <select class="form-control select2" name="city"  style="width: 100%;">
                                    <option value="">همه موارد </option>
                                    @foreach(\App\City::all() as $city)
                                        <option value="{{$city->id}}" {{request('city') == $city->id ? 'selected' : ''}} >{{$city->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><span class="fa fa-filter"></span>   اعمال فیلتر </button>
                    <a href="{{route('user.index')}}" class="btn btn-danger"><span class="fa fa-"></span>   حذف همه فیلتر ها </a>
                </div>
            </form>
        </div>

    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">لیست کاربران</h3>
                            <div class="card-tools">

                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tr>
                                    <th>نام</th>
                                    <th>موبایل</th>
                                    <th>ایمیل</th>
                                    <th>عضو ویژه؟</th>
                                    <th>شهر</th>
                                    <th>عملیات</th>
                                </tr>
                                @foreach($users as $user)

                                    <tr>
                                        <td>{{$user->name}} </td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <span class="badge badge-light">
                                                {{$user->isVip() == true ? ' بلی ' : ' خیر '}}
                                            </span>
                                        </td>
                                        <td>{{!empty($user->city->name) ? $user->city->name : 'انتخاب نشده'}}</td>
                                        <td>
                                            <form action="{{ route('user.destroy', $user->id)}}" method="post">
                                                <a href="{{ route('user.edit',$user->id) }}"  class="btn btn-success">ویرایش <i class="fa fa-edit"></i></a>

                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('برای حذف این آیتم اطمینان دارید؟کاربر با تمام اطلاعات حذف خواهد شد!')" class="btn btn-danger" type="submit">  حذف <i class="fa fa-trash"></i></button>
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
                {!! $users
              ->appends( [
              'name'=>request('name'),
              'phone'=>request('phone'),
              'email'=>request('email'),
              'city'=>request('city'),
             ])
              ->render() !!}
            </div>
        </div>
    </section>

@endsection


@section('script')
    <script>
        $(function () {
            $('.select2').select2()

        })


    </script>
@endsection
