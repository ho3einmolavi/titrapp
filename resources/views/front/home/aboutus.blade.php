@extends('front.frontLayout')
@section('title', 'درباره ما')

@section('content')

    <div class="stunning-header bg-primary-opacity">


        <!-- ... end Header Standard Landing  -->
        <div class="header-spacer--standard"></div>

        <div class="stunning-header-content">
            <h1 class="stunning-header-title">درباره ما</h1>
            <ul class="breadcrumbs">
                <li class="breadcrumbs-item">
                    <a href="/">صفحه اصلی</a>
                    <span class="icon breadcrumbs-custom">/</span>
                </li>
                <li class="breadcrumbs-item active">
                    <span>درباره ما</span>
                </li>
            </ul>
        </div>

        <div class="content-bg-wrap stunning-header-bg1"></div>
    </div>

    <!-- End Stunning header -->

    <section class="medium-padding80 bg-body">
        <div class="container">
            <div class="row">
                <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12  m-auto">
                    <div class="crumina-module crumina-heading">
                        <h2 class="heading-title">کمی در مورد <span class="c-primary">تیتر اَپ</span> بیشتر بدانیم</h2>
                        <p class="heading-text">


                            {!! \App\General::first()->aboutus !!}


                        </p>
                    </div>
                </div>


            </div>

        </div>
    </section>
    <section class="medium-padding80 bg-body">
        <div class="container">
            <div class="row">
                <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12  m-auto">
                    <div class="crumina-module crumina-heading">
                        <h2 class="heading-title">کمی در مورد <span class="c-primary"> خدمات تیتر اَپ</span> بیشتر بدانیم</h2>
                        <p class="heading-text">


                            {!! \App\General::first()->services !!}


                        </p>
                    </div>
                </div>


            </div>

        </div>
    </section>

    <section class="medium-padding80 bg-body">
        <div class="container">
            <div class="row">
                <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12  m-auto">
                    <div class="crumina-module crumina-heading">
                        <h2 class="heading-title"> <span class="c-primary">توضیحاتی درباره اپلیکیشن تیتر اَپ</span> </h2>
                        <p class="heading-text">


                            {!! \App\General::first()->guide !!}


                        </p>
                    </div>
                </div>


            </div>

        </div>
    </section>

    @include('front.sections.whyUs')



@endsection

