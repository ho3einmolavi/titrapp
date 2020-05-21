<?php

use Illuminate\Support\Facades\Request;

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    {{--<img src="https://www.gravatar.com/avatar/52f0fbcbedee04a121cba8dad1174462?s=200&d=mm&r=g"--}}
                    {{--class="img-circle elevation-2" alt="User Image">--}}
                </div>
                <div class="info">
                    <a href="#" class="d-block">پنل تیتر اَپ</a>
                </div>
            </div>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <a href="/admin/dashboard"
                           class="nav-link { {{setActive('admin/dashboard','active')}}">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>داشبورد</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/admin/notification"
                           class="nav-link {{ setActive('admin/notification' ,'active')}}">
                            <i class="nav-icon fa fa-bell"></i>
                            <p>ارسال نوتیفیکیشن</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/admin/slider"
                           class="nav-link {{ setActive('admin/slider' ,'active')}}">
                            <i class="nav-icon fa fa-list"></i>
                            <p>افزودن اسلایدر</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/admin/category"
                           class="nav-link {{setActive('admin/category','active')}}">
                            <i class="nav-icon fa fa-tags"></i>
                            <p>بخش های اصلی</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/skil"
                           class="nav-link {{ setActive('admin/skil' ,'active')}}">
                            <i class="nav-icon fa fa-graduation-cap  "></i>
                            <p>تخصص ها</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/admin/genre"
                           class="nav-link {{ setActive('admin/genre' ,'active')}}">
                            <i class="nav-icon fa fa-address-book "></i>
                            <p>ژانر ها</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="/admin/plan"
                           class="nav-link {{setActive('admin/plan','active')}}">
                            <i class="nav-icon fa fa-money"></i>
                            <p>پلن ها</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/admin/blog"
                           class="nav-link {{setActive('admin/blog','active')}}">
                            <i class="nav-icon fa fa-newspaper-o"></i>
                            <p>نوشته ها</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/admin/category-for-blogs"
                           class="nav-link {{setActive('admin/category-for-blogs','active')}}">
                            <i class="nav-icon fa fa-list"></i>
                            <p>دسته بندی نوشته ها</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="/admin/ticketCategory"
                           class="nav-link {{setActive('admin/ticketCategory','active')}}">
                            <i class="nav-icon fa fa-list"></i>
                            <p>دسته بندی تیکت ها</p>
                        </a>
                    </li>



                    <li class="nav-item">
                        <a href="/admin/ticket"
                           class="nav-link {{setActive('admin/ticket','active')}}">
                            <i class="nav-icon fa fa-ticket"></i>
                            <p>تیکت ها </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="/admin/user"
                           class="nav-link {{ Request::path() ==  'admin/user' ? 'active' : ''}}">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>کاربران</p>
                        </a>
                    </li>



                    <li class="nav-item">
                        <a href="/admin/payment"
                           class="nav-link {{setActive('admin/payment','active')}}">
                            <i class="nav-icon fa fa-circle-o text-info"></i>
                            <p>پرداخت ها</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="/admin/province"
                           class="nav-link {{setActive('admin/province','active')}}">
                            <i class="nav-icon fa fa-circle-o text-danger"></i>
                            <p>استان ها</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/admin/city"
                           class="nav-link {{setActive('admin/city','active')}}">
                            <i class="nav-icon fa fa-circle-o text-primary"></i>
                            <p>شهر ها</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="/admin/general/create"
                           class="nav-link {{setActive('admin/general/create','active')}}">
                            <i class="nav-icon fa fa-circle-o text-white"></i>
                            <p>اطلاعات کلی</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/admin/slider"
                           class="nav-link {{setActive('admin/slider','active')}}">
                            <i class="nav-icon fa fa-image"></i>
                            <p>اسلایدر</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="/admin/newsletter"
                           class="nav-link {{setActive('admin/newsletter','active')}}">
                            <i class="nav-icon fa fa-users"></i>
                            <p>اعضای خبرنامه</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="/admin/message"
                           class="nav-link {{setActive('admin/message','active')}}">
                            <i class="nav-icon fa fa-envelope"></i>
                            <p>پیام ها</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/faq"
                           class="nav-link {{setActive('admin/faq','active')}}">
                            <i class="nav-icon fa fa-question-circle"></i>
                            <p>سوالات متداول</p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
