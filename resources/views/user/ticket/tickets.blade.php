@extends('front.frontLayout')
@section('title', 'تیکت های من')


@section('style')



@endsection

@section('content')
    @include('user.sections.profileHeader')
    <div class="container">
        <div class="row">
            <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12 ">
                <div class="container ">
                    <table class="table  table-light card">
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
                                            <a href="/user/reply/{{$ticket->id}}"  class="btn btn-success">مشاهده و پاسخ <i class="fa fa-eye"></i></a>
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </table>


                </div>
                {!! $tickets->render() !!}

            </div>

            @include('user.sections.profileSidebar')
        </div>
    </div>
@endsection

@section('script')

@endsection
