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

                    <h3><span class="badge text-bg-dark">{{$key->status_name}}</span></h3>
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
                                <img height="100%" width="100%" src="data:image/jpeg;base64,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" alt="">
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