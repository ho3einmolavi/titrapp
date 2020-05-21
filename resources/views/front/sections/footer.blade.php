<div class="footer footer-full-width" id="footer">
    <div class="container">
        <div class="row">
            <div class="col col-lg-4 col-md-4 col-sm-6 col-6">


                <!-- Widget About -->

                <div class="widget w-about">

                    <a href="/" class="logo">
                        <div class="img-wrap">
                            <img style="height: 85px;" src="/theme/img/titrapp.jpg" alt="Olympus">
                        </div>
                        <div class="title-block">
                            <h6 class="logo-title">تیتر اَپ</h6>
                            <div class="sub-title"> شبکه اجتماعی هنرمندان </div>
                        </div>
                    </a>
                    <p>تیتراپ وبسایت و اپلیکیشنی میباشد بر پایه گسترش ارتباط کاری هنرمندان</p>
                    <ul class="socials">
                        <li>
                            <a href="{{\App\General::first()->telegram}}">
                                <i class="fa fa-send" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{\App\General::first()->instagram}}">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{\App\General::first()->whatsapp}}">
                                <i class="fa fa-whatsapp" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- ... end Widget About -->

            </div>

            <div class="col col-lg-2 col-md-4 col-sm-6 col-6">


                <!-- Widget List -->

                <div class="widget w-list">
                    <h6 class="title">لینک های اصلی</h6>
                    <ul>
                       @if(!auth()->check())
                            <li>
                                <a href="/login">ورود و ثبت نام</a>
                            </li>
                           @endif
                        <li>
                            <a href="/">صفحه اصلی</a>
                        </li>
                        <li>
                            <a href="/aboutus">درباره ما</a>
                        </li>
                        <li>
                            <a href="/contactus">تماس با ما</a>
                        </li>
                           <li>
                               <a href="/blogs">وبلاگ</a>
                           </li>

                    </ul>
                </div>

                <!-- ... end Widget List -->

            </div>
            <div class="col col-lg-2 col-md-4 col-sm-6 col-6">


                <div class="widget w-list">
                    <h6 class="title">دانلود اپلیکیشن</h6>
                    <ul>
                        <li>
                            <a href="#">دانلود نسخه android</a>
                        </li>
                        <li>
                            <a href="#">دانلود نسخه ios</a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col col-lg-2 col-md-4 col-sm-6 col-6">


                <div class="widget w-list">
                    <h6 class="title">بخش های اجتماعی</h6>
                    <ul>
                        <li>
                            <a href="/members">اعضاء</a>
                        </li>
                    </ul>
                </div>

            </div>


            <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="sub-footer-copyright">
						<span>
							 تمام حقوق مادی و معنوی سایت متعلق به تیتر اَپ می باشد
						</span>
                </div>

            </div>
        </div>
    </div>
</div>
