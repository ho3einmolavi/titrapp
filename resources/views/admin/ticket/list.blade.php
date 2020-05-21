@extends('admin.layout')
@section('title', 'تیکت ها')

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
                        <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                        <li class="breadcrumb-item active">تیکت ها</li>
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
                            <h3 class="card-title">لیست تیکت ها</h3>

                            <div class="card-tools">
                            </div>

                            <form class="form-horizontal" action="{{ route('ticket.index') }}" method="get">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name" class=" control-label">عنوان</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="title" class="form-control" id="code" value="{{request('title')}}" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>وضعیت</label>
                                                <select class="form-control select2" name="status"  style="width: 100%;">
                                                    <option value="">همه موارد </option>
                                                    @for ($i = 0; $i < count(\App\Enums\TicketStatus::getKeys()); $i++)
                                                        <option value="{{$i}}"  >{{\App\Enums\TicketStatus::getTicketStatus($i)}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>دسته بندی</label>
                                                <select class="form-control select2" name="category"  style="width: 100%;">
                                                    <option value="">همه موارد </option>
                                                    @foreach(\App\TicketCategory::all() as $category)
                                                        <option value="{{$category->id}}" {{request('category') == $category->id ? 'selected' : ''}} >{{$category->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>اولویت</label>
                                                <select class="form-control select2" name="priority"  style="width: 100%;">
                                                    <option value="">همه موارد </option>
                                                    @for ($i = 0; $i < count(\App\Enums\Priority::getKeys()); $i++)
                                                        <option value="{{$i}}"  >{{\App\Enums\Priority::getPriority($i)}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success"><span class="fa fa-filter"></span>   اعمال فیلتر </button>
                                    <a href="{{route('ticket.index')}}" class="btn btn-danger"><span class="fa fa-"></span>   حذف همه فیلتر ها </a>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>کد</th>
                                    <th>عنوان</th>
                                    <th>وضعیت</th>
                                    <th>دسته بندی</th>
                                    <th>اولویت</th>
                                    <th>عملیات</th>
                                </tr>
                                @foreach($tickets as $ticket)

                                    <tr>
                                        <td>{{$ticket->id}} </td>
                                        <td>{{$ticket->title}} </td>
                                        <td>{{\App\Enums\TicketStatus::getTicketStatus($ticket->status)}} </td>
                                        <td>{{$ticket->category->name}} </td>
                                        <td>{{\App\Enums\Priority::getPriority($ticket->priority)}} </td>
                                        <td>
                                            <form action="{{ route('ticket.destroy', $ticket->id)}}" method="post">
                                                <a href="/admin/ticket/reply/{{$ticket->id}}"  class="btn btn-success">مشاهده و پاسخ <i class="fa fa-eye"></i></a>

                                                @if($ticket->status != \App\Enums\TicketStatus::closed)
                                                <a href="/admin/ticket/closeTicket/{{$ticket->id}}"  class="btn btn-warning">بستن تیکت <i class="fa fa-close"></i></a>
                                                @endif

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
                {!! $tickets
             ->appends( [
             'title'=>request('title'),
             'status'=>request('status'),
             'category'=>request('category'),
             'priority'=>request('priority'),
            ])
             ->render() !!}
            </div>
        </div><!-- /.container-fluid -->
    </section>

@endsection


@section('script')
@endsection