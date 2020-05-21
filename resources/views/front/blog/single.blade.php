@extends('front.frontLayout')
@section('title', $blog->title)
@section('style')

    <link rel="stylesheet" href="/theme/player/plyr.css">
@endsection

@section('content')

    <div class="stunning-header bg-primary-opacity">

    <div class="header-spacer--standard"></div>

    <div class="stunning-header-content">
        <h1 class="stunning-header-title">{{$blog->title}}</h1>
        <ul class="breadcrumbs">
            <li class="breadcrumbs-item">
                <a href="/">صفحه اصلی</a>
                <span class="icon breadcrumbs-custom">/</span>
            </li>
            <li class="breadcrumbs-item">
                <a href="/blogs">نوشته ها</a>
                <span class="icon breadcrumbs-custom">/</span>
            </li>
            <li class="breadcrumbs-item active">
                <span>{{$blog->title}}</span>
            </li>
        </ul>
    </div>

    <div class="content-bg-wrap stunning-header-bg1"></div>

    </div>
    <div class="container mb60 mt50">
        <div class="row">
            <div class="col col-xl-12 m-auto col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="ui-block">
                    <article class="hentry blog-post single-post single-post-v2">

                        <h2 class="h1 post-title">{{$blog->title}}</h2>
                        <div class="single-post-additional inline-items">
                            <div class="post-date-wrap inline-items">
                                <svg class="olymp-calendar-icon">
                                    <use xlink:href="/theme/icons/icons.svg#olymp-calendar-icon"></use>
                                </svg>
                                <div class="post-date">
                                    <a class="h6 date" href="#">{{\Morilog\Jalali\Jalalian::forge($blog->created_at)}}</a>
                                    <span></span>
                                </div>
                            </div>
                            <div class="post-comments-wrap inline-items">
                                <div class="post-comments">
                                    <a class="h6 comments" href="#">{{$blog->view}}</a>
                                </div>
                                <span>بازدید</span>


                            </div>
                        </div>


                        <div class="col col-xl-6 m-auto col-lg-12 col-md-12 col-sm-12 col-12">

                        <div class="post-thumb">
                            <div class="container">

                            <img style="max-height: 500px;" class="img-thumbnail" src="{{$blog->image}}" alt="author">
                            </div>
                        </div>

                        </div>

                        <div class="post-content-wrap">

                           @if(!empty($blog->video))
                                <div class="container">
                                    <video poster="" id="player" playsinline controls>
                                        <source src="{{$blog->video}}" type="video/mp4" />
                                        <source src="{{$blog->video}}" type="video/webm" />

                                        <!-- Captions are optional -->
                                        <track kind="captions" label="English captions" src="/path/to/captions.vtt" srclang="en" default />
                                    </video>
                                </div>

                                <br/>
                                <br/>

                            @endif
                            <div class="post-content">
                               {!! $blog->body !!}
                            </div>
                        </div>



                    </article>

                    <!-- ... end Single Post -->

                </div>

                <!-- Comments -->
                <!-- ... end Comments -->
            </div>
            </div>

        </div>
@endsection

@section('script')

    <script src="/theme/player/plyr.js"></script>
    <script>
        const player = new Plyr('#player', {
            title: 'سعید جلالی',
        });

    </script>
@endsection

