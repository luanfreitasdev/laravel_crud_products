<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ url('assets/img/favicon.ico') }}"/>
    <link href="{{ url(mix('assets/css/loader.css')) }}" rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link href="{{ url(mix('assets/css/bootstrap.css')) }}" rel="stylesheet" type="text/css" />
    <link href="{{ url(mix('assets/css/plugins.css')) }}" rel="stylesheet" type="text/css" />
    <link href="{{ url(mix('assets/css/structure.css')) }}" rel="stylesheet" type="text/css" class="structure" />
    <link href="{{ url(mix('assets/css/perfect-scrollbar.css')) }}" rel="stylesheet">
    <link href="{{ url(mix('assets/css/fontawesome.css')) }}" rel="stylesheet">
    <link href="{{ url(mix('assets/css/bootstrap-select.css')) }}" rel="stylesheet">
    <link href="{{ url('assets/css/apps/mailbox.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/custom.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/elements/breadcrumb.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url(mix('assets/css/dashboard/dash_2.css')) }}" rel="stylesheet" type="text/css" class="dashboard-sales" />
    <link href="{{ url('assets/css/components/tabs-accordian/custom-accordions.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

</head>
<body class="sidebar-noneoverflow dashboard-sales">
<!-- BEGIN LOADER -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>

<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">
        <ul class="navbar-item flex-row">
            <li class="nav-item theme-logo">
                <a href="{{ url('/')  }}">
                    <img src="{{ url('assets/img/90x90.jpg') }}" class="navbar-logo" alt="logo">
                </a>
            </li>
        </ul>

        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg></a>

        <ul class="navbar-item flex-row search-ul">
        </ul>
        <ul class="navbar-item flex-row navbar-dropdown">

            <li class="nav-item dropdown notification-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg><span class="badge badge-success"></span>
                </a>
                <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="notificationDropdown">
                    <div class="notification-scroll">

                        <div class="dropdown-item">
                            <div class="media server-log">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg>
                                <div class="media-body">
                                    <div class="data-info">
                                        <h6 class="">Info</h6>
                                        <p class="">-</p>
                                    </div>

                                    <div class="icon-status">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </li>

            <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ url('assets/img/90x90.jpg') }}" alt="admin-profile" class="img-fluid">
                </a>
                <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="userProfileDropdown">
                    @guest
                        <div class="user-profile-section">
                            <div class="media mx-auto">
                            </div>
                        </div>
                    @else
                    <div class="user-profile-section">
                        <div class="media mx-auto">
                            <img src="{{ url('assets/img/90x90.jpg') }}" class="img-fluid mr-2" alt="avatar">
                            <div class="media-body">
                                <h5>{{ Auth::user()->name }}</h5>
                                <p>Info</p>
                            </div>
                        </div>
                    </div>
                    @endguest
                    <div class="dropdown-item">
                        @can('resource', 'users.edit')
                            <a href="{{ route('admin.users.edit', Auth::user()->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span>Meu Perfil</span>
                            </a>
                        @endcan
                    </div>
                    <div class="dropdown-item">
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                            <span>Sair</span>
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

        @include('template.menu')

    </div>

    <div id="content" class="main-content">
        <div class="layout-px-spacing" style="margin-top: 20px">

            @if(isset($breadcumbItens))
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        @foreach($breadcumbItens as $iten)
                            @php
                                $breadcumb  = '<li ';
                                $breadcumb .= isset($iten['active']) ? 'class="breadcrumb-item active"><a ' : 'class="breadcrumb-item">';
                                $breadcumb .= isset($iten['link']) ? 'class="breadcrumb-item" href = "'.$iten['link'].'">' :  '';
                                $breadcumb .= isset($iten['icon']) ? '<i class="material-icons" style="margin-right: 8px;margin-top: -5px;">'.$iten['icon'].'</i>': '<i></i>';
                                $breadcumb .= $iten['label'].'</a></li>';

                                echo $breadcumb;
                            @endphp
                        @endforeach
                    </ol>
                </nav>
            @endif

            <div class="row layout-top-spacing">
                @include('template.alert')

                @yield('content')

            </div>

        </div>

    </div>
    <div class="footer-wrapper">
        <div class="footer-section f-section-1">
            <p class="">
                Luan Freitas
            </p>
        </div>
        <div class="footer-section f-section-2">
            <p class="">Versão: {{ config('app.version') }} - Luan Freitas © 2019/{{ date('Y') }}</p>
        </div>
    </div>
</div>

<script src="{{ url(mix('assets/js/jquery.js')) }}"></script>
<script src="{{ url(mix('assets/js/loader.js')) }}"></script>
<script src="{{ url(mix('assets/js/bootstrap.js')) }}"></script>
<script src="{{ url(mix('assets/js/perfect-scrollbar.js')) }}"></script>
<script src="{{ url(mix('assets/js/app.js')) }}"></script>
<script src="{{ url(mix('assets/js/bootstrap-select.js')) }}"></script>

<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{ url(mix('assets/js/custom.js')) }}"></script>
<script src="{{ url(mix('assets/js/dashboard/dash_2.js')) }}"></script>
@stack('scripts')
</body>
</html>
