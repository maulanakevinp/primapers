
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-address-card"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
            </a>
            
            <!-- Divider -->
            <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    {{ __('Admin') }}
                </div>

                    <li class="nav-item">
                        <a class="nav-link pb-0" href="{{ url('/article') }}">
                            <i class="{{ __('far fa-fw fa-newspaper') }}"></i>
                            <span>{{ __('Article') }}</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link pb-0" href="{{ url('/profile') }}">
                            <i class="{{ __('fas fa-fw fa-address-card') }}"></i>
                            <span>{{ __('Profile') }}</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link pb-0" href="{{ url('/category') }}">
                            <i class="{{ __('fas fa-fw fa-layer-group	') }}"></i>
                            <span>{{ __('Category') }}</span>
                        </a>
                    </li>
                    
            <!-- Divider -->
            <hr class="sidebar-divider mt-3">

                    <li class="nav-item">
                        <a class="nav-link pb-0" href="{{ url('/logout') }}">
                            <i class="{{ __('fas fa-sign-out-alt fa-fw') }}"></i>
                            <span>{{ __('Logout') }}</span>
                        </a>
                    </li>

            <!-- Divider -->
            <hr class="sidebar-divider mt-3">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
