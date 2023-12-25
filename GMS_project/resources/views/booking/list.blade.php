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
                    <nav class = "side-menu">
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
                            <li><a href="{{ route('booking.index') }}">
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
                            <h1>Danh sách lịch hẹn</h1>
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <div class="main-skills" style="height: 100%">

                            <form action="{{ route('booking.index') }}" class="" style="background: white; width: 100%; padding: 20px; " method="GET">
                                @csrf
                                @error('msg')
                                <div class="alert alert-danger text-center">{{$message}}</div>
                                @enderror
                                <div class="overflow-hidden mb-3 row">
                                    <div class="col-3">
                                        <select class="form-select form-select" name="status" aria-label=".form-select-sm example">
                                            <option value="0">Tất cả trạng thái</option>
                                            @if (!empty($bookingStatuses))
                                            @foreach ($bookingStatuses as $key)
                                            <option value="{{ $key->id }}" {{ request() -> status == $key->id ? 'selected':false}}>{{ $key->name }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col">
                                    <input class="form-control col" name="keywords" type="search" placeholder="Tìm nhân viên" aria-label="Search">
                                    </div>
                                    <div class="col">
                                    <button class="btn  btn-outline-dark col-md-2" type=""><i class="fas fa-search"></i></button>

                                    </div>

                                </div>

                                <!-- @if (session('msg'))
                                <div class="alert alert-success text-center">{{session('msg')}}</div>
                                @endif -->

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>

                                            <th scope="col">Tên khách hàng</th>
                                            <th scope="col">Xe</th>
                                            <th scope="col">Ngày đặt</th>
                                            <th scope="col">Ngày hẹn</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @if (!empty($bookingList))
                                        @foreach ($bookingList as $key)
                                        <tr>
                                            <td scope="row">{{$key->booking_id}}</td>
                                            <td>{{$key->customer_name}}</td>
                                            <td>{{$key->model}}</td>
                                            <td>{{$key->booking_created}}</td>
                                            <td>{{$key->date}}</td>
                                            <td>{{$key->status_name}}</td>
                                            <td><a href="{{route('booking.getDetail',['id'=>$key->booking_id])}}"><i class="fas fa-info-circle"></i></i></a></td>
                                        </tr>
                                        @endforeach
                                        @endif

                                    </tbody>
                                </table>

                                @if (!empty($bookingList ->links()))

                                    <nav aria-label="Page navigation">
                                        <ul class="pagination">
                                            <!-- Trang trước -->
                                            <li class="page-item {{ $bookingList ->previousPageUrl() ? '' : 'disabled' }}">
                                                <!-- <a class="page-link" href="{{ $bookingList ->previousPageUrl() }}" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a> -->
                                            </li>

                                            <!-- Các trang -->
                                            {{ $bookingList ->onEachSide(1)->links('pagination::bootstrap-4') }}

                                            <!-- Trang tiếp theo -->
                                            <li class="page-item {{ $bookingList ->nextPageUrl() ? '' : 'disabled' }}">
                                                <!-- <a class="page-link" href="{{ $bookingList ->nextPageUrl() }}" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a> -->
                                            </li>
                                        </ul>
                                    </nav>

                                    @endif

                            </form>


                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- page content -->

@endsection