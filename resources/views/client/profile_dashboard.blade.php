<!DOCTYPE html>
<html>

<!-- Mirrored from thememakker.com/templates/swift/university/events.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Nov 2020 09:05:57 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Mentor - Profile</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="{{ asset('') }}">
    @include('client.profile_partials.style')
</head>

<body class="theme-blush">
    <!-- Page Loader -->
    {{-- <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-blush">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>

        </div>
    </div> --}}
    <!-- #END# Page Loader -->

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    {{-- header --}}

    @include('client.profile_partials.header')
    {{-- header end --}}

    <!--Side menu and right menu -->
    <section>
        <!-- Left Sidebar -->
        @include('client.profile_partials.sidebar')
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#skins">Skins</a></li>

            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red">
                            <div class="red"></div><span>Red</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div><span>Purple</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div><span>Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div><span>Cyan</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div><span>Green</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div><span>Deep Orange</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div><span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div><span>Black</span>
                        </li>
                        <li data-theme="blush" class="active">
                            <div class="blush"></div><span>Blush</span>
                        </li>
                    </ul>
                </div>

            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>
    <!--Side menu and right menu -->

    <!-- main content -->
    <section class="content profile-page">
        <div class="container-fluid">
            @yield('fontend')
        </div>
    </section>
    <!-- main content -->

    <div class="color-bg"></div>
    {{-- script --}}
    @include('client.profile_partials.script')
    @yield('script_font')
</body>



</html>
