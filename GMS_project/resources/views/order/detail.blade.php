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
                    
                    

                    <section class="main">
                        <div class="main-top">
                            <h1>Chi tiết đơn hàng</h1>
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <form class="main-content" id="addOrder" method="POST">
                            @csrf
                            <div class="row">
                                
                                <p></p>
                                <h5 class="col-md-12 text-muted mb-3">Đơn hàng #{{$orderDetail->orders_id}}</h5>
                                <i class="far fa-clock col-md-1"></i>
                                <p class="col-md-11">{{ $orderDetail->created_at }}</p>

                                <div class="col-md-8">

                                    <table class="tb col-md-10" id="accessaryList" style="left: 0">
                                        <thead class="table_header">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Thông tin sản phẩm</th>
                                                <th scope="col">Số lượng</th>
                                                <th scope="col">Đơn giá</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table_body">

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

                                <div class="col-md-4">

                                <div class="">

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Thông tin đơn hàng</td>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row">Nhà cung cấp</td>
                                                    <td>{{ $orderDetail->supplier_name }}</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <br>
                                    </div>


                                    <div class="">

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Chi phí đơn hàng</td>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row">Tổng chi phí đơn hàng</td>
                                                    <td>{{ $orderDetail->total_price }} VND</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">Tổng số lượng</td>
                                                    <td>{{ $orderDetail->total_quantity }}</td>

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