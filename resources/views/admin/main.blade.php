<html>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <title></title>
        <meta name="description" content="JF studio muzyczne - panel administratora"/>

        <link rel="stylesheet" href="{{ mix('/css/admin_app.css') }}">
    </head>
    <body class="sb-nav-fixed">

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ route('admin.mainpage') }}">Panel administratora</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->

            </ul>
        </nav>

            <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        @section('sidebar')
                            <div class="sb-sidenav-menu">
                                <div class="nav">
                                    @include('admin.sidebar')
                                </div>
                            </div>
                            <div class="sb-sidenav-footer">
                                &copy; K.Rogaczewski 2021
                            </div>
                        @show
                    </nav>
                </div>
                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid">
                            @include('admin.messages')
                            @yield('content')
                        </div>
                    </main>
                    <footer class="py-4 bg-light mt-auto">
                        <div class="container-fluid">
                            <div class="d-flex align-items-center justify-content-between small">
                                <div class="text-muted"></div>
                                <div>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>

        <script src="{{ mix('/js/admin.js') }}"></script>
    </body>
</html>
