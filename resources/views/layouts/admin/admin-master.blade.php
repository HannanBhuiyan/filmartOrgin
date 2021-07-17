@include('layouts.admin.header')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('backend')}}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>
    @include('layouts.admin.navbar')
    @include('layouts.admin.sidebar')
    @yield('content')
@include('layouts.admin.footer')
