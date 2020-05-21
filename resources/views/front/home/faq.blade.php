@extends('front.frontLayout')
@section('title', 'سوالات متداول')

@section('content')

    <div class="stunning-header bg-primary-opacity">


        <!-- ... end Header Standard Landing  -->
        <div class="header-spacer--standard"></div>

        <div class="stunning-header-content">
            <h1 class="stunning-header-title">سوالات متداول</h1>
            <ul class="breadcrumbs">
                <li class="breadcrumbs-item">
                    <a href="/">صفحه اصلی</a>
                    <span class="icon breadcrumbs-custom">/</span>
                </li>
                <li class="breadcrumbs-item active">
                    <span>سوالات متداول</span>
                </li>
            </ul>
        </div>

        <div class="content-bg-wrap stunning-header-bg1"></div>
    </div>

    <!-- End Stunning header -->

    <section class="mb60">
        <div class="container">
            <div class="row">
                <div class="col col-xl-8 m-auto col-lg-10 col-md-12 col-sm-12 col-12">


                    <div id="accordion" role="tablist" aria-multiselectable="true" class="accordion-faqs">
                        <div class="card">
                            @foreach($faqs as $faq)
                                <div class="card-header" role="tab" id="headingOne-{{$faq->id}}">
                                    <h3 class="mb-0">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseOne-{{$faq->id}}"
                                           aria-expanded="true" aria-controls="collapseOne"
                                           class="collapsed">
                                           <div class="pr-3 pl-3" style="font-size: 20px;">
                                               {{$faq->question}}
                                           </div>
                                            <span class="icons-wrap">
											<svg class="olymp-plus-icon">
												<use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-plus-icon"></use>
											</svg>
											<svg class="olymp-accordion-close-icon">
												<use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-accordion-close-icon"></use>
											</svg>
										</span>
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapseOne-{{$faq->id}}" class="collapse" role="tabpanel"
                                     aria-labelledby="headingOne-{{$faq->id}}">
                                    <div class="pr-3 pl-3">
                                        {!! $faq->answere !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



@endsection

