<!-- Main Sidebar Container -->
@auth

    <aside class="main-sidebar sidebar-light elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('/') }}" class="brand-link">
            <img src="{{ asset('images/logo.jpg') }}" alt="JU Logo" class="brand-image">
            <span class="brand-text font-weight-light">JU HelpDesk</span>
        </a>


        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">

                    @auth

                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-gauge fa-lg"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tickets.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-ticket fa-lg""></i>
                                <p>
                                    Tickets
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tickets.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-key fa-lg"></i>
                                <p>
                                    My Tickets
                                    <i class="  nav-icon fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{ route('tickets.index') }}" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>Active Tickets</p>
                                    </a>
                                </li>



                                <li class="nav-item">
                                    <a href="{{ route('tickets.index') }}" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>Closed Tickets</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('permissions.index') }}" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>Escalated Tickets</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                                Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
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
                                                <p>Directors</p>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('view-any', Spatie\Permission\Models\Permission::class)
                                        <li class="nav-item">
                                            <a href="{{ route('leaders.index') }}" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <p>Team Leaders</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('user-supports.index') }}" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <p>User Supports</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('customers.index') }}" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <p>Customers</p>
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
                                                <p>Campuses</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('view-any', App\Models\Building::class)
                                        <li class="nav-item">
                                            <a href="{{ route('buildings.index') }}" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <p>Buildings</p>
                                            </a>
                                        </li>
                                    @endcan


                                    @can('view-any', App\Models\Problem::class)
                                        <li class="nav-item">
                                            <a href="{{ route('problems.index') }}" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <p>Problems</p>
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
                                                <p>Floors</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa-solid fa-cubes-stacked fa-lg"></i>
                                    <p>
                                        Queue Type
                                        <i class="  nav-icon fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('view-any', Spatie\Permission\Models\Role::class)
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <p>System admin</p>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('view-any', Spatie\Permission\Models\Permission::class)
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <p>Network</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <p>Technician</p>
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
                                                <p>Organization Units</p>
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
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('view-any', Spatie\Permission\Models\Role::class)
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <p>Over all Performance</p>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('view-any', Spatie\Permission\Models\Permission::class)
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <p>User supports Efficiency</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <p>Help Desk Workers</p>
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
                                <p>{{ __('Logout') }}</p>
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
