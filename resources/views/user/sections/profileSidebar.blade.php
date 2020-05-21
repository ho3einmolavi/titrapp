<div class="col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12 col-xs-12 responsive-display-none">
    <div class="ui-block">
        <div class="your-profile">
            <div class="ui-block-title ui-block-title-small">
                <h6 class="title">پرفایل من</h6>
            </div>

            <div class="ui-block-title ">
                <a href="/user/profile" class="h6 title ">اطلاعات پروفایل</a>
            </div>

            <div class="ui-block-title ">
                <a href="/user/skils" class="h6 title ">ژانر و تخصص ها</a>
            </div>


            <div class="ui-block-title ">
                <a href="/user/createSample" class="h6 title "> افزودن نمونه کار</a>
            </div>
            <div class="ui-block-title ">
                <a href="/user/samples" class="h6 title ">نمونه کار های من</a>
            </div>


            <div class="ui-block-title">
                <a href="/user/contact" class="h6 title">گفتگو / پیام ها </a>
                <a href="#" class="items-round-little bg-primary">{{\App\Message::where('receiver_user_id', auth()->user()->id)->where('seen', false)->get()->count()}}</a>
            </div>

            <div class="ui-block-title ">
                <a href="/user/ticket" class="h6 title ">ارسال تیکت به پشتیبانی</a>
            </div>

            <div class="ui-block-title ">
                <a href="/user/tickets" class="h6 title ">تیکت های من</a>
            </div>

        </div>
    </div>
</div>
