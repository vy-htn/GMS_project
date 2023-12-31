@extends('layouts.app')
@section('content')
<head>
      <meta charset="UTF-8" />
      <title>Dashboard</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
      <link rel="stylesheet" href="/css/dashboard.css">
      <link rel="stylesheet" href="/css/layout.css">
      <span style="font-family: verdana, geneva, sans-serif;">
    </head>
    <body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12-lg">

            <div class="dashboard-container">
                <nav class="side-menu">
                <ul>
                    <li><a href="{{ route('dashboard.index') }}" class="logo">
                    <img src="/logo.png" alt="">
                    <span class="nav-item">DashBoard</span>
                    </a></li>
                    <li><a href="{{ route('job.index') }}">
                    <i class="fas fa-tasks"></i>
                    <span class="nav-item">Job </span>
                    </a></li>
                    <li><a href="#">
                    <i class="fas fa-money-bill"></i>
                    <span class="nav-item">Hóa đơn</span>
                    </a></li>
                    <li><a href="{{ route('customer.index') }}">
                    <i class="fas fa-user"></i>
                    <span class="nav-item">Khách hàng</span>
                    </a></li>
                    <li><a href="{{ route('booking.index') }}">
                    <i class="fas fa-calendar-alt"></i>
                    <span class="nav-item">Lịch hẹn</span>
                    </a></li>
                    <li><a href="">
                    <i class="fas fa-chart-bar"></i>
                    <span class="nav-item">Dịch vụ</span>
                    </a></li>
                    <li><a href="{{ route('accessary.index') }}">
                    <i class="fas fa-cog"></i>
                    <span class="nav-item">Phụ tùng</span>
                    </a></li>
                    <li><a href="{{ route('car.index') }}">
                    <i class="fas fa-car-alt"></i>
                    <span class="nav-item">Xe</span>
                    </a></li>
                    <li><a href="{{ route('supplier.index') }}">
                    <i class="fas fa-user-tie"></i>
                    <span class="nav-item">Nhà cung cấp</span>
                    </a></li>
                    @if(auth()->check() && auth()->user()->is_admin)
                    <li><a href=" {{route('employee.index')}}">
                    <i class="fas fa-id-badge"></i>
                    <span class="nav-item">Nhân viên</span>
                    </a></li>
                    @endif
                    <li><a href=" {{route('order.index')}}">
                    <i class="fas fa-truck-loading"></i>
                    <span class="nav-item">Đơn hàng</span>
                    </a></li>
                </ul>
                </nav>
            
                <section class="main">
                @if (session('status'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('status') }}
                </div>
            @endif

                @yield('main-content')
               
                </section>
            </div>
        </div>
    </div>
</div>
</body>


@endsection
