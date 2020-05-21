<!-- Header -->
<header class="header" id="site-header">
    <div class="page-title">
    </div>
    <div class="header-content-wrapper">

        <a href="/" class="link-find-friend ">صفحه اصلی</a>
        <a href="/members" class="link-find-friend ">اعضا</a>
        <a href="/blogs" class="link-find-friend ">وبلاگ</a>
        <a href="/aboutus" class="link-find-friend ">درباره ما</a>
        <a href="/contactus" class="link-find-friend ">تماس با ما</a>
        <a href="/faq" class="link-find-friend ">سوالات متداول</a>

        @if(auth()->check())
            <a href="/user/profile" class="link-find-friend ">پروفایل من</a>

        @endif

        @if(!auth()->check())
            <a href="/login" class="link-find-friend">ورود و ثبت نام</a>
        @endif
        <div class="control-block">
            @if(auth()->check())
                <div class="author-page author vcard inline-items more">
                    <div class="author-thumb">
                        <img style="height: 44px;width: 44px;" alt="author"
                             src="{{!empty(auth()->user()->image) ?  auth()->user()->image : '/theme/img/user.png'}}"
                             class="avatar">
                        <span class="icon-status online"></span>
                        <div class="more-dropdown more-with-triangle">
                            <div class="mCustomScrollbar" data-mcs-theme="dark">
                                <div class="ui-block-title ui-block-title-small">
                                    <h6 class="title">حساب کاربري</h6>
                                </div>
                                <ul class="account-settings">
                                    <li>
                                        <a href="/user/profile">
                                            <svg class="olymp-menu-icon">
                                                <use xlink:href="/theme/icons/icons.svg#olymp-menu-icon"></use>
                                            </svg>
                                            <span>اطلاعات پروفایل</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/user/skils">
                                            <svg class="olymp-star-icon left-menu-icon" data-toggle="tooltip"
                                                 data-placement="left" title=""
                                                 data-original-title="FAV PAGE">
                                                <use xlink:href="/theme/icons/icons.svg#olymp-star-icon"></use>
                                            </svg>
                                            <span>ژانر و تخصص ها</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/logout">
                                            <svg class="olymp-logout-icon">
                                                <use xlink:href="/theme/icons/icons.svg#olymp-logout-icon"></use>
                                            </svg>
                                            <span>خروج</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <a href="/user/profile" class="author-name fn">
                        <div class="author-title">
                            {{!empty(auth()->user()->name) ? auth()->user()->name : auth()->user()->phone}}
                            <svg class="olymp-dropdown-arrow-icon">
                                <use xlink:href="/theme/icons/icons.svg#olymp-dropdown-arrow-icon"></use>
                            </svg>
                        </div>
                        <span class="author-subtitle">آنلاین</span>
                    </a>
                </div>

            @endif
        </div>
    </div>
</header>
