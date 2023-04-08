<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}">

<head>
    @include('cobranza.includes.metas')
    @include('cobranza.includes.styles')
    @stack('header')
    <title>{{ env('APP_NAME') }}</title>
</head>

<body class="theme-indigo">
    @include('cobranza.includes.components.loader')
    @hasSection('auth')
        @yield('auth')
    @else
        <!-- loader section ends -->

        <!-- Sidebar main menu -->
        @include('cobranza.includes.components.sidebar')
        <!-- Sidebar main menu ends -->
        <!-- Begin page -->
        <main class="h-100">
            @include('cobranza.includes.components.header')
            <!-- main page content -->
            <div class="main-container container">
                @yield('content')

            </div>
            <!-- main page content ends -->

        </main>
        <!-- Page ends-->
        <!-- Footer -->
        @include('cobranza.includes.components.footer')
        <!-- Footer ends-->
    @endif
    @stack('modals')
    @include('cobranza.includes.scripts')
    @stack('footer')
</body>

</html>
