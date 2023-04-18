<!-- Main Sidebar Container -->
<aside class="main-sidebar  elevation-4 " style="background-color: #0067ba;">
    <!-- Brand Logo -->
  <div class="bg-primary ">
    <a href="{{ url('/home') }}" class="brand-link">
        <img src="/images/JU.jpg" alt="JU Logo" class="brand-image ">
        <span class="brand-text font-weight-strong">  HelpDesk</span>
    </a>
  </div>

    <!-- Sidebar -->
    <div class="sidebar sidebar-light-primary ">

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
                            </a>
                        </li>
                        @endcan

                        @can('view-any', Spatie\Permission\Models\Permission::class)
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p style="color: #000000;">Permissions</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endif
                @endauth

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