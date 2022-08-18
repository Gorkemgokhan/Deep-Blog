        <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul style="background: #1A1A1D" class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route("admin.dashboard")}}">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Deep Dark Admin</div>
                </a>
                <hr class="sidebar-divider my-0">
                <li class="nav-item" @if(Request::segment(2)=="panel")active @endif ">
                    <a class="nav-link" href="{{route("admin.dashboard")}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Panel</span></a>
                </li>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Paylaşım Merkezi
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link  @if(Request::segment(2)=="makaleler") in @else collapsed @endif  " href="{{route("admin.makaleler.index")}}" data-toggle="collapse" data-target="#collapseTwo"
                       aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-edit"></i>
                        <span>Makaleler </span>
                    </a>
                    <div id="collapseTwo" class="collapse @if(Request::segment(2)=="makaleler")show @endif " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Makale İşlemleri:</h6>
                            <a class="collapse-item @if(Request::segment(2)=="makaleler")and !Request::segment(3)) active @endif " href="{{route("admin.makaleler.index")}}">Tüm Makaleler</a>
                            <a class="collapse-item" @if(Request::segment(2)=="makaleler" and Request::segment(3)=="oluştur") active @endif href="{{route("admin.makaleler.create")}}">Makale Oluştur</a>
                        </div>
                    </div>
                </li>


                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link " @if(Request::segment(2)=="kategoriler") style="color: white!important;" @endif href="{{route('admin.category.index')}}">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Kategoriler</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if(Request::segment(2)=="sayfalar") in @else collapsed @endif  " href="{{route("admin.page.index")}}" data-toggle="collapsePage" data-target="#collapsePage"
                       aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-pager"></i>
                        <span>Sayfalar</span>
                    </a>
                    <div id="collapseTwo" class="collapse @if(Request::segment(2)=="sayfalar")show @endif " aria-labelledby="headingPage" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Sayfa İşlemleri:</h6>
                            <a class="collapse-item @if(Request::segment(2)=="sayfalar"and !Request::segment(3)) active @endif " href="{{route("admin.page.index")}}">Tüm sayfalar</a>
                            <a class="collapse-item @if(Request::segment(2)=="sayfalar" and Request::segment(3)=="olustur") active @endif " href="{{route("admin.page.create")}}">Sayfa Oluştur</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Addons
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                       aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Pages</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Login Screens:</h6>
                            <a class="collapse-item" href="login.html">Login</a>
                            <a class="collapse-item" href="register.html">Register</a>
                            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                            <div class="collapse-divider"></div>
                            <h6 class="collapse-header">Other Pages:</h6>
                            <a class="collapse-item" href="404.html">404 Page</a>
                            <a class="collapse-item" href="blank.html">Blank Page</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="charts.html">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Charts</span></a>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="tables.html">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Tables</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

                <!-- Sidebar Message -->
                <div class="sidebar-card d-none d-lg-flex">
                    <img class="sidebar-card-illustration mb-2" src="{{asset("back/")}}/img/undraw_profile_2.svg" alt="...">
                    <a class="btn btn-danger btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Kurucu ile İletişim</a>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" style="background:#373b3e" class="d-flex flex-column">

                <!-- Main Content -->
                <div style="background:#2d4373" id="content">

                    <!-- Topbar -->
                    <nav class="  navbar navbar-expand  topbar mb-4 static-top " style="background: #1A1A1D" >

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                     aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                   placeholder="Search for..." aria-label="Search"
                                                   aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <!-- Nav Item - Alerts -->




                            <div class="topbar-divider d-none d-sm-block" ></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Görkem Gökhan</span>

                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                     aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profil
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Ayarlar
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Etkinlik Günlüğü
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Çıkış Yap
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-write-800" style="color:white">@yield("title","Panel")</h1>
                            <a href="{{route("homepage")}}" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-globe fa-sm text-white-50"></i> Sayfayı Görüntüle</a>
                        </div>

