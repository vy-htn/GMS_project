@extends('layouts.app')
@section('content')

<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="/css/layout.css">
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
                            <li><a href=" {{ route('booking.index') }} ">
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
                                <li><a href=" {{route('order.index')}}">
                                    <i class="fas fa-id-badge"></i>
                                    <span class="nav-item">Đơn hàng</span>
                                </a></li>
                            <li><a href="" class="logout">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span class="nav-item">Log out</span>
                                </a></li>
                        </ul>
                    </nav>

                    <section class="main">
                        <div class="main-top">
                            <h1>Chi tiết đơn hàng</h1>
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <form class="main-skills" id="addOrder" style="background: white;" style="height: 100%" method="POST">
                            @csrf
                            <div class="row" style="background-color: white; padding:10px">
                                
                                <p></p>
                                <h5 class="col-md-12 text-muted mb-3">Đơn hàng #{{$orderDetail->orders_id}}</h5>
                                <i class="far fa-clock col-md-1"></i>
                                <p class="col-md-11">{{ $orderDetail->created_at }}</p>

                                <div class="col-md-8">

                                    <table class="table col-md-10" id="accessaryList" style="left: 0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Thông tin sản phẩm</th>
                                                <th scope="col">Số lượng</th>
                                                <th scope="col">Đơn giá</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($orderDetailList as $key)
                                        <tr>
                                        <td scope="col">{{ $key->id }}</td>
                                                <td scope="col">{{ $key->name }}</td>
                                                <td scope="col">{{ $key->quantity }}</td>
                                                <td scope="col">{{ $key->price}}</td>
                                        </tr>
                                               
                                        @endforeach

                                        </tbody>
                                    </table>

                                </div>

                                <div class="col-md-4" style="right: 0">

                                    <div class="border border-2">

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Chi phí đơn hàng</td>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row">Tổng giá</td>
                                                    <td>{{ $orderDetail->total_price }} VND</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">Phí vận chuyển</td>
                                                    <td>$10</td>

                                                </tr>
                                                <tr>
                                                    <td scope="row">Thuế</td>
                                                    <td>$10</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">Tổng</td>
                                                    <td>{{ $orderDetail->total_price }} VND</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <br>
                                    </div>


                                </div>
                            </div>

                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</body>



@endsection

@section('js')


@endsection