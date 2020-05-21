<div class="fixed-sidebar right">
    <div class="fixed-sidebar-right sidebar--small" id="sidebar-right">

        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <ul class="chat-users">



                @foreach(\App\User::where('position',\App\Enums\UserPoistion::sidebar)->take(8)->get() as $user)

                <li class="inline-items js-chat-open">
                    <div class="author-thumb">
                        <a href="/member/{{$user->id}}">
                            <img alt="author" style="height: 35px; width: 35px;" src="{{!empty($user->image) ? \Illuminate\Support\Facades\Storage::url($user->image) :'/theme/img/user.png' }}" class="avatar">

                        </a>
                        <span class="icon-status online"></span>
                    </div>
                </li>

                    @endforeach


            </ul>
        </div>

        <div class="search-friend inline-items">
            <a href="#" class="js-sidebar-open">
                <svg class="olymp-menu-icon">
                    <use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-menu-icon"></use>
                </svg>
            </a>
        </div>

        <a href="#" class="olympus-chat inline-items js-chat-open">
            <svg class="olymp-chat---messages-icon">
                <use xlink:href="/theme/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use>
            </svg>
        </a>

    </div>

    <div class="fixed-sidebar-right sidebar--large" id="sidebar-right-1">

        <div class="mCustomScrollbar" data-mcs-theme="dark">

            <div class="ui-block-title ui-block-title-small">

            </div>
            <ul class="chat-users">
                @foreach(\App\User::where('position',\App\Enums\UserPoistion::sidebar)->take(8)->get() as $user)

                <li class="inline-items">
                    <div class="author-thumb">

                        <a href="/member/{{$user->id}}">
                            <img alt="author"style="height: 35px; width: 35px;" src="{{!empty($user->image) ? \Illuminate\Support\Facades\Storage::url($user->image) :'/theme/img/user.png' }}" class="avatar">

                        </a>
                        <span class="icon-status online"></span>
                    </div>
                    <div class="author-status">
                        <a href="/member/{{$user->id}}" class="h6 author-name">{{$user->name}}</a>
                        <span class="status">آنلاین</span>
                    </div>
                </li>
                    @endforeach
            </ul>

        </div>

    </div>
</div>
