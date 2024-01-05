@extends('home')
@section('main-content')

<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="/css/layout.css">
    <span style="font-family: verdana, geneva, sans-serif;">
</head>

<body>
    <div class="container">
        <div class="main-top">
            <h1>Danh sách đơn hàng</h1>
            <i class="fas fa-user-cog"></i>
        </div>
        <div class="main-skills">

            <form action="{{ route('order.index') }}" class="content" method="GET">
                @csrf
                @error('msg')
                <div class="alert alert-danger text-center">{{$message}}</div>
                @enderror
                <div class="overflow-hidden mb-3 row">
                    <div class="col-3">
                        <select class="form-select form-select-sm col" name="supplier" aria-label=".form-select-sm example">
                            <option value="0">Tất cả nhà cung cấp</option>
                            @if (!empty($suppliers))
                            @foreach ($suppliers as $key)
                            <option value="{{ $key->id }}" {{ request() -> supplier == $key->id ? 'selected':false}}>{{ $key->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col">
                        <input class="form-control col" name="keywords" type="search" placeholder="Tìm lịch hẹn" aria-label="Search">
                    </div>
                    <div class="col">
                        <button class="btn  btn-outline-dark col-md-2" type=""><i class="fas fa-search"></i></button>

                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{route('order.getAdd')}}" class="btn btn-info btn-sm">+ Đơn hàng</a>
                    </div>

                </div>

                <!-- @if (session('msg'))
                                <div class="alert alert-success text-center">{{session('msg')}}</div>
                                @endif -->

                <table class="tb mb-3 rounded-2">
                    <thead class="table_header ">
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <!-- <th scope="col">Ảnh</th> -->
                            <th scope="col" class="text-center">Nhà cung cấp</th>
                            <th scope="col" class="text-center">Ngày</th>
                            <th scope="col" class="text-center">Tổng SL</th>
                            <th scope="col" class="text-center">Tổng tiền</th>

                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    @if (!empty($orderList))
                    <tbody class="table-group-divider table_body">
                        @foreach ($orderList as $key)
                        <tr class="table-row">
                            <th scope="row" class="text-center">{{$key->orders_id}}</th>
                            <!-- <td>Image</td> -->
                            <td class="text-center">{{ $key->supplier_name }}</td>
                            <td class="text-center">{{ $key->created_at }}</td>
                            <td class="text-center">{{ $key->total_quantity }}</td>
                            <td class="text-center">{{ $key->total_price }} VND</td>
                            <td><a href="{{route('order.getEdit',['id'=>$key->orders_id])}}"><i class="fas fa-edit" style="color: #96d35f;"></i></a></td>
                            <td><a onclick="return confirm('Bạn có chắc chắn muốn xoá dữ liệu đơn hàng này không')" href="{{route('order.delete',['id'=>$key->orders_id])}}"><i class="fas fa-user-minus" style="color: #ff2600;"></i></a></td>
                        </tr>
                        @endforeach

                    </tbody>
                    @else

                    <h4 class="text-center">Không có lịch hẹn nào để hiển thị</h4>

                    @endif


                </table>



                @if (!empty($orderList ->links()))

                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <!-- Trang trước -->
                        <li class="page-item {{ $orderList ->previousPageUrl() ? '' : 'disabled' }}">
                            <!-- <a class="page-link" href="{{ $orderList ->previousPageUrl() }}" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a> -->
                        </li>

                        <!-- Các trang -->
                        {{ $orderList ->onEachSide(1)->links('pagination::bootstrap-4') }}

                        <!-- Trang tiếp theo -->
                        <li class="page-item {{ $orderList ->nextPageUrl() ? '' : 'disabled' }}">
                            <!-- <a class="page-link" href="{{ $orderList ->nextPageUrl() }}" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a> -->
                        </li>
                    </ul>
                </nav>

                @endif

            </form>


        </div>
    </div>
</body>


@endsection