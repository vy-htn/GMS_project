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
                <h1>Danh sách lịch hẹn</h1>
                <i class="fas fa-user-cog"></i>
            </div>
            <div class="main-skills">

                <form action="{{ route('booking.index') }}" class="content" method="GET">
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
                            <input class="form-control col" name="keywords" type="search" placeholder="Tìm lịch hẹn" aria-label="Search">
                        </div>
                        <div class="col">
                            <button class="btn  btn-outline-dark col-md-2" type=""><i class="fas fa-search"></i></button>

                        </div>

                    </div>

                    <!-- @if (session('msg'))
                                <div class="alert alert-success text-center">{{session('msg')}}</div>
                                @endif -->

                    <table class="tb mb-3 rounded-2">
                        <thead class="table_header ">
                            <tr>
                                <th scope="col" class="text-center">Mã nhân viên</th>

                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Xe</th>
                                <th scope="col" class="text-center">Ngày đặt</th>
                                <th scope="col" class="text-center">Ngày hẹn</th>
                                <th scope="col" class="text-center">Trạng thái</th>
                                <th scope="col" class="text-center"></th>
                            </tr>
                        </thead>
                        @if (!empty($bookingList))
                        <tbody class="table-group-divider table_body">

                            @foreach ($bookingList as $key)
                            <tr>
                                <td scope="row" class="text-center">{{$key->booking_id}}</td>
                                <td>{{$key->customer_name}}</td>
                                <td>{{$key->model}}</td>
                                <td class="text-center">{{$key->booking_created}}</td>
                                <td class="text-center">{{$key->date}}</td>
                                @if($key->status_id == 1)
                                <td class="text-center"><span class="badge text-bg-warning">{{$key->status_name}}</span>
                                    @elseif ($key->status_id == 2)
                                <td class="text-center"><span class="badge text-bg-info">{{$key->status_name}}</span>
                                    @elseif ($key->status_id == 3)
                                <td class="text-center"><span class="badge text-bg-success">{{$key->status_name}}</span>
                                    @elseif ($key->status_id == 4)
                                <td class="text-center"><span class="badge text-bg-secondary">{{$key->status_name}}</span>
                                    @elseif ($key->status_id == 5)
                                <td class="text-center"><span class="badge text-bg-dark">{{$key->status_name}}</span>
                                    @elseif ($key->status_id == 6)
                                <td class="text-center"><span class="badge text-bg-dark">{{$key->status_name}}</span>
                                    @endif
                                </td>
                                <td class="text-center"><a href="{{route('booking.getDetail',['id'=>$key->booking_id])}}"><i class="fas fa-info-circle text-center"></i></i></a></td>
                            </tr>
                            @endforeach

                        </tbody>
                        @else

                        <h4 class="text-center">Không có lịch hẹn nào để hiển thị</h4>

                        @endif


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
    </div>
</body>
<!-- page content -->

@endsection