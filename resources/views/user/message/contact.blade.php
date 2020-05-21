@extends('front.frontLayout')
@section('title', 'لیست مخاطبین')

@section('content')


    @include('user.sections.profileHeader')


    <div class="container">
        <div class="row">
            <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">مخاطبین </h6>
                        <a href="#" class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="icons/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                        </a>
                    </div>

                    <ul class="notification-list">
                        @foreach($contacts  as $contact)
                            <?php
                            if (auth()->user()->id == $contact->receiver_user_id) {
                                $user_id = $contact->sender_user_id;
                            } else if (auth()->user()->id == $contact->sender_user_id) {
                                $user_id = $contact->receiver_user_id;
                            }
                            ?>
                            @if(!empty(\App\User::find($user_id)->id))
                                <li class="un-read">
                                    <a href="/user/message/{{$user_id}}">
                                        <div class="author-thumb">
                                            <img style="height: 41px; width: 41px;" src="{{!empty(\App\User::find($user_id)->image) ? \Illuminate\Support\Facades\Storage::url(\App\User::find($user_id)->image) :'/theme/img/user.png' }}" alt="author">
                                        </div>
                                        <div class="notification-event">
                                            <a href="/user/message/{{$user_id}}" class="h6 notification-friend">{{!empty(\App\User::find($user_id)->name) ? \App\User::find($user_id)->name : \App\User::find($user_id)->phone }}</a>
                                            <span class="notification-date"><time class="entry-date updated"
                                                                                  datetime="2004-07-24T18:18">{{\App\Message::where('receiver_user_id', auth()->user()->id)->where('sender_user_id' ,$user_id )->where('seen', false)->get()->count()}}  پیام خوانده نشده</time></span>
                                        </div>
                                        <span class="notification-icon">
                                        </span>
                                    </a>


							</span>

                                    <div class="more">
                                        <svg class="olymp-little-delete">
                                            <use xlink:href="/theme/icons/icons.svg#olymp-little-delete"></use>
                                        </svg>
                                    </div>
                                </li>
                            @endif
                        @endforeach

                    </ul>

                </div>
            </div>

            @include('user.sections.profileSidebar')
        </div>
    </div>

@endsection

@section('script')

@endsection
