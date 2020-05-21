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
                                <img src="{{!empty(auth()->user()->image) ?  auth()->user()->image : '/theme/img/user.png'}}"
                                     alt="author">
                            </div>
                            <div class="author-content">
                                <div class="h3 author-name">{{!empty(auth()->user()->name) ? auth()->user()->name : auth()->user()->phone}}</div>
                                {{--<div class="country">تهران - ایران </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="profile-section">
                        <div class="row">
                            <div class="col-xl-8 m-auto col-lg-8 col-md-12">
                                <ul class="profile-menu">
                                    <li>
                                        <a href="/user/profile" class="{{setActive('user/profile','active')}}">پروفایل من </a>
                                    </li>
                                    <li>
                                        <a href="/user/samples" class="{{setActive('user/samples','active')}}">نمونه کار ها</a>
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
