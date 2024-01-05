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
            <h1>Chi tiết xe</h1>
            <i class="fas fa-user-cog"></i>
        </div>
        <div class="main-content">

            <form id="employee-form" class="row g-3" class="content" action="" method="POST">
                @csrf
                @error('msg')
                <div class="alert alert-danger text-center">{{$message}}</div>
                @enderror

                <div class="col-md-6">
                    <label for="customerId" class="form-label">Chủ xe</label>
                    <p>{{ $carDetail->customer_name }}</p>
                    @error('customer')
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="brand" class="form-label">Hãng xe</label>
                    <input type="text" class="form-control" id="brand" name="brand" placeholder="Nhập hãng xe..." value="{{ $carDetail->brand}}">
                    @error('employee_firstname')
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="model" class="form-label">Tên xe</label>
                    <input type="text" class="form-control" id="model" name="model" placeholder="Nhập tên xe..." value="{{ $carDetail->model }}">
                    @error('employee_lastname')
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="color" class="form-label">Màu xe</label>
                    <input type="text" class="form-control" id="color" name="color" placeholder="Nhập màu xe..." value="{{ $carDetail->color }}">
                    @error('employee_lastname')
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="production_year" class="form-label">Năm sản xuất</label>
                    <input type="text" class="form-control" id="production_year" name="production_year" placeholder="" value="{{ $carDetail->production_year }}">
                    @error('employee_lastname')
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="status" class="form-label">Trạng thái xe</label>
                    <input type="text" class="form-control" id="status" name="status" placeholder="Nhập trạng thái..." value="{{ $carDetail->status }}">
                    @error('employee_lastname')
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>


               
                <div><br></div>
                <div class="col-12">

                </div>

                <div class="col-1">
                    <button type="submit" name="submit_button" value="save" class="btn btn-info">Lưu</button>
                </div>

                <div class="col-1">
                    <a href="{{route('car.index')}}" value="cancel" class="btn btn-dark">Huỷ</a>
                </div>
            </form>

        </div>
    </div>

</body>
<!-- page content -->

@endsection

@section('js')
@endsection