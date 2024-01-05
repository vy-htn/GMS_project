

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="/css/customercp.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container row">
                <div class="col-1"></div>
                <div class="col-9" ><h2>Dịch vụ gara</h2></div>
              
                <div class="col-4" href=""></div>
               
            </div>
        </nav>

        <main id="bookingpage" >
            <div class="overlay">
            
            <div class="right_col row" id="add-booking" role="main">
    <div class="col-md-6"></div>
    <form class="col-md-5 row g-3" method="POST" action="">
        @csrf
        @if (session('msg'))
        <div class="alert alert-success text-center">{{session('msg')}}</div>
        @endif
        <div class="card">
            <br>
            <h4 class="card-title">Đặt lịch hẹn</h4>
            <div class="card-body row">
                <div class="nav-tabs col-md-3">
                    <label for="customerId" class="form-label">Mã KH</label>
                    <input type="text" name="customerId" class="form-control" readonly id="customerId" value="{{ $customer->id }}">
                    <br>
                </div>
                
                <div class="nav-tabs col-md-9">
                    <label for="customerName" class="form-label">Tên khách hàng</label>
                    <input type="text" name="customerName" class="form-control" readonly  id="customerName" value="{{ $customer->name }}">
                    <br>
                </div>

                <div class="nav-tabs col-md-12">
                    <label for="inputDate" class="form-label">Chọn ngày hẹn dịch vụ</label>
                    <input type="date" name="booking_date" class="form-control" id="inputDate">
                    @error('booking_date')
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                    <br>
                </div>

                <div class="nav-tabs col-md-12">
                    <br>
                    <label for="inputDate" class="form-label">Chọn thời gian hẹn dịch vụ</label>
                    <br>
                    <div class="row">
                    @foreach ($bookingHours as $key)
                    <div class="select-item col-2 mb-3">
                    <input type="radio" class="btn-check" name="booking_time" value="{{ $key . ':00' }}" id="radio-{{ $loop->index }}" >
                    <label class="btn btn-outline-info select-lable" for="radio-{{ $loop->index }}">{{$key}}</label>
                    </div>
                    @endforeach
                    </div>
                    

                    @error('booking_date')
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                    <br>
                </div>

                <div class="nav-tabs col-md-12">
                    <br>
                    <label for="car" class="form-label">Xe</label>
                    <select class="form-select" name="car" aria-label="Default select example">
                        @foreach ($carList as $key) 
                        <option value="{{$key->id}}" >{{$key->model}}</option>
                        @endforeach
                    </select>
                    @error('service_type')
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                    <br>
                </div>


                <div class="nav-tabs col-md-12">
                    <br>
                    <label for="inputServiceType" class="form-label">Loại dịch vụ</label>
                    <select class="form-select" name="service_type" aria-label="Default select example">
                        @foreach ($serviceTypeList as $key) 
                        <option value="{{$key->id}}" >{{$key->name}}</option>
                        @endforeach
                    </select>
                    @error('service_type')
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                    <br>
                </div>

                <div class="col-md-12">
                    <br>
                    <label for="inputNote">Mô tả về lỗi của xe (Nếu có)</label>
                    <input type="text" class="form-control" name="booking_note" id="inputNote" style="height: 100px"></input>

                </div>

                <div class="d-grid gap-2">
                    <br>
                    <button type="submit" class="btn btn-outline-info">Xác nhận</button>
                </div>

            </div>
        </div>

    </form>

</div>


            </div>
            
        </main>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @yield('js')
    @stack('scripts')
    
</body>
</html>

<!-- page content -->


