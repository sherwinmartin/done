<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ (isset($page_title)?$page_title:env('APP_NAME')) }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    @yield('custom_css')
</head>
<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">
            <img src="/images/done_white.jpg" alt="Done logo" class="img-fluid" style="max-height:50px;">
        </a>

        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>

    <div class="container-fluid mt-5 pt-5">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('incidentTypes.index') }}"
                               class="nav-link{{ (isset($navi_group) && $navi_group == 'incidentTypes')?' active':'' }}">
                                Incident Types
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Sample Heading</span>
                        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Sample Text
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <nav class="">
                    @yield('breadcrumb')
                </nav>

                <div class="notifications">
                    @include('layouts.partials.notifications')
                </div>

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">{{ $page_title }}</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        @yield('page_header_options')
                    </div>
                </div>
                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    @yield('custom_js_footer')
</body>
</html>
