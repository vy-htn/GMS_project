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
                            <h1>Thêm nhân viên</h1>
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <div class="main-skills" >

                            <form id="employee-form" class="row g-3" style="background: white; width: 100%; padding: 20px; " action="" method="POST">
                                @csrf
                                @error('msg')
                                <div class="alert alert-danger text-center">{{$message}}</div>
                                @enderror
                                <div class="col-md-12">
                                    <label for="inputImage" class="form-label">Ảnh</label>
                                    <input type="file" class="form-control" id="inputImage">
                                </div>

                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">Họ</label>
                                    <input type="text" class="form-control" id="inputFirstName" name="employee_firstname" placeholder="Nhập họ..." value="{{old('employee_firstname')}}">
                                    @error('employee_firstname')
                                    <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="inputLastName" class="form-label">Tên và tên đệm</label>
                                    <input type="text" class="form-control" id="inputLastName" name="employee_lastname" placeholder="Nhập tên và tên đệm..." value="{{old('employee_lastname')}}">
                                    @error('employee_lastname')
                                    <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="employee_gender" class="form-label">Giới tính</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="employee_gender" id="inlineRadio1" value="Nam">
                                        <label class="form-check-label" for="inlineRadio1">Nam</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="employee_gender" id="inlineRadio2" value="Nữ">
                                        <label class="form-check-label" for="inlineRadio2">Nữ</label>
                                    </div>
                                    @error('employee_gender')
                                    <span style="color: red;">{{$message}}</span>
                                    @enderror

                                </div>

                                <div class="col-md-3">
                                    <label for="inputBirthdate" class="form-label">Ngày sinh</label>
                                    <input type="date" class="form-control" id="inputBirthdate" name="employee_birthdate" placeholder="Nhập email...">
                                    @error('employee_birthdate')
                                    <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="inputEmail4" class="form-label">Bộ phận làm việc</label>
                                    <select class="form-select" id="employee_department" name="employee_department" aria-label="Default select example">
                                        <option selected>Chọn bộ phận làm việc...</option>
                                        @foreach ($departmentList as $key)
                                        <option value="{{$key->id}}" {{ old('employee_department') == $key->id ? 'selected' : '' }}>{{$key->name}}</option>
                                        @endforeach


                                    </select>
                                    @error('employee_department')
                                    <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="inputEmail" class="form-label">Vị trí làm việc</label>
                                    <select class="form-select" id="position" name="employee_position" aria-label="Default select example">
                                        <option selected value="{{old('employee_position')}}">{{old('employee_position')}}</option>
                                    </select>
                                    @error('employee_position')
                                    <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="inputEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" name="employee_email" placeholder="Nhập email..." value="{{old('employee_email')}}">
                                    @error('employee_email')
                                    <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPhonenumber" class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control" id="inputPhonenumber" name="employee_phonenumber" placeholder="Nhập số điện thoại..." value="{{old('employee_phonenumber')}}">
                                    @error('employee_phonenumber')
                                    <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control" id="inputAddress" name="employee_address" placeholder="Nhập địa chỉ..." value="{{old('employee_address')}}">
                                    @error('employee_address')
                                    <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-12">

                                </div>

                                <div class="col-1">
                                    <button type="submit" name="submit_button" value="save" class="btn btn-info">Lưu</button>
                                </div>
                                <div class="col-10">
                                    <button type="submit" name="submit_button" value="saveandnew" class="btn btn-success">Lưu và thêm mới</button>
                                </div>
                                <div class="col-1">
                                    <a href="{{route('employee.index')}}" value="cancel" class="btn btn-dark">Huỷ</a>
                                </div>
                            </form>

                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</body>

</body>
<!-- page content -->

@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#employee_department').on('change', function() {
            var departmentId = $(this).val();
            console.log(departmentId);
            $.ajax({
                url: '/employee/get-positions/' + departmentId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#position').empty();
                    $.each(data, function(key, value) {
                        console.log(value.id);
                        $('#position').append('<option value="' + value.id + '">' + value.position_name + '</option>');
                    });
                }
            });
        });
    });
</script>
@endsection