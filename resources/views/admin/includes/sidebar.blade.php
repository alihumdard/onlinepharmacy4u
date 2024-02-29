<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        @if(view_permission('dashboard'))
        <li class="nav-item">
            <a class="nav-link {{(request()->routeIs('admin.index')) ? '' : 'collapsed'}} " href="{{route('admin.index')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        @endif

        @if(view_permission('categories'))
        <li class="nav-item">
            <a class="nav-link {{ (request()->routeIs(['admin.categories','admin.addCategory'])) ? '' : 'collapsed'}}" data-bs-target="#siderbar-cat" data-bs-toggle="collapse">
                <i class="bi bi-menu-button-wide"></i>
                <span>Categories</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="siderbar-cat" class="nav-content {{ (request()->routeIs(['admin.categories','admin.assignQuestion', 'admin.addCategory'])) ? '' : 'collapse'}} " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="{{(request()->routeIs(['admin.categories'])) ? 'nav-link ' : ''}}" href="{{route('admin.categories')}}">
                        <i class="bi bi-circle"></i><span>All Categories</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.assignQuestion'])) ? 'nav-link ' : ''}}" href="{{route('admin.assignQuestion')}}">
                        <i class="bi bi-circle"></i><span>Assign Questions</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.addCategory'])) ? 'nav-link ' : ''}}" href="{{route('admin.addCategory')}}">
                        <i class="bi bi-circle"></i><span>New Add</span>
                    </a>
                </li>

            </ul>
        </li>
        @endif

        @if(view_permission('consultations'))
        <li class="nav-item">
            <a class="nav-link {{ (request()->routeIs(['admin.questions','admin.addQuestion'])) ? '' : 'collapsed'}} " data-bs-target="#siderbar-contsult" data-bs-toggle="collapse">
                <i class="bi bi-menu-button-wide"></i><span>Consultations</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="siderbar-contsult" class="nav-content {{ (request()->routeIs(['admin.questions','admin.assignQuestion', 'admin.addQuestion'])) ? '' : 'collapse'}} " data-bs-parent="#sidebar-nav">

                <li>
                    <a class="{{(request()->routeIs(['admin.questions'])) ? 'nav-link ' : ''}}" href="{{route('admin.questions')}}">
                        <i class="bi bi-circle"></i><span>All Questions</span>
                    </a>
                </li>

                <li>
                    <a class="{{(request()->routeIs(['admin.addQuestion'])) ? 'nav-link ' : ''}}" href="{{route('admin.addQuestion')}}">
                        <i class="bi bi-circle"></i><span>Add Question</span>
                    </a>
                </li>

            </ul>
        </li>
        @endif

        @if(view_permission('prodcuts'))
        <li class="nav-item">
            <a class="nav-link {{ (request()->routeIs(['admin.prodcuts','admin.addProduct'])) ? '' : 'collapsed'}} " data-bs-target="#forms-nav" data-bs-toggle="collapse">
                <i class="bi bi-journal-text"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content {{(request()->routeIs(['admin.prodcuts','admin.addProduct'])) ? '' : 'collapse'}}  " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="{{(request()->routeIs(['admin.prodcuts'])) ? 'nav-link ' : ''}} " href="{{route('admin.prodcuts')}}">
                        <i class="bi bi-circle"></i><span>All Products</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.addProduct'])) ? 'nav-link ' : ''}}" href="{{route('admin.addProduct')}}">
                        <i class="bi bi-circle"></i><span>Add Product</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @if(view_permission('orders'))
        <li class="nav-item">
            <a class="nav-link {{ (request()->routeIs(['admin.ordersRecieved','admin.doctorsApproval','admin.ordersConfrimed','admin.ordersShiped' ])) ? '' : 'collapsed'}} " data-bs-target="#charts-nav" data-bs-toggle="collapse">
                <i class="bi bi-bar-chart"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content {{ (request()->routeIs(['admin.ordersRecieved','admin.doctorsApproval','admin.ordersConfrimed','admin.ordersShiped'])) ? '' : 'collapse'}}  " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="{{(request()->routeIs(['admin.ordersRecieved'])) ? 'nav-link ' : ''}}" href="{{route('admin.ordersRecieved')}}">
                        <i class="bi bi-circle"></i><span>Order Recieved</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.doctorsApproval'])) ? 'nav-link ' : ''}}" href="{{route('admin.doctorsApproval')}}">
                        <i class="bi bi-circle"></i><span>Medical Professionals Approval</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.ordersConfrimed'])) ? 'nav-link ' : ''}}" href="{{route('admin.ordersConfrimed')}}">
                        <i class="bi bi-circle"></i><span>Confirmed Orders</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.ordersShiped'])) ? 'nav-link ' : ''}}" href="{{route('admin.ordersShiped')}}">
                        <i class="bi bi-circle"></i><span>Shiped Orders</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @if(view_permission('doctors'))
        <li class="nav-item">
            <a class="nav-link {{(request()->routeIs(['admin.doctors','admin.addDoctor'])) ? '' : 'collapsed'}} " data-bs-target="#tables-nav" data-bs-toggle="collapse">
                <i class="bi bi-person"></i><span>Healthcare Professionals</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content {{(request()->routeIs(['admin.doctors','admin.addDoctor'])) ? '' : 'collapse'}} " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="{{(request()->routeIs(['admin.doctors'])) ? 'nav-link ' : ''}} " href="{{route('admin.doctors')}}">
                        <i class="bi bi-person"></i><span>Profiles</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.addDoctor'])) ? 'nav-link ' : ''}} " href="{{route('admin.addDoctor')}}">
                        <i class="bi bi-circle"></i><span>Enroll New</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @if(view_permission('dispensaries'))
        <li class="nav-item">
            <a class="nav-link {{(request()->routeIs(['admin.admins','admin.addAdmin'])) ? '' : 'collapsed'}} " data-bs-target="#siderbar-admin" data-bs-toggle="collapse">
                <i class="bi bi-person"></i><span>Dispensaries</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="siderbar-admin" class="nav-content  {{(request()->routeIs(['admin.admins','admin.addAdmin'])) ? '' : 'collapse'}} " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="{{(request()->routeIs(['admin.admins'])) ? 'nav-link ' : ''}} " href="{{route('admin.admins')}}">
                        <i class="bi bi-circle"></i><span>Dispensaries List</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.addAdmin'])) ? 'nav-link ' : ''}} " href="{{route('admin.addAdmin')}}">
                        <i class="bi bi-circle"></i><span>Enroll New</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @if(view_permission('users'))
        <li class="nav-item">
            <a class="nav-link {{(request()->routeIs(['admin.users'])) ? '' : 'collapsed'}} " data-bs-target="#siderbar-users" data-bs-toggle="collapse">
                <i class="bi bi-person"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="siderbar-users" class="nav-content {{(request()->routeIs(['admin.users'])) ? '' : 'collapse'}} " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="{{(request()->routeIs(['admin.users'])) ? 'nav-link ' : ''}} " href="{{route('admin.users')}}">
                        <i class="bi bi-circle"></i><span>All Users</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif
        <li class="nav-heading">-------- user's Basic Settings --------</li>

        @if(view_permission('setting'))
        <li class="nav-item">
            <a class="nav-link {{(request()->routeIs('admin.profileSetting')) ? '' : 'collapsed'}} " href="{{route('admin.profileSetting')}}">
                <i class="bi bi-person"></i>
                <span>Profile Setting</span>
            </a>
        </li>
        @endif

        @if(view_permission('faq'))
        <li class="nav-item">
            <a class="nav-link {{(request()->routeIs('admin.faq')) ? '' : 'collapsed'}} " href="{{route('admin.faq')}}">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li>
        @endif

        @if(view_permission('contact'))
        <li class="nav-item">
            <a class="nav-link {{(request()->routeIs('admin.contact')) ? '' : 'collapsed'}} " href="{{route('admin.contact')}}">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li>
        @endif
    </ul>
</aside>
<!-- End Sidebar-->