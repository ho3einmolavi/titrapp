@extends('front.frontLayout')
@section('title', $category->name)

@section('content')


    <div class="header-spacer header-spacer-small"></div>
    <div class="main-header">
        <div class="content-bg-wrap bg-events"></div>
        <div class="container">
            <div class="row">
                <div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
                    <div class="main-header-content">
                        <h1>{{$category->name}}</h1>
                        <br/>
                        <p>
                            {{$category->description}}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <img class="img-bottom" src="/theme/img/event-bottom.png" alt="friends">
        <br/>
    </div>


    @include('front.sections.genresForCat')
    @include('front.sections.mainSections')


    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h2 class="presentation-margin">اعضای {{$category->name}}</h2>
            </div>
            <?php
            use Illuminate\Support\Facades\DB;
            $users = DB::table('category_user')->where('category_id', $category->id)->get()->pluck('user_id');
            ?>




            @foreach(\App\User::whereIn('id',$users)->take(10)->get() as  $user_item)
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    @include('front.sections.userBox')
                </div>
            @endforeach
        </div>
    </div>



    <section class="blog-post-wrap medium-padding80">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h2 class="presentation-margin">آخرین مطالب منتشر شده در {{$category->name}}</h2>
                </div>
                @foreach(\App\Blog::latest()->where('category_id',$category->id)->take(12)->get() as $blog_item)
                    <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        @include('front.sections.blogBox')
                    </div>
                @endforeach
            </div>
        </div>


    </section>


@endsection

