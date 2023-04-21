<!-- Main Sidebar Container -->
@auth

    <aside class="main-sidebar sidebar-light elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('/') }}" class="brand-link">
            <img src="{{ asset('images/logo.jpg') }}" alt="JU Logo" class="brand-image">
            <span class="brand-text font-weight-light">JU HelpDesk</span>
        </a>
        

<<<<<<< HEAD
        <!-- Sidebar Menu -->
        <nav class="mt-2 " >
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">

                @auth
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-pulse"></i>
                        <p style="color: #000000;">
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item" >
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon ion-md-apps"></i>
                        <p style="color: #000000;">
                            Apps
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                            @can('view-any', App\Models\User::class)
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p style="color: #000000;">Users</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Campus::class)
                            <li class="nav-item">
                                <a href="{{ route('campuses.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p style="color: #000000;">Campuses</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Building::class)
                            <li class="nav-item">
                                <a href="{{ route('buildings.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p style="color: #000000;">Buildings</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Director::class)
                            <li class="nav-item">
                                <a href="{{ route('directors.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p style="color: #000000;">Directors</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Leader::class)
                            <li class="nav-item">
                                <a href="{{ route('leaders.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p style="color: #000000;">Leaders</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Problem::class)
                            <li class="nav-item">
                                <a href="{{ route('problems.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p style="color: #000000;">Problems</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Unit::class)
                            <li class="nav-item">
                                <a href="{{ route('units.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p style="color: #000000;">Units</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\ServiceUnit::class)
                            <li class="nav-item">
                                <a href="{{ route('service-units.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p style="color: #000000;">Service Units</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\UserSupport::class)
                            <li class="nav-item">
                                <a href="{{ route('user-supports.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p style="color: #000000;">User Supports</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\AssignedOffice::class)
                            <li class="nav-item">
                                <a href="{{ route('assigned-offices.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p style="color: #000000;">Assigned Offices</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Prioritie::class)
                            <li class="nav-item">
                                <a href="{{ route('priorities.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p style="color: #000000;">Priorities</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\OrganizationalUnit::class)
                            <li class="nav-item">
                                <a href="{{ route('organizational-units.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p style="color: #000000;">Organizational Units</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\AssignedOrgUnit::class)
                            <li class="nav-item">
                                <a href="{{ route('assigned-org-units.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p style="color: #000000;">Assigned Org Units</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Floor::class)
                            <li class="nav-item">
                                <a href="{{ route('floors.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p style="color: #000000;">Floors</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Customer::class)
                            <li class="nav-item">
                                <a href="{{ route('customers.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p style="color: #000000;">Customers</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\ProblemCatagory::class)
                            <li class="nav-item">
                                <a href="{{ route('problem-catagories.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p style="color: #000000;">Problem Catagories</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Ticket::class)
                            <li class="nav-item">
                                <a href="{{ route('tickets.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p style="color: #000000;">Tickets</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\EscalatedTicket::class)
                            <li class="nav-item">
                                <a href="{{ route('escalated-tickets.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p style="color: #000000;">Escalated Tickets</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Reports::class)
                            <li class="nav-item">
                                <a href="{{ route('all-reports.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p style="color: #000000;">All Reports</p>
                                </a>
                            </li>
                            @endcan
                    </ul>
                </li>

                @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) || 
                    Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon ion-md-key"></i>
                        <p style="color: #000000;">
                            Access Management
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('view-any', Spatie\Permission\Models\Role::class)
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p style="color: #000000;">Roles</p>
=======
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
>>>>>>> ccbd7415dec900773b60b624741b16dc91681707
                            </a>
                        </li>
                        <li class="nav-item">
<<<<<<< HEAD
                            <a href="{{ route('permissions.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p style="color: #000000;">Permissions</p>
=======
                            <a href="{{ route('tickets.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-ticket fa-lg""></i>
                                <p>
                                    Tickets
                                </p>
>>>>>>> ccbd7415dec900773b60b624741b16dc91681707
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

<<<<<<< HEAD
                <li class="nav-item">
                    <a href="https://adminlte.io/docs/3.1//index.html" target="_blank" class="nav-link">
                        <i class="nav-icon icon ion-md-help-circle-outline"></i>
                        <p style="color: #000000;">Docs</p>
                    </a>
                </li>

                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon icon ion-md-exit"></i>
                        <p style="color: #000000;">{{ __('Logout') }}</p>
                    </a>
=======
                                <li class="nav-item">
                                    <a href="{{ route('tickets.index') }}" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>Active Tickets</p>
                                    </a>
                                </li>

>>>>>>> ccbd7415dec900773b60b624741b16dc91681707


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



                        @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                                Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
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
                                                <p>Network</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('permissions.index') }}" class="nav-link">
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
                                            <a href="{{ route('roles.index') }}" class="nav-link">
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
                                            <a href="{{ route('roles.index') }}" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <p>Over all Performance</p>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('view-any', Spatie\Permission\Models\Permission::class)
                                        <li class="nav-item">
                                            <a href="{{ route('permissions.index') }}" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <p>User supports Efficiency</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('permissions.index') }}" class="nav-link">
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
