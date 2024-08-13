<!doctype html>

<html
    lang="en" class="light-style layout-navbar-fixed layout-wide" dir="ltr"
    data-theme="theme-default" data-assets-path="assets/"
    data-template="front-pages">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Landing Page - SMART PPA</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets
    /img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="assets
    /vendor/fonts/materialdesignicons.css" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="assets
    /vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets
    /vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets
    /vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets
    /css/demo.css" />
    <link rel="stylesheet" href="assets
    /vendor/css/pages/front-page.css" />
    <!-- Vendors CSS -->

    <link rel="stylesheet" href="assets
    /vendor/libs/nouislider/nouislider.css" />
    <link rel="stylesheet" href="assets
    /vendor/libs/swiper/swiper.css" />

    <!-- Page CSS -->

    <link rel="stylesheet" href="assets
    /vendor/css/pages/front-page-landing.css" />

    <!-- Helpers -->
    <script src="assets
    /vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets
    /vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets
    /js/front-config.js"></script>
</head>

<body>
<script src="assets
/vendor/js/dropdown-hover.js"></script>
<script src="assets
/vendor/js/mega-dropdown.js"></script>

<!-- Navbar: Start -->
<nav class="layout-navbar container shadow-none py-0">
    <div class="navbar navbar-expand-lg landing-navbar border-top-0 px-3 px-md-4">
        <!-- Menu logo wrapper: Start -->
        <div class="navbar-brand app-brand demo d-flex py-0 py-lg-2 me-4">
            <!-- Mobile menu toggle: Start-->
            <button
                class="navbar-toggler border-0 px-0 me-2"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="tf-icons mdi mdi-menu mdi-24px align-middle"></i>
            </button>
                <span class="app-brand-text demo menu-text fw-bold ms-2 ps-1">SMART PPA</span>
            </a>
        </div>
        <!-- Menu logo wrapper: End -->
        <!-- Menu wrapper: Start -->
        <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
            <button
                class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="tf-icons mdi mdi-close"></i>
            </button>
        </div>
        <div class="landing-menu-overlay d-lg-none"></div>
        <!-- Menu wrapper: End -->
        <!-- Toolbar: Start -->
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Style Switcher -->
            <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class="mdi mdi-24px"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                            <span class="align-middle"><i class="mdi mdi-weather-sunny me-2"></i>Light</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                            <span class="align-middle"><i class="mdi mdi-weather-night me-2"></i>Dark</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                            <span class="align-middle"><i class="mdi mdi-monitor me-2"></i>System</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- / Style Switcher-->

            <!-- navbar button: Start -->
            <li>
                <a
                    href="{{ route('login.front')}}"
                    class="btn btn-primary px-2 px-sm-4 px-lg-2 px-xl-4"
                    target="_blank"
                ><span class="tf-icons mdi mdi-account me-md-1"></span
                    ><span class="d-none d-md-block">LOGO 1</span></a
                >
            </li>
            <!-- navbar button: End -->
        </ul>
        <!-- Toolbar: End -->
    </div>
</nav>
<!-- Navbar: End -->

<!-- Sections:Start -->

