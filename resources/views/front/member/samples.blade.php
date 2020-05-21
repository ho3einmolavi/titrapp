@extends('front.frontLayout')
@section('title', 'نمونه کار ها')

@section('style')

    <link rel="stylesheet" href="/theme/player/plyr.css">
@endsection


@section('content')

    <div class="header-spacer"></div>

    <div class="container">
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="top-header top-header-favorit">
                        <div class="top-header-thumb">
                            <img src="/theme/img/top-header2.jpg" alt="nature">
                            <div class="top-header-author">
                                <div class="author-thumb">
                                    <img src="{{!empty($data['user']->image) ?  $data['user']->image : '/theme/img/user.png'}}"
                                         alt="author">
                                </div>
                                <div class="author-content">
                                    <div class="h3 author-name">{{!empty($data['user']->name) ? $data['user']->name : $data['user']->phone}}</div>
                                    {{--<div class="country">تهران - ایران </div>--}}
                                </div>
                            </div>
                        </div>
                        <div class="profile-section">
                            <div class="row">
                                <div class="col-xl-8 m-auto col-lg-8 col-md-12">
                                    <ul class="profile-menu">
                                        <li>
                                            <a href="/member/{{$data['user']->id}}" class="{{setActive('member/'.$data['user']->id,'active')}}">اطلاعات و مشخصات</a>
                                        </li>

                                        <li>
                                            <a href="/member/sample/{{$data['user']->id}}" class="{{setActive('member/'.$data['user']->id,'active')}}">نمونه کار ها</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="control-block-button">
                                <a href="#" class="btn btn-control bg-primary">
                                    <svg class="olymp-star-icon">
                                        <use xlink:href="/theme/icons/icons.svg#olymp-star-icon"></use>
                                    </svg>
                                </a>

                                <a href="#" class="btn btn-control bg-purple">
                                    <svg class="olymp-chat---messages-icon">
                                        <use xlink:href="/theme/icons/icons.svg#olymp-chat---messages-icon"></use>
                                    </svg>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="container">
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="ui-block responsive-flex">
                    <div class="ui-block-title">
                        <div class="h6 title">نمونه کار ها (عکس)</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="tab-content">
                    <div class="tab-pane active" id="album-page" role="tabpanel">
                        <div class="photo-album-wrapper">


                            @foreach($data['samples']->where('type',\App\Enums\SampleType::image) as $sample)
                                <div class="photo-album-item-wrap col-4-width">
                                    <div class="photo-album-item" data-mh="album-item">
                                        <div class="photo-item">
                                            <img src="{{\Illuminate\Support\Facades\Storage::url($sample->file)}}"
                                                 alt="photo">
                                            <div class="overlay overlay-dark"></div>
                                            <a href="#" data-toggle="modal"
                                               data-target="#open-photo-popup-{{$sample->id}}"
                                               class="  full-block"></a>
                                        </div>
                                        <div class="content">
                                            <span class="sub-title">{{$sample->title}} </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @foreach($data['samples']->where('type',\App\Enums\SampleType::image) as $sample)


        <div class="modal fade" id="open-photo-popup-{{$sample->id}}" tabindex="-1" role="dialog"
             aria-labelledby="open-photo-popup-v2"
             aria-hidden="true">
            <div class="modal-dialog window-popup open-photo-popup open-photo-popup-v2" role="document">
                <div class="modal-content">
                    <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                        <svg class="olymp-close-icon">
                            <use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                        </svg>
                    </a>

                    <div class="modal-body">
                        <div class="open-photo-thumb">

                            <div class="swiper-container" data-effect="fade" data-autoplay="4000">

                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Slides -->

                                    <div class="swiper-slide">
                                        <div class="photo-item">
                                            <img style="max-height: 650px;"
                                                 src="{{\Illuminate\Support\Facades\Storage::url($sample->file)}}"
                                                 alt="photo">
                                            <div class="overlay"></div>
                                            <a href="#" class="more">
                                                <svg class="olymp-three-dots-icon">
                                                    <use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                                </svg>
                                            </a>
                                            <a href="#" class="tag-friends" data-toggle="tooltip" data-placement="top"
                                               data-original-title="TAG YOUR FRIENDS">
                                                <svg class="olymp-happy-face-icon">
                                                    <use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use>
                                                </svg>
                                            </a>

                                            <div class="content">
                                                <a href="#" class="h6 title">تصاویر 2016</a>
                                                <time class="published" datetime="2017-03-24T18:18">2 هفته قبل</time>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>


                        </div>

                        <div class="open-photo-content">
                            <article class="hentry post">

                                <div class="post__author author vcard inline-items">
                                </div>

                                <p>{{$sample->title}}</p>
                                <p><a target="_blank" href="{{$sample->link}}">{{$sample->link}}</a></p>

                                <div class="post-additional-info inline-items">


                                </div>


                            </article>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endforeach





    <div class="container">
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="ui-block responsive-flex">
                    <div class="ui-block-title">
                        <div class="h6 title">نمونه کار ها (ویدیو)</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">

        <div class="row">
            @foreach($data['samples']->where('type',\App\Enums\SampleType::video) as $sample)

                <div class="col-md-4 mt-2" >
                    <div>
                        <video poster="/theme/img/avatar1-sm.jpg" id="player{{$sample->id}}" playsinline controls>
                            <source src="{{\Illuminate\Support\Facades\Storage::url($sample->file)}}"
                                    type="video/mp4"/>
                            <source src="{{\Illuminate\Support\Facades\Storage::url($sample->file)}}"
                                    type="video/webm"/>

                            <!-- Captions are optional -->
                            <track kind="captions" label="English captions" src="/path/to/captions.vtt"
                                   srclang="en" default/>
                        </video>
                    </div>

                </div>

            @endforeach
        </div>

    </div>


@endsection

@section('script')

    <script src="/theme/player/plyr.js"></script>
    <script>
                @foreach($data['samples']->where('type',\App\Enums\SampleType::video) as $sample)
        const player{{$sample->id}} = new Plyr('#player{{$sample->id}}');
        @endforeach

    </script>
@endsection
