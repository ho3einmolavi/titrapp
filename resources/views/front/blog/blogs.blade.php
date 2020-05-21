@extends('front.frontLayout')
@section('title', 'مقالات')
@section('style')

@endsection

@section('content')

    <div class="stunning-header bg-primary-opacity">
        <div class="header-spacer--standard"></div>

        <div class="stunning-header-content">
            <h1 class="stunning-header-title">وبلاگ</h1>

            <ul class="breadcrumbs">
                <li class="breadcrumbs-item">
                    <a href="/">صفحه اصلی</a>
                    <span class="icon breadcrumbs-custom">/</span>
                </li>
                <li class="breadcrumbs-item active">
                    <span>وبلاگ</span>
                </li>
            </ul>
        </div>

        <div class="content-bg-wrap stunning-header-bg1"></div>
    </div>

    <!-- ... end Stunning header -->


    <div class="container">
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="ui-block responsive-flex1200">
                    <div class="ui-block-title">
                        <ul class="filter-icons">
                            <li>
                                <a href="#">
                                    <img src="/theme/img/icon-chat2.png" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="/theme/img/icon-chat15.png" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="/theme/img/icon-chat9.png" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="/theme/img/icon-chat4.png" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="/theme/img/icon-chat6.png" alt="icon">
                                </a>
                            </li>
                        </ul>


                        <form action="/blogs" method="get">


                            <div class="w-select">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="title">فیلترکردن براساس :</div>
                                        <fieldset class="form-group">
                                            <select class="selectpicker form-control" name="category_id">
                                                <option value="">تمام دسته بندی ها</option>
                                                @foreach(\App\Category::all() as $category)
                                                    <option value="{{$category->id}}" {{request('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary btn-md-2">فیلتر کن</button>

                                    </div>

                                </div>




                            </div>


                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="blog-post-wrap medium-padding80">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog_item)
                    <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        @include('front.sections.blogBox')
                    </div>
                @endforeach
            </div>

            <div class="text-center">
                {!! $blogs
                    ->appends( [
                    'category_id'=>request('category_id'),
                   ])
                    ->render() !!}
            </div>
        </div>


        <!-- Pagination -->


        <!-- ... end Pagination -->

    </section>
@endsection