<div data-bs-spy="scroll" class="scrollspy-example">
    <!-- Hero: Start -->
    <section id="landingHero" class="section-py landing-hero position-relative">
        <img
            src="assets
            /img/front-pages/backgrounds/hero-bg-light.png"
            alt="hero background"
            class="position-absolute top-0 start-0 w-100 h-100 z-n1"
            data-speed="1"
            data-app-light-img="front-pages/backgrounds/hero-bg-light.png"
            data-app-dark-img="front-pages/backgrounds/hero-bg-dark.png" />
        <div class="container">
            <div class="hero-text-box text-center">
                <div class="row">
                    <div class="col col-md-6"><a href="login_admin.php" class="btn btn-primary w-100 mt-3">Login Admin</a></div>
                    <div class="col col-md-6"><a href="login_fpp.php" class="btn btn-primary w-100 mt-3">Login FPP</a></div>
                    <div class="col col-md-12"><a href="login_staff.php" class="btn btn-primary w-50 mt-3">Login USER</a></div>
                    
                </div>
                
                
            </div>
            <div class="position-relative hero-animation-img">
                    <div class="hero-dashboard-img text-center">
                        <img
                            src="assets
                            /custom_img/main.png"
                            alt="hero dashboard"
                            class="animation-img"
                            data-speed="2" />
                    </div>
                    <div class="position-absolute hero-elements-img">
                        <img
                            src="assets
                            /custom_img/addon.png"
                            alt="hero elements"
                            class="animation-img"
                            data-speed="4" />
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!-- Hero: End -->

    <!-- Useful features: Start -->
    <section id="landingFeatures" class="section-py landing-features">
        <div class="container">
            <h6 class="text-center fw-semibold d-flex justify-content-center align-items-center mb-4">
                <img
                    src="assets
                    /img/front-pages/icons/section-tilte-icon.png"
                    alt="section title icon"
                    class="me-2" />
                <span class="text-uppercase">LOGO 2</span>
            </h6>
            <!-- <h3 class="text-center mb-2"><span class="fw-bold">Semua yang anda butuhkan</span> untuk membangun karir yang profesional</h3> -->
            <!-- <div class="features-icon-wrapper row gx-0 gy-4 g-sm-5 mt-3">
                <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                    <div class="features-icon mb-3">
                        <img src="assets
                        /img/front-pages/icons/laptop-charging.png" alt="laptop charging" />
                    </div>
                    <h5 class="mb-2">Materi Berkualitas</h5>
                    <p class="features-icon-description">
                        Dapatkan materi-materi yang ditulis para ahli di bidangnya.
                    </p>
                </div>
                <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                    <div class="features-icon mb-3">
                        <img src="assets
                        /img/front-pages/icons/transition-up.png" alt="transition up" />
                    </div>
                    <h5 class="mb-2">Update Berkala</h5>
                    <p class="features-icon-description">
                        Materi-materi diperbarui secara berkala.
                    </p>
                </div>
                <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                    <div class="features-icon mb-3">
                        <img src="assets
                        /img/front-pages/icons/edit.png" alt="edit" />
                    </div>
                    <h5 class="mb-2">Stater-Kit</h5>
                    <p class="features-icon-description">
                        Cukup bayar 1 kali, dapatkan semua materi.
                    </p>
                </div>
            </div> -->
        </div>
    </section>
    <!-- Useful features: End -->


</div>

<!-- / Sections:End -->

<!-- Footer: Start -->
<footer class="landing-footer">
    <div class="footer-bottom py-3">
        <div
            class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
            <div class="mb-2 mb-md-0">
            <span class="footer-text"
            >©
              <script>
                document.write(new Date().getFullYear());
              </script>
              , Made with <i class="tf-icons mdi mdi-heart text-danger"></i>
            </span>
            </div>
            <div>
                <a href="https://github.com/pixinvent" class="footer-link me-2" target="_blank"
                ><i class="mdi mdi-github"></i
                    ></a>
                <a href="https://www.facebook.com/pixinvents/" class="footer-link me-2" target="_blank"
                ><i class="mdi mdi-facebook"></i
                    ></a>
                <a href="https://twitter.com/pixinvents" class="footer-link me-2" target="_blank"
                ><i class="mdi mdi-twitter"></i
                    ></a>
                <a href="https://www.instagram.com/pixinvents/" class="footer-link" target="_blank"
                ><i class="mdi mdi-instagram"></i
                    ></a>
            </div>
        </div>
    </div>
</footer>
<!-- Footer: End -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="assets/vendor/libs/popper/popper.js"></script>
<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/node-waves/node-waves.js"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="assets/vendor/libs/nouislider/nouislider.js"></script>
<script src="assets/vendor/libs/swiper/swiper.js"></script>

<!-- Main JS -->
<script src="assets/js/front-main.js"></script>

<!-- Page JS -->
<script src="assets/js/front-page-landing.js"></script>
</body>
</html>
