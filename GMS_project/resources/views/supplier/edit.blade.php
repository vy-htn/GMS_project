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
            <h1>Chi tiết nhà cung cấp</h1>
            <i class="fas fa-user-cog"></i>
        </div>
        <div class="main-content">

            <form id="employee-form" class="row g-3" class="content" action="" method="POST">
                @csrf
                @error('msg')
                <div class="alert alert-danger text-center">{{$message}}</div>
                @enderror

                <div class="col-md-6">
                    <label for="name" class="form-label">Tên nhà cung cấp</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên nhà cung cấp..." value="{{$supplierDetail -> name}}">
                    @error('employee_firstname')
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                   
                </div>

                <div class="col-md-6">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Nhập email..." value="{{$supplierDetail -> email}}">
                    @error('employee_email')
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại..." value="{{$supplierDetail -> phone}}">
                    @error('employee_phonenumber')
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ..." value="{{$supplierDetail -> address}}">
                    @error('employee_address')
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div><br><br><br></div>
                <div class="col-12">

                </div>

                <div class="col-1">
                    <button type="submit" name="submit_button" value="save" class="btn btn-info">Lưu</button>
                </div>

                <div class="col-1">
                    <a href="{{route('supplier.index')}}" value="cancel" class="btn btn-dark">Huỷ</a>
                </div>
            </form>

        </div>
    </div>

</body>
<!-- page content -->

@endsection

@section('js')
@endsection