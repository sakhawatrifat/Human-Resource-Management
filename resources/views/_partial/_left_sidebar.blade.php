<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile" style="background: url({{asset('assets/images/background/user-info.jpg')}}) no-repeat;">
            <!-- User profile image -->
            <div class="profile-img"> <img src="{{asset('assets/images/users/profile.png')}}" alt="user" /> </div>
            <!-- User profile text-->
            <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Markarn Doe</a>
                <div class="dropdown-menu animated flipInY"> <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a> <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a> <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                    <div class="dropdown-divider"></div> <a href="https://www.wrappixel.com/demos/admin-templates/material-pro/material/login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a> </div>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">PERSONAL</li>
                <li> <a class=" waves-dark" href="{{ url('/') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
                </li>
                {{-- <li> <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-laptop-windows"></i><span class="hide-menu">Designation</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{URL::to('/designation')}}">Add Designation</a></li>
                    </ul>
                </li> --}}
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-laptop-windows"></i><span class="hide-menu">Department</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('department.index') }}">Add Department</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Employee</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('employee.index') }}">Add Employee</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Award</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('award.index') }}">Add Award</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Attendance</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('attendance.create') }}">Todays Attendance</a></li>
                    </ul>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('attendance.index') }}">Attendance List</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Holidays</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('holiday.index') }}">Monthly Holidays</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Notice</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('notice.index') }}">Notice List</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Expense</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('expense.index') }}">Expense List</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Report</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Attendance Report</a></li>
                    </ul>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Leave Report</a></li>
                    </ul>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Expense Report</a></li>
                    </ul>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Award Report</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Configuration</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Leave Type</a></li>
                    </ul>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">General Setting</a></li>
                    </ul>

                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Two Factor Login</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Admin</a></li>
                    </ul>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Employee</a></li>
                    </ul>

                </li>
                <li class="nav-devider"></li>
                <li class="nav-small-cap">EXTRA COMPONENTS</li>
        
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item--><a href="#" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item--><a href="#" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <!-- item--><a href="#" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div>
    <!-- End Bottom points-->
</aside>