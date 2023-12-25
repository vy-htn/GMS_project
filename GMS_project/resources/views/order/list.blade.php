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
                            <h1>Danh sách đơn hàng</h1>
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <div class="main-skills" style="height: 100%">

                        <div action="" class="" style="background: white; width: 100%; padding: 20px; " method="POST">
                                @if (session('msg'))
                                <div class="alert alert-success text-center">{{session('msg')}}</div>
                                @endif

                                <div class="overflow-hidden row">
                                    
            
                                        <div class="col-3">

                                            <form action=" {{ route('order.index') }} " method="GET" class="row">
                                                <select class="form-select form-select-sm col" name="supplier" aria-label=".form-select-sm example">
                                                <option value="0">Tất cả nhà cung cấp</option>
                                                @if (!empty($suppliers))
                                                    @foreach ($suppliers as $key)
                                                    <option value="{{ $key->id }}" {{ request() -> supplier == $key->id ? 'selected':false}} >{{ $key->name }}</option>
                                                    @endforeach
                                                @endif 
                                                </select>
                                                <div class="col-md-1"></div>
                                                <button type="submit" class="btn btn-outline-dark col-2"><i class="fas fa-filter"></i></button>
                                            </form>


                                        </div>
                                        <div class="col-md-1"></div>

                                        <div class="col mb-3">
                                            <form action=" {{ route('employee.index') }} " method="GET" class="row">
                                                <input class="form-control col" name="keywords" type="search" placeholder="Tìm đơn hàng" aria-label="Search">
                                                <button class="btn  btn-outline-dark col-md-2" type=""><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>

                                        <div class="col-md-1"></div>


                                        <div class="col-md-3 mb-3">
                                            <a href="{{route('order.getAdd')}}" class="btn btn-info btn-sm">+ Đơn hàng</a>
                                        </div>
                                    
                                </div>

                                <!-- @if (session('msg'))
                                <div class="alert alert-success text-center">{{session('msg')}}</div>
                                @endif -->

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <!-- <th scope="col">Ảnh</th> -->
                                            <th scope="col">Nhà cung cấp</th>
                                            <th scope="col">Ngày</th>
                                            <th scope="col">Tổng số lượng</th>
                                            <th scope="col">Tổng tiền</th>
                                            
                                            <th scope="col">Sửa</th>
                                            <th scope="col">Xoá</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @if (!empty($orderList))
                                        @foreach ($orderList as $key)
                                        <tr>
                                            <th scope="row">{{$key->orders_id}}</th>
                                            <!-- <td>Image</td> -->
                                            <td>{{ $key->supplier_name }}</td>
                                            <td>{{$key->created_at}}</td>
                                            <td>{{$key->total_quantity}}</td>
                                            <td>{{$key->total_price}} VND</td>
                                            <td><a href="{{route('order.getEdit',['id'=>$key->orders_id])}}"><i class="fas fa-edit" style="color: #96d35f;"></i></a></td>
                                            <td><a onclick="return confirm('Bạn có chắc chắn muốn xoá dữ liệu đơn hàng này không')" href="{{route('order.delete',['id'=>$key->orders_id])}}"><i class="fas fa-user-minus" style="color: #ff2600;"></i></a></td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>

                                @if (!empty($orderList->links()))

                                    <nav aria-label="Page navigation">
                                        <ul class="pagination">
                                            <!-- Trang trước -->
                                            <li class="page-item {{ $orderList->previousPageUrl() ? '' : 'disabled' }}">
                                                <!-- <a class="page-link" href="{{ $orderList->previousPageUrl() }}" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a> -->
                                            </li>

                                            <!-- Các trang -->
                                            {{ $orderList->onEachSide(1)->links('pagination::bootstrap-4') }}

                                            <!-- Trang tiếp theo -->
                                            <li class="page-item {{ $orderList->nextPageUrl() ? '' : 'disabled' }}">
                                                <!-- <a class="page-link" href="{{ $orderList->nextPageUrl() }}" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a> -->
                                            </li>
                                        </ul>
                                    </nav>

                                    @endif

                            </div>


                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</body>


@endsection
