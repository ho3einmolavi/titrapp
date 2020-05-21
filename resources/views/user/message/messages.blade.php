@extends('front.frontLayout')
@section('title', 'پروفایل من')


@section('style')

    <style>
        .chat-box {
            width: 100%;
            padding: 30px;

        }

        .chat-img {
            height: 40px;
            width: 40px;
            border-radius: 50%;
        }

        .chat-name {
            margin-top: 10px;
            margin-right: 10px;
        }

        .chat-date {
            text-align: left;
        }
    </style>

@endsection

@section('content')
    @include('user.sections.profileHeader')
    <div class="container">
        <div class="row">
            <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 mt-0">

                            <form action="{{ route('sendMessage') }}" method="post">
                                {{ csrf_field() }}
                                <div class="col-md-12 mt-5 ">

                                    <div class="row pb-4" >

                                        <div class="author-thumb" >
                                            <img style="height: 100px;"  src="{{!empty(\App\User::find($data['target_id'])->image) ? \App\User::find($data['target_id'])->image : '' }}" alt="">

                                        </div>
                                        <div class="pt-5 pr-4">
                                            <h4>ارسال پیام به {{!empty(\App\User::find($data['target_id'])->name) ? \App\User::find($data['target_id'])->name : '' }}</h4>

                                        </div>

                                    </div>
                                    <div class="form-group label-floating card">

                                        <label class="control-label">متن پیام</label>
                                        <textarea class="form-control" name="body"
                                                  placeholder="">{{old('body')}}</textarea>

                                        <input type="hidden" name="user_id" value="{{$data['target_id']}}">
                                    </div>
                                </div>


                                <div class="col-md-12 mt-2 ">
                                    <button class="btn btn-primary btn-lg full-width">ارسال پیام</button>
                                </div>
                            </form>

                        </div>

                        <div class="col-md-12 mb-5">


                            @foreach($data['messages'] as $message)
                                <div class="chat-box card mt-2">
                                    <div class="row">
                                        <div><img class="chat-img" src="{{!empty($message->sender->image) ? $message->sender->image :'/theme/img/user.png' }}" alt=""></div>
                                        <div class="chat-name">{{!empty($message->sender->name) ? $message->sender->name : $message->sender->phone}}</div>
                                    </div>
                                    <div class="row mt-3">
                                        <p>
                                            {{$message->body}}
                                        </p>
                                    </div>

                                    <div class="row mt-2 " dir="ltr">

                                        <div>{{\Morilog\Jalali\Jalalian::forge($message->created_at)->ago()}}</div>

                                    </div>
                                </div>

                            @endforeach
                        </div>




                        <div class="col-md-12">
                            <div class="text-center">
                                {!! $data['messages']
                                    ->appends( [
                                    'type'=>request('type'),
                                   ])
                                    ->render() !!}
                            </div>
                        </div>

                    </div>

                </div>


            </div>

            @include('user.sections.profileSidebar')
        </div>
    </div>
@endsection

@section('script')

@endsection
