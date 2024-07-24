<style>
    .displaynone {
        display: none;
    }
</style>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        @if(view_permission('home'))
        <li class="nav-item">
            <a class="btn btn-success w-100 mb-2 rounded-pill px-5 py-2 fw-bold" href="{{route('web.index')}}">
            <i class="bi bi-arrow-right-circle"></i>
                <span>Go To Shop</span>
            </a>
        </li>
        @endif

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
            <a class="nav-link {{ (request()->routeIs(['admin.categories','admin.subCategories','admin.childCategories', 'admin.addCategory', 'admin.categoriesTrash'])) ? '' : 'collapsed'}}" data-bs-target="#siderbar-cat" data-bs-toggle="collapse">
                <i class="bi bi-menu-button-wide"></i>
                <span>Categories</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="siderbar-cat" class="nav-content {{ (request()->routeIs(['admin.categories','admin.subCategories','admin.childCategories', 'admin.addCategory', 'admin.categoriesTrash'])) ? '' : 'collapse'}} " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="{{(request()->routeIs(['admin.categories'])) ? 'nav-link ' : ''}}" href="{{route('admin.categories')}}">
                        <i class="bi bi-circle"></i><span>Main Categories</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.subCategories'])) ? 'nav-link ' : ''}}" href="{{route('admin.subCategories')}}">
                        <i class="bi bi-circle"></i><span>Sub Categories</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.childCategories'])) ? 'nav-link ' : ''}}" href="{{route('admin.childCategories')}}">
                        <i class="bi bi-circle"></i><span>Child Categories</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.addCategory'])) ? 'nav-link ' : ''}}" href="{{route('admin.addCategory')}}">
                        <i class="bi bi-circle"></i><span>Add New</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @if(view_permission('questions'))
        <li class="nav-item">
            <a class="nav-link {{ (request()->routeIs(['admin.questionCategories', 'admin.addQuestionCategory', 'admin.questions', 'admin.addQuestion','admin.addfaqQuestion', 'admin.assignQuestion', 'admin.pMedGQ', 'admin.prescriptionMedGQ','admin.faqQuestions'])) ? '' : 'collapsed'}}" data-bs-target="#siderbar-col" data-bs-toggle="collapse">
                <i class="bi bi-menu-button-wide"></i>
                <span>Questions</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="siderbar-col" class="nav-content {{ (request()->routeIs(['admin.questionCategories', 'admin.addQuestionCategory', 'admin.questions', 'admin.addQuestion', 'admin.addfaqQuestion', 'admin.assignQuestion', 'admin.pMedGQ', 'admin.prescriptionMedGQ','admin.faqQuestions'])) ? '' : 'collapse'}} " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="{{(request()->routeIs(['admin.addQuestionCategory'])) ? 'nav-link ' : ''}}" href="{{route('admin.addQuestionCategory')}}">
                        <i class="bi bi-circle"></i><span>Add Category</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.questionCategories'])) ? 'nav-link ' : ''}}" href="{{route('admin.questionCategories')}}">
                        <i class="bi bi-circle"></i><span>Question Categories</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.assignQuestion'])) ? 'nav-link ' : ''}}" href="{{route('admin.assignQuestion')}}">
                        <i class="bi bi-circle"></i><span>Questions Mapping</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.addQuestion'])) ? 'nav-link ' : ''}}" href="{{route('admin.addQuestion')}}">
                        <i class="bi bi-circle"></i><span>Add Question</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.questions'])) ? 'nav-link ' : ''}}" href="{{route('admin.questions')}}">
                        <i class="bi bi-circle"></i><span>Product Questions</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.faqQuestions'])) ? 'nav-link ' : ''}}" href="{{route('admin.faqQuestions')}}">
                        <i class="bi bi-circle"></i><span>FAQ Questions</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.addfaqQuestion'])) ? 'nav-link ' : ''}}" href="{{route('admin.addfaqQuestion')}}">
                        <i class="bi bi-circle"></i><span>Add FAQ Questions</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.pMedGQ'])) ? 'nav-link ' : ''}}" href="{{route('admin.pMedGQ')}}">
                        <i class="bi bi-circle"></i><span>P.Med General Q.</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.prescriptionMedGQ'])) ? 'nav-link ' : ''}}" href="{{route('admin.prescriptionMedGQ')}}">
                        <i class="bi bi-circle"></i><span>Prescription Med General Q.</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @if(view_permission('prodcuts'))
        <li class="nav-item">
            <a class="nav-link {{ (request()->routeIs(['admin.prodcuts','admin.prodcutsLimits','admin.addProduct','admin.importedProdcuts','admin.importProducts','admin.proTrash'])) ? '' : 'collapsed'}} " data-bs-target="#forms-nav" data-bs-toggle="collapse">
                <i class="bi bi-journal-text"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content {{(request()->routeIs(['admin.prodcuts','admin.prodcutsLimits','admin.addProduct','admin.importedProdcuts','admin.importProducts','admin.proTrash','admin.featuredProducts'])) ? '' : 'collapse'}}  " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="{{(request()->routeIs(['admin.prodcuts'])) ? 'nav-link ' : ''}} " href="{{route('admin.prodcuts')}}">
                        <i class="bi bi-circle"></i><span>All Products</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.importedProdcuts'])) ? 'nav-link ' : ''}} " href="{{route('admin.importedProdcuts')}}">
                        <i class="bi bi-circle"></i><span>Imported Products</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.prodcutsLimits'])) ? 'nav-link ' : ''}} " href="{{route('admin.prodcutsLimits')}}">
                        <i class="bi bi-circle"></i><span>Products Limits</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.featuredProducts'])) ? 'nav-link ' : ''}} " href="{{route('admin.featuredProducts')}}">
                        <i class="bi bi-circle"></i><span>Featured Products</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.addProduct'])) ? 'nav-link ' : ''}}" href="{{route('admin.addProduct')}}">
                        <i class="bi bi-circle"></i><span>Add Product</span>
                    </a>
                </li>
                <li>
                    <a class="{{(request()->routeIs(['admin.importProducts'])) ? 'nav-link ' : ''}}" href="{{route('admin.importProducts')}}">
                        <i class="bi bi-circle"></i><span>Import Excel File</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @if(view_permission('orders'))
        <li class="nav-item">
            <a class="nav-link {{ (request()->routeIs(['admin.consultationView','admin.orderDetail','admin.ordersRecieved','admin.doctorsApproval','admin.ordersConfrimed','admin.ordersShiped' ,'admin.dispensaryApproval', 'admin.ordersAudit', 'admin.gpaLeters','admin.ordersRefunded', 'admin.ordersCreated','admin.gpLocations','admin.VetPrescriptions'])) ? '' : 'collapsed'}} " data-bs-target="#charts-nav" data-bs-toggle="collapse">
                <i class="bi bi-bar-chart"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content {{ (request()->routeIs(['admin.consultationView','admin.orderDetail','admin.ordersRecieved','admin.doctorsApproval','admin.ordersConfrimed','admin.ordersShiped' ,'admin.dispensaryApproval' ,'admin.ordersAudit', 'admin.gpaLeters','admin.ordersRefunded', 'admin.ordersCreated', 'admin.gpLocations','admin.VetPrescriptions' ])) ? '' : 'collapse'}}  " data-bs-parent="#sidebar-nav">
                @if(view_permission('orders_recieved'))
                <li>
                    <a class="{{(request()->routeIs(['admin.ordersRecieved'])) ? 'nav-link ' : ''}}" href="{{route('admin.ordersRecieved')}}">
                        <i class="bi bi-circle"></i><span>Received Orders</span>
                    </a>
                </li>
                @endif
                @if(view_permission('orders_created'))
                <li>
                    <a class="{{(request()->routeIs(['admin.ordersCreated'])) ? 'nav-link ' : ''}}" href="{{route('admin.ordersCreated')}}">
                        <i class="bi bi-circle"></i><span>Created Orders</span>
                    </a>
                </li>
                @endif
                @if(view_permission('orders_refunded'))
                <li>
                    <a class="{{(request()->routeIs(['admin.ordersRefunded'])) ? 'nav-link ' : ''}}" href="{{route('admin.ordersRefunded')}}">
                        <i class="bi bi-circle"></i><span>Refunded Orders</span>
                    </a>
                </li>
                @endif
                @if(view_permission('doctors_approval'))
                <li>
                    <a class="{{(request()->routeIs(['admin.doctorsApproval'])) ? 'nav-link ' : ''}}" href="{{route('admin.doctorsApproval')}}">
                        <i class="bi bi-circle"></i>
                        {{-- <span>{{ (isset($user) && $user->role == user_roles('2')) ? 'POM Orders Approved' : 'POM Orders'}}</span> --}}
                        <span>
                            @if(isset($user) && isset($user->role) && $user->role == user_roles('2'))
                            POM Orders Approved
                            @else
                            POM Orders
                            @endif
                        </span>
                    </a>
                </li>
                @endif
                @if(view_permission('dispensary_approval'))
                <li>
                    <a class="{{(request()->routeIs(['admin.dispensaryApproval'])) ? 'nav-link ' : ''}}" href="{{route('admin.dispensaryApproval')}}">
                        <i class="bi bi-circle"></i><span>Dispensary Orders</span>
                    </a>
                </li>
                @endif
                @if(view_permission('orders_shipped'))
                <li>
                    <a class="{{(request()->routeIs(['admin.ordersShiped'])) ? 'nav-link ' : ''}}" href="{{route('admin.ordersShiped')}}">
                        <i class="bi bi-circle"></i><span>Shiped Orders</span>
                    </a>
                </li>
                @endif
                @if(view_permission('gpa_letters'))
                <li>
                    <a class="{{(request()->routeIs(['admin.gpaLeters'])) ? 'nav-link ' : ''}}" href="{{route('admin.gpaLeters')}}">
                        <i class="bi bi-circle"></i><span>GP Letters</span>
                    </a>
                </li>
                @endif
                @if(view_permission('gp_locations'))
                <li>
                    <a class="{{(request()->routeIs(['admin.gpLocations'])) ? 'nav-link ' : ''}}" href="{{route('admin.gpLocations')}}">
                        <i class="bi bi-circle"></i><span>GP Locations</span>
                    </a>
                </li>
                @endif
                @if(view_permission('orders_audit'))
                <li>
                    <a class="{{(request()->routeIs(['admin.ordersAudit'])) ? 'nav-link ' : ''}}" href="{{route('admin.ordersAudit')}}">
                        <i class="bi bi-circle"></i><span>Audit Orders</span>
                    </a>
                </li>
                @endif
                @if(view_permission('vet_prescription'))
                <li>
                    <a class="{{(request()->routeIs(['admin.VetPrescriptions'])) ? 'nav-link ' : ''}}" href="{{route('admin.VetPrescriptions')}}">
                        <i class="bi bi-circle"></i><span>Vet Prescription</span>
                    </a>
                </li>
                @endif
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

        @if(view_permission('prescription_orders'))
        <li class="nav-item">
            <a class="nav-link {{(request()->routeIs('admin.prescriptionOrders')) ? '' : 'collapsed'}}  " href="{{route('admin.prescriptionOrders')}}">
                <i class="bi bi-bar-chart"></i><span>Prescription Orders</span>
            </a>
        </li>
        @endif

        @if(view_permission('online_clinic_orders'))
        <li class="nav-item">
            <a class="nav-link {{(request()->routeIs('admin.onlineClinicOrders')) ? '' : 'collapsed'}} " href="{{route('admin.onlineClinicOrders')}}">
                <i class="bi bi-bar-chart"></i><span>Online Clinic Orders</span>
            </a>
        </li>
        @endif

        @if(view_permission('shop_orders'))
        <li class="nav-item ">
            <a class="nav-link {{(request()->routeIs('admin.shopOrders')) ? '' : 'collapsed'}}" href="{{route('admin.shopOrders')}}">
                <i class="bi bi-bar-chart"></i><span>Shop Orders</span>
            </a>
        </li>
        @endif

        @if(view_permission('gp_letters'))
        <li class="nav-item">
            <a class="nav-link {{(request()->routeIs('admin.gpaLeters')) ? '' : 'collapsed'}}" href="{{route('admin.gpaLeters')}}">
                <i class="bi bi-bar-chart"></i><span>GP Letters</span>
            </a>
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
        <li class="nav-item displaynone">
            <a class="nav-link  {{(request()->routeIs('admin.faq')) ? '' : 'collapsed'}} " href="{{route('admin.faq')}}">
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

        <!-------------------------- SOP tabs work start ------------------------------->
        <li class="nav-item">
            <a class="nav-link {{(request()->routeIs(['admin.sops','admin.addSOP'])) ? '' : 'collapsed'}} " data-bs-target="#siderbar-users" data-bs-toggle="collapse">
                <i class="bi bi-person"></i><span>SOP's</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="siderbar-users" class="nav-content {{(request()->routeIs(['admin.sops','admin.addSOP'])) ? '' : 'collapse'}} " data-bs-parent="#sidebar-nav">
            @if(isset($user->role) && $user->role == user_roles('1'))   
            <li>
                    <a class="{{(request()->routeIs(['admin.addSOP'])) ? 'nav-link ' : ''}} " href="{{route('admin.addSOP')}}">
                        <i class="bi bi-circle"></i><span>Add SOP</span>
                    </a>
                </li>
                @endif
                <li>
                    <a class="{{(request()->routeIs(['admin.sops'])) ? 'nav-link ' : ''}} " href="{{route('admin.sops')}}">
                        <i class="bi bi-circle"></i><span>SOP's</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-------------------------- SOP tabs work end ------------------------------------>
    </ul>
</aside>
<!-- End Sidebar-->
