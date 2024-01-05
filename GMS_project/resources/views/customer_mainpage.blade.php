<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="/css/customercp.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class=""><h2>Dịch vụ gara</h2></div>
            </div>
        </nav>

        <main id="mainpage" >
            <div class="overlay">
            <div class="main">
                <h1 class="header">Chào mừng đến với Đặt Hẹn Garage <br>Nền tảng Bảo Dưỡng Xe Hiện Đại</h1>
                <p>Bạn luôn muốn đảm bảo rằng chiếc xe của bạn luôn ở trạng thái hoạt động tốt nhất, phải không? Để giúp bạn duy trì xe của mình ở mức độ tối ưu, chúng tôi xin giới thiệu Đặt Hẹn Garage - nền tảng đặt lịch hẹn bảo dưỡng xe hiện đại và thuận tiện nhất.</p>
                <br>
                <div class="row">
                    <div class="col-2"></div>
                    <a href="{{route('customercp.booking.gmail')}}" class="col-6 btn btn-lg btn-outline-light">Đặt hẹn ngay</a>
                </div>
            </div>
            </div>

            
            
        </main>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @yield('js')
    @stack('scripts')
    
</body>
</html>
