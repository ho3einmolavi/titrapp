@extends('front.frontLayout')
@section('title', 'پاسخ ها')


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

                            <form action="{{ route('storeReply') }}" method="post">
                                {{ csrf_field() }}
                                <div class="col-md-12 mt-5 ">
                                    <div class="form-group label-floating card">
                                        <label class="control-label">متن پاسخ</label>
                                        <textarea class="form-control" name="body"
                                                  placeholder="">{{old('body')}}</textarea>

                                        <input type="hidden" name="ticket_id" value="{{$data['ticket_id']}}">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-1 ">
                                    <div class="file-upload">
                                        <label for="file" class="file-upload__label bg-blue">
                                            ضمیمه کردن فایل</label>
                                        <input id="file" class="file-upload__input" type="file" name="file">
                                    </div>

                                </div>


                                <div class="col-md-12 mt-2 ">
                                    <button class="btn btn-primary btn-lg full-width">ارسال پیام</button>
                                </div>
                            </form>

                        </div>

                        <div class="col-md-12 mb-5">


                            @foreach($data['replys'] as $reply)
                                <div class="chat-box card mt-2">
                                    <div class="row">
                                        <div><img class="chat-img" src="{{!empty($reply->user->image) ? \Illuminate\Support\Facades\Storage::url($reply->user->image) :'/theme/img/user.png' }}" alt=""></div>
                                        <div class="chat-name">{{!empty($reply->user->name) ? $reply->user->name : $reply->user->phone}}</div>
                                    </div>
                                    <div class="row mt-3">
                                        <p>
                                            {{$reply->body}}
                                        </p>
                                    </div>

                                    <div class="row mt-2 " dir="ltr">

                                        <div>{{\Morilog\Jalali\Jalalian::forge($reply->created_at)->ago()}}</div>

                                    </div>

                                    <div class="row mt-2 ">

                                        @if (!empty($reply->file))
                                            <a href="{{\Illuminate\Support\Facades\Storage::url($reply->file)}}" target="_blank"
                                               class="link-black text-sm mr-2"><i
                                                        class="fa fa-download mr-1"></i> دانلود ضمیمه</a>
                                        @endif
                                    </div>
                                </div>

                            @endforeach
                        </div>




                        <div class="col-md-12">
                            <div class="text-center">
                                {!! $data['replys']->render() !!}
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
