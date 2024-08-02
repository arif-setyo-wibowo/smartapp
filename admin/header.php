<!doctype html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/fonts/materialdesignicons.css" />
    <link rel="stylesheet" href="../assets/vendor/fonts/flag-icons.css" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="../assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/quill/editor.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/quill/katex.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/toastr/toastr.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/sweetalert2/sweetalert2.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css" />
    <link rel="stylesheet" href="../assets/vendor/css/pages/app-logistics-dashboard.css" />

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
    <script src="../assets/vendor/js/template-customizer.js"></script>
    <script src="../assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="" class="app-brand-link">
                        <span class="app-brand-text demo menu-text fw-bold ms-2">SMART PPA</span>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>
                <?php
                    $current_page = basename($_SERVER['PHP_SELF']);
                ?>

                <ul class="menu-inner py-1">
                    <!-- Dashboards -->
                    <li class="menu-item <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">
                        <a href="index.php" class="menu-link">
                            <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                            <div>Dashboards</div>
                        </a>
                    </li>
                    <li class="menu-header fw-medium mt-4">
                        <span class="menu-header-text">Action Data</span>
                    </li>
                    

                    <li class="menu-item <?php echo ($current_page == 'kategori.php') ? 'active' : ''; ?>">
                        <a href="kategori.php" class="menu-link">
                            <i class="menu-icon tf-icons mdi mdi-shape"></i>
                            <div>Data Kategori</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo ($current_page == 'project.php') ? 'active' : ''; ?>">
                        <a href="project.php" class="menu-link">
                            <i class="menu-icon tf-icons mdi mdi-clipboard-outline"></i>
                            <div>Data Project</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo ($current_page == 'penilaian.php') ? 'active' : ''; ?>">
                        <a href="penilaian.php" class="menu-link">
                            <i class="menu-icon tf-icons mdi mdi-calendar-edit"></i>
                            <div>Data Penilaian</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo ($current_page == 'procurement.php') ? 'active' : ''; ?>">
                        <a href="procurement.php" class="menu-link">
                            <i class="menu-icon tf-icons mdi mdi-account-group-outline"></i>
                            <div>Data Tim Procurement</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo ($current_page == 'user-admin.php') ? 'active' : ''; ?>">
                        <a href="user-admin.php" class="menu-link">
                            <i class="menu-icon tf-icons mdi mdi-calendar-account"></i>
                            <div>Data Admin</div>
                        </a>
                    </li>
                    <li class="menu-item <?php echo ($current_page == 'user-fpp.php') ? 'active' : ''; ?>">
                        <a href="user-fpp.php" class="menu-link">
                            <i class="menu-icon tf-icons mdi mdi-account-supervisor"></i>
                            <div>Data FPP</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="logout.php" class="menu-link">
                            <i class="menu-icon tf-icons mdi mdi-logout"></i>
                            <div>Logout</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="mdi mdi-menu mdi-24px"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-account.html">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-medium d-block">Rudi</span>
                                                    <small class="text-muted">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/logout">
                                            <i class="mdi mdi-logout me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <!-- Add your content here -->