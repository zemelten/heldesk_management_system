<!-- Main Sidebar Container -->
@auth

    <aside class="main-sidebar sidebar-light elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('/') }}" class="brand-link text-dark">
            <img src="{{ asset('images/logo.jpg') }}" alt="JU Logo" class="brand-image">
            <span class="brand-text font-weight-light"><strong style="font-size:25px;"> JU HelpDesk </strong></span>
        </a>


        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" >

                    @auth

                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-gauge fa-lg"></i>  <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('tickets.index') }}" class="nav-link ">
                                <i class="nav-icon fa-solid fa-ticket fa-lg"></i>
                                <p class="text-dark">
                                    <strong  style=" color:black;" >
                                        Tickets
                                    </strong>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tickets.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p style=" color:black;">
                                    <i class="nav-icon fas fa-angle-left right"></i>
                                    <strong>
                                        My Tickets
                                    </strong>

                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('tickets.index') }}" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p style=" color:black;">
                                            <strong>
                                                Active Tickets
                                            </strong>
                                        </p>
                                    </a>
                                </li>



                                <li class="nav-item">
                                    <a href="{{ route('tickets.index') }}" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p style=" color:black;">
                                            <strong>
                                                Closed Tickets
                                            </strong>
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('escalated-tickets.index') }}" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p style=" color:black;">
                                            <strong>
                                                Escalated Tickets
                                            </strong>
                                        </p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class=" nav-icon fa-solid fa-users fa-lg"></i>
                                <p>
                                    User Management
                                    <i class="  nav-icon fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>List of users</p>
                                    </a>
                                </li>



                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('permissions.index') }}" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>Permissions</p>
                                    </a>
                                </li>

                                </ul>
                            </li>



                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa-solid fa-network-wired fa-lg"></i>
                                    <p>
                                        Personnels
                                       <i class="  nav-icon fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('view-any', Spatie\Permission\Models\Role::class)
                                        <li class="nav-item">
                                            <a href="{{ route('directors.index') }}" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <strong>
                                                    <p  style=" color:black;">Directors</p>
                                                </strong>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('view-any', Spatie\Permission\Models\Permission::class)
                                        <li class="nav-item">
                                            <a href="{{ route('leaders.index') }}" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <strong>
                                                    <p style=" color:black;">Team Leaders</p>
                                                </strong>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('user-supports.index') }}" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <strong>
                                                    <p style=" color:black;">User Supports</p>
                                                </strong>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('customers.index') }}" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <strong>
                                                    <p style=" color:black;">Customers</p>
                                                </strong>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa-solid fa-gear fa-lg"></i>
                                    <p>
                                        Settings
                                       <i class="  nav-icon fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('view-any', App\Models\Campus::class)
                                        <li class="nav-item">
                                            <a href="{{ route('campuses.index') }}" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <strong>
                                                    <p style=" color:black;">Campuses</p>
                                                </strong>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('view-any', App\Models\Building::class)
                                        <li class="nav-item">
                                            <a href="{{ route('buildings.index') }}" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <strong>
                                                    <p style=" color:black;">Buildings</p>
                                                </strong>
                                            </a>
                                        </li>
                                    @endcan


                                    @can('view-any', App\Models\Problem::class)
                                        <li class="nav-item">
                                            <a href="{{ route('problems.index') }}" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <strong>
                                                    <p style=" color:black;">Problems</p>
                                                </strong>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('view-any', App\Models\Prioritie::class)
                                    <li class="nav-item">
                                        <a href="{{ route('priorities.index') }}" class="nav-link">
                                            <i class="nav-icon icon ion-md-radio-button-off"></i>
                                            <p>Priorities</p>
                                        </a>
                                    </li>
                                @endcan
                                    @can('view-any', App\Models\Floor::class)
                                        <li class="nav-item">
                                            <a href="{{ route('floors.index') }}" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <strong>
                                                    <p style=" color:black;">Floors</p>
                                                </strong>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa-solid fa-cubes-stacked fa-lg"></i>
                                    
                                    <strong>
                                    <p style=" color:black;">
                                        Queue Type
                                       <i class="  nav-icon fas fa-angle-left right"></i>
                                    </p>
                                    </strong>
                                    <i class="  nav-icon fas fa-angle-left right"  style=" color:black;"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('view-any', Spatie\Permission\Models\Role::class)
                                        <li class="nav-item">
                                            <a href="{{ route('roles.index') }}" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <p>System admin</p>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('view-any', Spatie\Permission\Models\Permission::class)
                                        <li class="nav-item">
                                            <a href="{{ route('permissions.index') }}" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <strong>
                                                    <p style=" color:black;">Sys & Network Admin</p>
                                                </strong>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <strong>
                                                    <p style=" color:black;">Technician</p>
                                                </strong>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa-solid fa-house fa-lg"></i>
                                    <p>
                                      Org. Structure
                                       <i class="  nav-icon fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('view-any', Spatie\Permission\Models\Role::class)
                                        <li class="nav-item">
                                            <a href="{{ route('organizational-units.index') }}" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <strong>
                                                    <p style=" color:black;">Organization Units</p>
                                                </strong>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class=" nav-iconfa-solid fa-wave-pulse fa-lg"></i>
                                    <p>
                                        Reporting
                                       <i class="  nav-icon fas fa-angle-left right"></i>
                                    </p>
                                    <i class="  nav-icon fas fa-angle-left right "  style=" color:black;"></i>

                                </a>
                                <ul class="nav nav-treeview">
                                    @can('view-any', Spatie\Permission\Models\Role::class)
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <strong>
                                                    <p style=" color:black;">Over all Performance</p>
                                                </strong>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('view-any', Spatie\Permission\Models\Permission::class)
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <strong>
                                                    <p  style=" color:black;">User Support Efficiency</p>
                                                </strong>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <strong>
                                                    <p style=" color:black;">Help Desk Workers</p>
                                                </strong>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endif
                    @endauth
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="nav-icon icon ion-md-exit"></i>
                                <strong>
                                    <p style=" color:black;">{{ __('Logout') }}</p>
                                </strong>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endauth
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
@endauth
