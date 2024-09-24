<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ARJAYA TEAM</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/vendors/css/vendor.bundle.base.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="" />
    @livewireStyles
    
</head>

<body class="sidebar-icon-only">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="index.html"><img style="height:60px; width:120px"
                        src="{{ URL::asset('frontend/assets/images/logonobg.png') }}" alt="logo" /></a>

            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img">
                                 <img src="{{ URL::asset('storage/'. Auth::user()->profile_photo_path  ) }}" alt="image">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">{{ Auth::user()->name }}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            <i class="mdi mdi-settings   me-2 text-success"></i> Setting </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="nav-profile-image">
                                 <img src="{{ URL::asset('storage/'. Auth::user()->profile_photo_path  ) }}" alt="image">
                                <span class="login-status online"></span>
                                <!--change to offline or busy as needed-->
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                                <span class="text-secondary text-small">{{ Auth::user()->departement }}</span>
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/purchasing/dashboard">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <span class="menu-title">Purchasing</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-cart-arrow-down menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> 
                                    <a class="nav-link"href="/purchasing/mr">
                                        MR List
                                        <span class="fw-bold float-end" style="color:#c183ff; padding-left:63px">
                                                {{$waitingListMR}} 
                                        </span> 
                                    </a>
                                </li>
                                <li class="nav-item"> 
                                    <a class="nav-link" href="/purchasing/purchaseorder">
                                            PO List
                                    <span class="fw-bold float-end" style="color:#c183ff; padding-left:63px">
                                            {{$waitingPO}}
                                    </span> 
                                    </a>
                                </li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="/purchasing/pricelist">
                                        Pricelist</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="/purchasing/supplier">
                                        Supplier List</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#general-pages5" aria-expanded="false"
                            aria-controls="general-pages5">
                            <span class="menu-title">Arrival Items</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-truck menu-icon"></i>
                        </a>
                        <div class="collapse" id="general-pages5">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="/arrivalpurchasing">
                                        List Arrival Items</a>
                                </li>
                            </ul>
                        </div>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#general-pages4" aria-expanded="false"
                            aria-controls="general-pages4">
                            <span class="menu-title">Inventory</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-archive menu-icon"></i>
                        </a>
                        <div class="collapse" id="general-pages4">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="/inventory">
                                        Add Items</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="/withdraw">
                                        Take Items</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic4" aria-expanded="false"
                            aria-controls="ui-basic4">
                            <span class="menu-title">Prodev</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-file-document menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic4">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="/purchasingjob">List Job
                                        <span class="fw-bold float-end" style="color:#c183ff; padding-left:50px">
                                            {{$waitingJOB}}
                                        </span>
                                        </a>
                                </li>
                            </ul>
                        </div>
                    </li>   

                </ul>
            </nav>
