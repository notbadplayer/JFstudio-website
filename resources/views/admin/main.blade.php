<html>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <title></title>
        <meta name="description" content="JF studio muzyczne - panel administratora"/>

        <link rel="stylesheet" href="{{ asset('css/admin_app.css')}}">
    </head>
    <body class="sb-nav-fixed">

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark pe-3 ps-2">
            <a class="navbar-brand d-none d-lg-inline" href="{{ route('admin.mainpage') }}">Panel administratora</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
                <i class="fas fa-bars"></i>
            </button>


            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @auth

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>


                @endauth


            </ul>
        </nav>
        @auth
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
                        <div class="container-fluid px-2 px-sm-4 px-xl-5 pt-5">
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

            @else
            <div id="layoutAuthentication">
                <div id="layoutAuthentication_content">
                    <main>
                        <div class="container-fluid px-2">
                            @yield('content')
                        </div>
                    </main>
                </div>
            </div>
        @endauth

        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/admin.js')}}"></script>

    </body>
</html>
