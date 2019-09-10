<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">Username</div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
        <li class="{{ Request::is('/') ? 'active' : '' }}">
            <a href="{{ url('/') }}">
                <em class="fa fa-dashboard">&nbsp;</em> Dashboard
            </a>
        </li>
        <li class="{{ Request::is('personel') || Request::segment(1) == 'personel' ? 'active' : '' }}">
            <a href="{{ route('personel.index') }}">
                <em class="fa fa-bookmark">&nbsp;</em> Personel
            </a>
        </li>
        <li class="{{ Request::is('about') ? 'active' : '' }}">
            <a href="{{ route('personel.index') }}">
                <em class="fa fa-bookmark">&nbsp;</em> Kepala Jabatan
            </a>
        </li>
        <li class="parent ">
            <a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-gears">&nbsp;</em> Setting
                <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right">
                    <em class="fa fa-minus"></em>
                </span>
            </a>
            <ul class="children collapse in" id="sub-item-1">
                <li>
                    <a class="{{ Request::is('users') || Request::segment(1) == 'users' ? 'active' : '' }}"
                       href="{{ route('users.index') }}">
                        <span class="fa fa-arrow-right">&nbsp;</span> User Admin
                    </a>
                </li>
                <li>
                    <a class="{{ Request::is('category') || Request::segment(1) == 'category' ? 'active' : '' }}"
                       href="{{ route('category.index') }}">
                        <span class="fa fa-arrow-right">&nbsp;</span> Kategori
                    </a>
                </li>
                <li>
                    <a class="{{ Request::is('reminder') || Request::segment(1) == 'reminder' ? 'active' : '' }}"
                       href="{{ route('reminder.index') }}">
                        <span class="fa fa-arrow-right">&nbsp;</span> Reminder
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                <span class="fa fa-sign-out"></span>
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</div>
<!--/.sidebar-->