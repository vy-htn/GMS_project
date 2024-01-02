@extends('layouts.app')
@section('content')
<head>
      <meta charset="UTF-8" />
      <title>Dashboard</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
      <link rel="stylesheet" href="/css/dashboard.css">
      <span style="font-family: verdana, geneva, sans-serif;">
    </head>
    <body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12-lg">
            
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="dashboard-container">
                <nav>
                <ul>
                    <li><a href="#" class="logo">
                    <img src="/logo.png" alt="">
                    <span class="nav-item">DashBoard</span>
                    </a></li>
                    <li><a href="">
                    <i class="fas fa-tasks"></i>
                    <span class="nav-item">Job card</span>
                    </a></li>
                    <li><a href="#">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Hóa đơn</span>
                    </a></li>
                    <li><a href="">
                    <i class="fas fa-user"></i>
                    <span class="nav-item">Khách hàng</span>
                    </a></li>
                    <li><a href="">
                    <i class="fas fa-calendar-alt"></i>
                    <span class="nav-item">Lịch hẹn</span>
                    </a></li>
                    <li><a href="">
                    <i class="fas fa-chart-bar"></i>
                    <span class="nav-item">Thống kê</span>
                    </a></li>
                    <li><a href="">
                    <i class="fas fa-cog"></i>
                    <span class="nav-item">Phụ tùng</span>
                    </a></li>
                    <li><a href="">
                    <i class="fas fa-car-alt"></i>
                    <span class="nav-item">Xe</span>
                    </a></li>
                    <li><a href="#">
                    <i class="fas fa-user-tie	"></i>
                    <span class="nav-item">Nhà cung cấp</span>
                    </a></li>
                    <li><a href=" {{route('employee.index')}}">
                    <i class="fas fa-id-badge"></i>
                    <span class="nav-item">Nhân viên</span>
                    </a></li>
                    <li><a href="" class="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Log out</span>
                    </a></li>
                </ul>
                </nav>
            
                <section class="main">
                <div class="main-top">
                    <h1>Shortcuts</h1>
                    <i class="fas fa-user-cog"></i>
                </div>
                <div class="main-skills">
                    <div class="card">
                    <i class="fas fa-clipboard-check"></i>
                    <h3 id = "job-complete-txt">20</h3>
                    <p>Complete Job</p>
                    <button>See details ></button>
                    </div>
                    <div class="card">
                    <i class="fas fa-car-side"></i>
                    <h3 id="total-vehicles-txt">30</h3>
                    <p>Total Vehicles</p>
                    <button>See details ></button>
                    </div>
                    <div class="card">
                    <i class="fas fa-calendar"></i>
                    <h3>2</h3>
                    <p>Today Booking</p>
                    <button>See details ></button>
                    </div>
                    <div class="card">
                    <i class="fas fa-dollar-sign"></i>
                    <h3>245</h3>
                    <p>Total Sale</p>
                    <button>See details ></button>
                    </div>
                </div>
                </section>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
