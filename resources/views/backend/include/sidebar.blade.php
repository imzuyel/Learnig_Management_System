<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="">
            <img src="{{ asset('/').$setting->logo }}" width="200px" height="50px" class="logo-icon-2" alt="" />
        </div>
        <div>
            <h4 class="logo-text">{{$setting->title}}</h4>
        </div>
        <a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
        </a>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="{{ Request::is('admin/dashboard') ? 'mm-active' : '' }}">
            <a href="{{ route('admin.home') }}">
                <div class="parent-icon icon-color-1">
                    <i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li class="{{ Request::is('admin/banner/*') ? 'mm-active' : '' }}">
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-12"><i class="bx bx-repeat"></i>
                </div>
                <div class="menu-title">Banner</div>
            </a>
            <ul class="{{ Request::is('admin/banner*') ? 'mm-show' : '' }}">

                <li class="{{ Request::is('admin/banner/create/') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.banner.create') }}"><i class="bx bx-right-arrow-alt"></i>
                        Add
                    </a>
                </li>
                <li
                    class="{{ Request::is('admin/banner') ? 'mm-active' : '' }}{{ Request::is('admin/banner/*/edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.banner.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage</a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is('admin/category/*') ? 'mm-active' : '' }}">
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-3"><i class="bx bx-receipt"></i>
                </div>
                <div class="menu-title">Category</div>
            </a>
            <ul class="{{ Request::is('admin/category*') ? 'mm-show' : '' }}">

                <li class="{{ Request::is('admin/category/create/') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.category.create') }}"><i class="bx bx-right-arrow-alt"></i>
                        Add
                    </a>
                </li>
                <li
                    class="{{ Request::is('admin/category') ? 'mm-active' : '' }}{{ Request::is('admin/category/*/edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.category.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage</a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is('admin/post/*') ? 'mm-active' : '' }}">
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-4"><i class="bx bx-task"></i>
                </div>
                <div class="menu-title">Post</div>
            </a>
            <ul class="{{ Request::is('admin/post*') ? 'mm-show' : '' }}">

                <li class="{{ Request::is('admin/post/create/') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.post.create') }}"><i class="bx bx-right-arrow-alt"></i>
                        Add
                    </a>
                </li>
                <li
                    class="{{ Request::is('admin/post') ? 'mm-active' : '' }}{{ Request::is('admin/post/*/edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.post.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage</a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is('admin/upcomming/*') ? 'mm-active' : '' }}">
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-5"><i class="bx bx-run"></i>
                </div>
                <div class="menu-title">Upcomming</div>
            </a>
            <ul class="{{ Request::is('admin/upcomming*') ? 'mm-show' : '' }}">

                <li class="{{ Request::is('admin/upcomming/create/') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.upcomming.create') }}"><i class="bx bx-right-arrow-alt"></i>
                        Add
                    </a>
                </li>
                <li
                    class="{{ Request::is('admin/upcomming') ? 'mm-active' : '' }}{{ Request::is('admin/upcomming/*/edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.upcomming.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage</a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is('admin/achiement/*') ? 'mm-active' : '' }}">
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-6"><i class="bx bx-trophy"></i>
                </div>
                <div class="menu-title">Achiement</div>
            </a>
            <ul class="{{ Request::is('admin/achiement*') ? 'mm-show' : '' }}">

                <li class="{{ Request::is('admin/achiement/create/') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.achiement.create') }}"><i class="bx bx-right-arrow-alt"></i>
                        Add
                    </a>
                </li>
                <li
                    class="{{ Request::is('admin/achiement') ? 'mm-active' : '' }}{{ Request::is('admin/achiement/*/edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.achiement.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage</a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is('admin/testimonial/*') ? 'mm-active' : '' }}">
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-7"><i class="bx bx-star"></i>
                </div>
                <div class="menu-title">Testimonial</div>
            </a>
            <ul class="{{ Request::is('admin/testimonial*') ? 'mm-show' : '' }}">

                <li class="{{ Request::is('admin/testimonial/create/') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.testimonial.create') }}"><i class="bx bx-right-arrow-alt"></i>
                        Add
                    </a>
                </li>
                <li
                    class="{{ Request::is('admin/testimonial') ? 'mm-active' : '' }}{{ Request::is('admin/testimonial/*/edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.testimonial.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage</a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is('admin/contact/*') ? 'mm-active' : '' }}">
            <a href="{{ route('admin.contact.index') }}">
                <div class="parent-icon icon-color-8"><i class="bx bx-user-plus"></i>
                </div>
                <div class="menu-title">Contact</div>
            </a>
        </li>


        <li class="{{ Request::is('admin/subscriber/*') ? 'mm-active' : '' }}">
            <a href="{{ route('admin.subscriber.index') }}">

                <div class="parent-icon icon-color-9"><i class="bx bx bx-play-circle"></i>
                </div>
                <div class="menu-title">Subscriber</div>
            </a>
        </li>
        <li class="menu-label text-twitter">Settings</li>
        <li class="{{ Request::is('admin/follow/*') ? 'mm-active' : '' }}">
            <a class="has-arrow" href="javascript:;">
                  <div class="parent-icon icon-color-10"><i class="bx bx-comment-check"></i>
                </div>
                <div class="menu-title">Follow</div>
            </a>
            <ul class="{{ Request::is('admin/follow*') ? 'mm-show' : '' }}">

                <li class="{{ Request::is('admin/follow/create/') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.follow.create') }}"><i class="bx bx-right-arrow-alt"></i>
                        Add
                    </a>
                </li>
                <li
                    class="{{ Request::is('admin/follow') ? 'mm-active' : '' }}{{ Request::is('admin/follow/*/edit') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.follow.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage</a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('admin/setting/*') ? 'mm-active' : '' }}">
            <a href="{{ route('admin.setting.index') }}">
                  <div class="parent-icon icon-color-11"><i class="bx bx-cog"></i>
                </div>
                <div class="menu-title">Settings</div>
            </a>
        </li>

    </ul>
    <!--end navigation-->
</div>
