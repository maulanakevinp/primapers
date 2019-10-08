
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
            </a>
            
            <!-- Divider -->
            <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    {{ __('Admin') }}
                </div>

                    @if ($title == 'Artikel')
                    <li class="nav-item active">
                    @else
                    <li class="nav-item">
                    @endif
                        <a class="nav-link pb-0" href="{{ url('/article') }}">
                            <i class="{{ __('far fa-fw fa-newspaper') }}"></i>
                            <span>{{ __('Artikel') }}</span>
                        </a>
                    </li>

                    @if ($title == 'Profile')
                    <li class="nav-item active">
                    @else
                    <li class="nav-item">
                    @endif
                        <a class="nav-link pb-0" href="{{ url('/profile') }}">
                            <i class="{{ __('fas fa-fw fa-address-card') }}"></i>
                            <span>{{ __('Profile') }}</span>
                        </a>
                    </li>


                    @if ($title == 'Kategori')
                    <li class="nav-item active">
                    @else
                    <li class="nav-item">
                    @endif
                        <a class="nav-link pb-0" href="{{ url('/category') }}">
                            <i class="{{ __('fas fa-fw fa-layer-group	') }}"></i>
                            <span>{{ __('Kategori') }}</span>
                        </a>
                    </li>

                    @if ($title == 'Pengumuman')
                    <li class="nav-item active">
                    @else
                    <li class="nav-item">
                    @endif
                        <a class="nav-link pb-0" href="{{ url('/pengumuman') }}">
                            <i class="{{ __('fas fa-fw fa-bullhorn') }}"></i>
                            <span>{{ __('Pengumuman') }}</span>
                        </a>
                    </li>

                    <hr class="sidebar-divider mt-3">
                    
                    <!-- Nav Item - Utilities Collapse Menu -->
                    @if ($title == 'Utilities')
                    <li class="nav-item active">
                    @else
                    <li class="nav-item">
                    @endif
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fas fa-fw fa-wrench"></i>
                            <span>Utilities</span>
                        </a>
                        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Custom Utilities:</h6>
                                <a class="collapse-item" href="{{ url('/header') }}">Header</a>
                                <a class="collapse-item" href="{{ url('/slide') }}">Slide show</a>
                                <a class="collapse-item" href="{{ url('/change-password') }}">Ganti password</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-0" href="" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
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
