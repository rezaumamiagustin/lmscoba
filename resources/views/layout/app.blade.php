<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>LMS SMK Negeri 1 Grujugan</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('temp/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('temp/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('temp/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('temp/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('temp/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('temp/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('temp/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('temp/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('temp/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('temp/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('temp/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('temp/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('temp/css/theme.css') }}" rel="stylesheet" media="all">

    {{-- SUMMERNOTE --}}
    <link href="{{ asset('temp/vendor/summernote/summernote.min.css') }}" rel="stylesheet" media="all">

    {{-- datatables --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.min.css" />

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="#">
                            <h1>
                            <img src="{{ asset('temp/images/icon/logosekolah.png') }}" alt="SKAGU" />
                            LESGO</h1>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        @include('layout.nav')
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <h1>
                        <img src="{{ asset('temp/images/icon/logosekolah.png') }}"alt="SKAGU" />
                        LESGO</h1>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                    @include('layout.nav')
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="account-wrap">
                                    {{-- @foreach ($user as $data) --}}
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            {{-- <img src="{{ asset('temp/images/icon/avatar-01.jpg') }}" alt="John Doe" /> --}}
                                            <p>Hello, Nama</p>
                                            {{-- <p>Hello, {{ Auth::user()->name }}</p> --}}
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                {{-- <div class="image">
                                                    <a href="#">
                                                        <img src="{{ asset('temp/images/icon/avatar-01.jpg') }}" alt="John Doe" />
                                                    </a>
                                                </div> --}}
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">Nama</a>
                                                        {{-- <a href="#">{{ Auth::user()->name }}</a> --}}
                                                    </h5>
                                                    <span class="email">Email</span>
                                                    {{-- <span class="email">{{ Auth::user()->email }}</span> --}}
                                                </div>
                                            </div>
                                            {{-- ini login --}}
                                            <div class="account-dropdown__footer">
                                                {{-- @auth
                                                    <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        this.closest('form').submit();" >
                                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                                    @else
                                                    <a href="/login"><i class="zmdi zmdi-power"></i>Login</a>
                                                    </form>
                                                @endauth --}}
                                            </div>
                                        </div>
                                    </div>
                                    {{-- @endforeach --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>@yield('title')</h2>
                                
                                {{-- <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                    <button class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>add item</button>
                                </div> --}}
                            </div>
                        </div>
                        @yield('content')
                        {{-- <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('temp/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('temp/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('temp/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('temp/vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('temp/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('temp/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('temp/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('temp/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('temp/vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('temp/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('temp/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('temp/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('temp/vendor/select2/select2.min.js') }}">
    </script>

    <!-- Main JS-->
    <script src="{{ asset('temp/js/main.js') }}"></script>

    {{-- datatable --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.min.js">
    </script>

    <script>
        $(document).ready(function () {
            $('#table').DataTable();
        });

    </script>

    {{-- summernote --}}
    <script src="{{ asset('temp/vendor/summernote/summernote.min.js') }}"></script>
    <script type="text/javascript">
        // $(document).ready(function () {
        //     $('#summernote').summernote();
        // })
        $('#summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link', 'picture', 'video']],
            ],
            height:400,
            popatmouse:true
        });
    </script>

</body>

</html>
<!-- end document-->
