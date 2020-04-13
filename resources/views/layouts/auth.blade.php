<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ (isset($page_title)?$page_title:env('APP_NAME')) }}</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    @yield('custom_css')
    <style>
        .form-sign {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }
    </style>
</head>
<body class="text-center">
    <div class="container">
        <div class="notifications">
            @include('layouts.partials.notifications')
        </div>
        @yield('content')
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
    @yield('custom_js_footer')
</body>
</html>
