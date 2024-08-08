
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <title>Catering</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}"/>
        <link href="{{ asset('assets/css/light/loader.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('loader.js') }}"></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/light/plugins.css') }}" rel="stylesheet" type="text/css" />
        @yield('before-head-end')
    </head>
    <body class="layout-boxed">
        <div id="load_screen"> 
            <div class="loader"> 
                <div class="loader-content">
                    <div class="spinner-grow align-self-center"></div>
                </div>
            </div>
        </div>
        <div class="header-container container-xxl">
            <header class="header navbar navbar-expand-sm expand-header">
                <a href="javascript:void(0);" class="sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                </a>
                <ul class="navbar-item flex-row ms-lg-auto ms-0">
                    <li class="nav-item theme-toggle-item d-none">
                        <a href="javascript:void(0);" class="nav-link theme-toggle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon dark-mode"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun light-mode"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                        </a>
                    </li>
                    <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                        <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar-container">
                                <div class="avatar avatar-sm avatar-indicators avatar-online">
                                    <img alt="avatar" src="{{ Auth::user()->image_url ? Auth::user()->image_url : asset('assets/img/90x90.jpg') }}" class="rounded-circle">
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                            <div class="user-profile-section">
                                <div class="media mx-auto">
                                    <div class="emoji me-2">
                                        &#x1F44B;
                                    </div>
                                    <div class="media-body">
                                        <h5>{{ Auth::user()->name }}</h5>
                                        <p>{{ Auth::user()->role }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-item">
                                <a href="{{ route('profile') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> <span>Profile</span>
                                </a>
                            </div>
                            @if(Auth::user()->role === 'customer')
                                <div class="dropdown-item">
                                    <a href="{{ route('cart') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> <span>Cart</span>
                                    </a>
                                </div>
                            @endif
                            <div class="dropdown-item">
                                <a href="{{ route('sign-out') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Log Out</span>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
        <div class="main-container" id="container">
            <div class="overlay"></div>
            <div class="search-overlay"></div>
            <div class="sidebar-wrapper sidebar-theme">
                <nav id="sidebar">
                    <div class="navbar-nav theme-brand flex-row  text-center">
                        <div class="nav-logo">
                            <div class="nav-item theme-text">
                                <a href="{{ route('dashboard') }}" class="nav-link"> CATERING </a>
                            </div>
                        </div>
                        <div class="nav-item sidebar-toggle">
                            <div class="btn-toggle sidebarCollapse">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                            </div>
                        </div>
                    </div>
                    <div class="profile-info">
                        <div class="user-info">
                            <div class="profile-img">
                                <img src="{{ Auth::user()->image_url ? Auth::user()->image_url : asset('assets/img/90x90.jpg') }}" alt="avatar">
                            </div>
                            <div class="profile-content">
                                <h6 class="">{{ Auth::user()->name }}</h6>
                                <p class="">{{ Auth::user()->role }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="shadow-bottom"></div>
                    <ul class="list-unstyled menu-categories" id="accordionExample">
                        <li class="menu @if ($menuActive == 'dashboard') active @endif">
                            <a href="{{ route('dashboard') }}" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                    <span>Dashboard</span>
                                </div>
                            </a>
                        </li>
                        @if(Auth::user()->role === 'merchant')
                            <li class="menu @if ($menuActive == 'menu') active @endif">
                                <a href="{{ route('menu') }}" aria-expanded="false" class="dropdown-toggle">
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        <span>Menu</span>
                                    </div>
                                </a>
                            </li>
                        @elseif(Auth::user()->role === 'customer')
                            <li class="menu @if ($menuActive == 'catering') active @endif">
                                <a href="{{ route('catering') }}" aria-expanded="false" class="dropdown-toggle">
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        <span>Catering</span>
                                    </div>
                                </a>
                            </li>
                            <li class="menu @if ($menuActive == 'order') active @endif">
                                <a href="{{ route('order') }}" aria-expanded="false" class="dropdown-toggle">
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        <span>Order list</span>
                                    </div>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
            <div id="content" class="main-content">
                <div class="layout-px-spacing">
                    <div class="middle-content container-xxl p-0">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('plugins/src/mousetrap/mousetrap.min.js') }}"></script>
        <script src="{{ asset('plugins/src/waves/waves.min.js') }}"></script>
        <script src="{{ asset('app.js') }}"></script>
        @yield('before-body-end')
    </body>
</html>