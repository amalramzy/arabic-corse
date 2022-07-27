<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            {{-- <li class="nav-item {{ request()->is('dashboard/*') ? 'active' : '' }} {{ request()->is('large-compact-sidebar/dashboard/*') ? 'active' : '' }}"
                data-item="dashboard">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <div class="triangle"></div>
            </li> --}}
            <li class="nav-item {{ request()->is('admin/*') ? 'active' : '' }} {{ request()->is('large-compact-sidebar/dashboard/*') ? 'active' : '' }}"
                data-item="admin">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <div class="triangle"></div>
            </li>
           
        </ul>
    </div>

    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <i class="sidebar-close i-Close" (click)="toggelSidebar()"></i>
        <header>
            <div class="logo">
                <img src="{{asset('assets/images/logo-text.png')}}" alt="">
            </div>
        </header>
         <!-- Submenu Dashboards -->
         {{-- <div class="submenu-area" data-parent="dashboard">
            <header>
                <h6>Dashboard</h6>
            </header>
            <ul class="childNav" data-parent="dashboard">
           
           
            </ul>
        </div> --}}
         <!--------------------------->
         <!-- Submenu Admins -->
        <div class="submenu-area" data-parent="admin">
            <header>
                <h6>Admin</h6>
            </header>
            <ul class="childNav" data-parent="dashboard">
                <li class="nav-item ">
                    <a class="{{ Route::currentRouteName()=='dashboard' ? 'open' : '' }}"
                        href="{{route('dashboard')}}">
                        <i class="nav-icon i-Clock-3"></i>
                        <span class="item-name">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admins.index')}}"
                        class="{{ Route::currentRouteName()=='admins.index' ? 'open' : '' }}">
                        <i class="nav-icon i-Administrator"></i>
                        <span class="item-name">All Admin</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('users.index')}}"
                        class="{{ Route::currentRouteName()=='users.index' ? 'open' : '' }}">
                        <i class="nav-icon i-Administrator"></i>
                        <span class="item-name">All Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('tracks.index')}}"
                        class="{{ Route::currentRouteName()=='tracks.index' ? 'open' : '' }}">
                        <i class="nav-icon i-Administrator"></i>
                        <span class="item-name">All Tracks</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('courses.index')}}"
                        class="{{ Route::currentRouteName()=='courses.index' ? 'open' : '' }}">
                        <i class="nav-icon i-Administrator"></i>
                        <span class="item-name">All Courses</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('videos.index')}}"
                        class="{{ Route::currentRouteName()=='videos.index' ? 'open' : '' }}">
                        <i class="nav-icon i-Administrator"></i>
                        <span class="item-name">All Videos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('quizzes.index')}}"
                        class="{{ Route::currentRouteName()=='quizzes.index' ? 'open' : '' }}">
                        <i class="nav-icon i-Administrator"></i>
                        <span class="item-name">All quizzes</span>
                    </a>
                </li>
                <li class="nav-item" >
                       <a href="{{route('import-view')}}"
                        class="{{ Route::currentRouteName()=='import-view' ? 'open' : '' }}">
                        <i class="nav-icon i-Administrator"></i>
                        <span class="item-name">Import</span>
                    </a>
                </li>
            </ul>
        </div>
         <!--------------------------->
       
    </div>
    <div class="sidebar-overlay"></div>
</div>
<!--=============== Left side End ================-->