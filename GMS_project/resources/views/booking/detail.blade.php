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
            <h1>Chi tiết lịch hẹn</h1>
            <i class="fas fa-user-cog"></i>
        </div>
        <div class="main-content">
            <form action="" class="row" method="POST">
                @csrf


                <h5 class="col-md-6  text-muted">Lịch hẹn #{{$bookingDetail->booking_id}}</h5>
                <div class="col-md-3">
                </div>
                <div class="col-md-2">
                    @if($bookingDetail->status_id == 1)

                    <h3><span class="badge text-bg-warning">{{$bookingDetail->status_name}}</span></h3>
                    @elseif ($bookingDetail->status_id == 2)

                    <h3><span class="badge text-bg-info">{{$bookingDetail->status_name}}</h3></span>
                    @elseif ($bookingDetail->status_id == 3)

                    <h3><span class="badge text-bg-success">{{$bookingDetail->status_name}}</span></h3>
                    @elseif ($bookingDetail->status_id == 4)

                    <h3><span class="badge text-bg-secondary">{{$bookingDetail->status_name}}</span></h3>
                    @elseif ($bookingDetail->status_id == 5)

                    <h3><span class="badge text-bg-dark">{{$bookingDetail->status_name}}</span></h3>
                    @elseif ($bookingDetail->status_id == 6)

                    <h3><span class="badge text-bg-dark">{{$bookingDetail->status_name}}</span></h3>
                    @endif
                </div>

                <p class="col-md-5"> <i class="fas fa-calendar"></i> Tạo ngày {{$createdDate['day']}} tháng {{$createdDate['month']}} năm {{$createdDate['year']}}</p>

                <div class="col-md-8"></div>

                @if ($bookingDetail->status_id > 0 && $bookingDetail->status_id < 4 ) @if ($bookingDetail->status_id > 0 && $bookingDetail->status_id <= 2 ) <div class="col-md-1">
                        <a onclick="return confirm('Bạn có chắc chắn muốn từ chối không')" href="{{route('booking.Cancel',['id'=>$bookingDetail->booking_id])}}" type="button" class="btn  btn-outline-secondary"><i class="far fa-window-close"></i></a>
        </div>

        @endif
        <div class="col-md-3">
            <a onclick="return confirm('Bạn có chắc chắn muốn cập nhật không')" href="{{route('booking.updateStatus',['id'=>$bookingDetail->booking_id])}}" type="button" class="btn btn-outline-info">{{$buttonDisplay}} <i class="fas fa-chevron-right"></i></a>
        </div>


        @endif

        <div class="col-12 mb-3">
            <div class="card-body row">
                <h5 class="card-title mb-3">Thông tin lịch hẹn</h5>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="inputDate" class="form-label">Ngày hẹn dịch vụ</label>
                        <input type="text" readonly class="form-control" id="inputDate" value=" 
                    {{$bookingTime['hour']}}:{{$bookingTime['minute']}} ngày {{$bookingDate['day']}} tháng {{$bookingDate['month']}} năm {{$bookingDate['year']}}">
                    </div>
                    <div class="mb-3">
                        <label for="inputServiceType" class="form-label">Loại dịch vụ</label>
                        <input type="email" readonly class="form-control" id="inputServiceType" value="{{$bookingDetail->type_name}}">
                    </div>
                    <div class="mb-3">
                        <label for="inputNote">Ghi chú</label>
                        <textarea class="form-control" readonly id="inputNote" style="height: 100px" placeholder="{{$bookingDetail->note}}"></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="inputCar" class="form-label">Xe</label>
                    <div class="card" style="width: 90%;">
                        <div class="car-body row">
                            <div class="col-md-6">
                                <img height="100%" width="100%" src="https://images.pexels.com/photos/305070/pexels-photo-305070.jpeg?auto=compress&cs=tinysrgb&w=600" alt="">
                            </div>
                            <div class="col-md-6">
                                <h3 class="card-title">{{$bookingDetail->model}}</h3>
                                <h6 class="card-subtitle mb-2 text-muted">{{$bookingDetail->production_year}}</h6>
                                <p>{{$bookingDetail->brand}}</p>
                                <div class="row">
                                    <div class="col-md-2"></div>

                                    <a href="{{route('car.getDetail',['id'=>$bookingDetail->car_id])}}" class="btn btn-outline-dark col-md-8 btn-sm ">Chi tiết</a>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="col-12 mb-3">
            <div class="card-body row">
                <h5 class="card-title mb-3">Thông tin khách hàng</h5>
                <div class="col-md-12 mb-3">
                    <label for="inputFirstname" class="form-label">Họ tên khách hàng</label>
                    <input type="text" readonly class="form-control" id="inputName" value="{{$bookingDetail->customer_name}}">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" readonly class="form-control" id="inputEmail" value="{{$bookingDetail->email}}">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="inputPhoneNumber" class="form-label">Số điện thoại</label>
                    <input type="text" readonly class="form-control" id="inputPhoneNumber" value="{{$bookingDetail->phone}}">
                </div>

            </div>
        </div>









        </form>

    </div>



    </div>


    </div>

</body>


@endsection