<!-- Fixed Sidebar Left -->

<div class="fixed-sidebar">
    <div class="fixed-sidebar-left sidebar--small" id="sidebar-left">

        <a href="/" class="logo">
            <div class="img-wrap">
                <img src="/theme/img/titrapp.jpg" alt="Olympus">
            </div>
        </a>

        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <ul class="left-menu">
                <li>
                    <a href="#" class="js-sidebar-open">
                        <svg class="olymp-menu-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="بازکردن منو">
                            <use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-menu-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="03-Newsfeed.html">
                        <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="صفحه اصلی">
                            <use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use>
                        </svg>
                    </a>
                </li>

                <li>
                    <a href="03-Newsfeed.html">
                        <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="سوالات متداول">
                            <use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                        </svg>
                    </a>
                </li>

                @if(!auth()->check())
                    <li>
                        <a href="17-FriendGroups.html">
                            <svg class="olymp-happy-faces-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                                 data-original-title="ورود و ثبت نام">
                                <use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-happy-faces-icon"></use>
                            </svg>
                        </a>
                    </li>
                @endif

            </ul>
        </div>
    </div>

    <div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1">
        <a href="/" class="logo">
            <div class="img-wrap">
            </div>
            <div class="title-block">
                <h6 class="logo-title">تیتر اَپ</h6>
            </div>
        </a>

        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <ul class="left-menu">
                <li>
                    <a href="#" class="js-sidebar-open">
                        <svg class="olymp-close-icon left-menu-icon">
                            <use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                        </svg>
                        <span class="left-menu-title">بستن منو</span>
                    </a>
                </li>
                <li>
                    <a href="/">
                        <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="صفحه اصلی">
                            <use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use>
                        </svg>
                        <span class="left-menu-title">صفحه اصلی</span>
                    </a>
                </li>

                <li>
                    <a href="/faq">
                        <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="سوالات متداول">
                            <use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                        </svg>
                        <span class="left-menu-title">سوالات متداول</span>
                    </a>
                </li>



            @if(!auth()->check())
                    <li>
                        <a href="/login">
                            <svg class="olymp-happy-faces-icon left-menu-icon" data-toggle="tooltip"
                                 data-placement="right"
                                 data-original-title="گروه های دوستان">
                                <use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-happy-faces-icon"></use>
                            </svg>
                            <span class="left-menu-title">ورود و ثبت نام</span>
                        </a>
                    </li>
                @endif
            </ul>

        </div>
    </div>
</div>

<!-- ... end Fixed Sidebar Left -->


<!-- Fixed Sidebar Left -->

<div class="fixed-sidebar fixed-sidebar-responsive">

    <div class="fixed-sidebar-left sidebar--small" id="sidebar-left-responsive">
        <a href="/" class="logo js-sidebar-open">
            <img src="/theme/img/titrapp.jpg" alt="Olympus">
        </a>

    </div>

    <div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1-responsive">
        <a href="/" class="logo">
            <div class="img-wrap">
            </div>
            <div class="title-block">
                <h6 class="logo-title">تیتر اَپ</h6>
            </div>
        </a>

        <div class="mCustomScrollbar" data-mcs-theme="dark">

            <div class="ui-block-title ui-block-title-small">
                <h6 class="title">بخش اصلی</h6>
            </div>

            <ul class="left-menu">
                <li>
                    <a href="#" class="js-sidebar-open">
                        <svg class="olymp-close-icon left-menu-icon">
                            <use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                        </svg>
                        <span class="left-menu-title">بستن منو</span>
                    </a>
                </li>
                <li>
                    <a href="/">
                        <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                             data-original-title="NEWSFEED">
                            <use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use>
                        </svg>
                        <span class="left-menu-title">صفحه اصلی</span>
                    </a>
                </li>

                @if(!auth()->check())

                    <li>
                        <a href="/login">
                            <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                                 data-original-title="NEWSFEED">
                                <use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use>
                            </svg>
                            <span class="left-menu-title"> ورود</span>
                        </a>
                    </li>
                @endif
            </ul>

            {{--<div class="ui-block-title ui-block-title-small">--}}
            {{--<h6 class="title">حساب کاربری شما</h6>--}}
            {{--</div>--}}

            {{--<ul class="account-settings">--}}
            {{--<li>--}}
            {{--<a href="#">--}}

            {{--<svg class="olymp-menu-icon">--}}
            {{--<use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-menu-icon"></use>--}}
            {{--</svg>--}}

            {{--<span>تنظیمات حساب کاربری</span>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="#">--}}
            {{--<svg class="olymp-star-icon left-menu-icon" data-toggle="tooltip" data-placement="right"--}}
            {{--data-original-title="FAV PAGE">--}}
            {{--<use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-star-icon"></use>--}}
            {{--</svg>--}}

            {{--<span>ایجاد صفحه علاثه مندی ها</span>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="#">--}}
            {{--<svg class="olymp-logout-icon">--}}
            {{--<use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-logout-icon"></use>--}}
            {{--</svg>--}}

            {{--<span>خروج</span>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--</ul>--}}

            {{--<div class="ui-block-title ui-block-title-small">--}}
            {{--<h6 class="title">درباره Olympus</h6>--}}
            {{--</div>--}}

            {{--<ul class="about-olympus">--}}
            {{--<li>--}}
            {{--<a href="#">--}}
            {{--<span>شرایط و ظوابط</span>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="#">--}}
            {{--<span>سوالات متداول</span>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="#">--}}
            {{--<span>فرصت های شغلی</span>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="#">--}}
            {{--<span>تماس با ما</span>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--</ul>--}}

        </div>
    </div>
</div>

<!-- ... end Fixed Sidebar Left -->


<!-- Fixed Sidebar Right -->

