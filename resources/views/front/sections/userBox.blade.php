<div class="ui-block">
    <div class="friend-item">
        <div class="friend-header-thumb">
            <img src="/theme/img/userback.jpg" alt="friend">
        </div>

        <div class="friend-item-content">

            <div class="more">
                <svg class="olymp-three-dots-icon">
                    <use xlink:href="/theme/icons/icons.svg#olymp-three-dots-icon"></use>
                </svg>
                <ul class="more-dropdown">
                    <li>
                        <a href="/member/{{$user_item->id}}"> مشاهده پروفایل </a>
                    </li>
                    <li>
                        <a href="/user/message/{{$user_item->id}}">ارسال پیام</a>
                    </li>

                </ul>
            </div>
            <div class="friend-avatar">
                <div class="author-thumb">
                    <a href="/member/{{$user_item->id}}">
                        <img style="height: 100px;width: 100px;"
                             src="{{!empty($user_item->image) ? $user_item->image : '/theme/img/user.png'}}"
                             alt="author">
                    </a>

                </div>
                <div class="author-content">
                    <a href="/member/{{$user_item->id}}" class="h5 author-name">{{$user_item->name}}</a>
                    <div class="country">{{!empty($user_item->city->name) ? $user_item->city->name : ''}}</div>
                </div>
            </div>

            <div class="swiper-container" data-slide="fade">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="friend-count">

                            @foreach($user_item->categories as $category)
                                <a  class="friend-count-item">
                                    <div class="title">{{$category->name}}</div>
                                </a>
                            @endforeach
                        </div>
                        <div class="control-block-دکمه">
                            <a href="/member/{{$user_item->id}}" class="btn btn-control bg-blue">
                                <svg class="olymp-happy-face-icon">
                                    <use xlink:href="/theme/icons/icons.svg#olymp-happy-face-icon"></use>
                                </svg>
                            </a>

                            <a  href="/user/message/{{$user_item->id}}" class="btn btn-control bg-purple">
                                <svg class="olymp-chat---messages-icon">
                                    <use xlink:href="/theme/icons/icons.svg#olymp-chat---messages-icon"></use>
                                </svg>
                            </a>

                        </div>
                    </div>

                    <div class="swiper-slide">
                        <p class="friend-about" style="    min-height: 38px;">
                            {{\Illuminate\Support\Str::limit($user_item->bio,70)}}
                        </p>

                        <div class="friend-since" style="min-height: 38px;">
                            @foreach($user_item->skils as $skil)
                                <a  class="friend-count-item">
                                    <div class="title">{{$skil->name}}</div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>
