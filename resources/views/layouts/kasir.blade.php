<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kasir</title>

    <!-- Styles -->
	<link href="{{ mix('/css/app.css') }}" rel="stylesheet"> 
	
	@yield('css')

</head>

<body class="app is-collapsed">
    @include('partials.spinner')

    <div>
        <!-- #Left Sidebar ==================== -->
        @include('partials.kasir-sidebar')

        <!-- #Main ============================ -->
        <div class="page-container">
            <!-- ### $Topbar ### -->
            @include('partials.topbar')

            <!-- ### $App Screen Content ### -->
            <main class='main-content bgc-grey-100'>
                <div id='mainContent'>
                    <div class="container-fluid">

                        {{-- <h4 class="c-grey-900 mT-10 mB-30">@yield('page-header')</h4> --}}

						@yield('content')

                    </div>
                </div>
            </main>

            <!-- ### $App Screen Footer ### -->
            <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
                <span>Copyright © 2017 Designed by
                    <a href="https://colorlib.com" target='_blank' title="Colorlib">Colorlib</a>. All rights reserved.</span>
            </footer>
        </div>
    </div>

    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>

    @yield('js')

</body>

</html>
