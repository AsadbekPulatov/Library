<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin') }}" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">ММТП</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin') }}" class="d-block">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin') }}"
                       class="nav-link @if(request()->routeIs('admin')) active @endif ">
                        <i class="fa fa-users nav-icon"></i>
                        <p>{{ __("messages.dashboard") }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile.edit') }}"
                       class="nav-link @if(request()->routeIs('profile.edit')) active @endif ">
                        <i class="fa fa-users nav-icon"></i>
                        <p>{{ __("messages.profile") }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('books.index') }}"
                       class="nav-link @if(request()->routeIs('books.index')) active @endif ">
                        <i class="fa fa-users nav-icon"></i>
                        <p>{{ __("messages.books") }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('outlays.index') }}"
                       class="nav-link @if(request()->routeIs('outlays.index')) active @endif ">
                        <i class="fa fa-users nav-icon"></i>
                        <p>{{ __("messages.outlays") }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('types.index') }}"
                       class="nav-link @if(request()->routeIs('types.index')) active @endif ">
                        <i class="fa fa-users nav-icon"></i>
                        <p>{{ __("messages.types") }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <a href="{{ route('logout') }}"
                           class="nav-link" onclick="event.preventDefault();
                           this.closest('form').submit();">
                            <i class="fa fa-sign-out-alt nav-icon"></i>
                            <p>{{ __("messages.logout") }}</p>
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
