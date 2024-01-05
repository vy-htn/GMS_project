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
            <h1>Thêm xe</h1>
            <i class="fas fa-user-cog"></i>
        </div>
        <div class="main-content">

            <form id="employee-form" class="row g-3" class="content" action="" method="POST">
                @csrf
                @error('msg')
                <div class="alert alert-danger text-center">{{$message}}</div>
                @enderror

                <div class="col-md-6">
                    <label for="supplier" class="form-label">Nhà cung cấp</label>
                    <select class="form-select" id="supplier" name="supplier" aria-label="Default select example">
                        <option selected>Chọn nhà cung cấp...</option>
                        @foreach ($supplier as $key)
                        <option value="{{$key->id}}" {{ old('name') == $key->id ? 'selected' : '' }}>{{$key->name}}</option>
                        @endforeach


                    </select>
                    @error('customer')
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="type" class="form-label">Loại phụ tùng</label>
                    <select class="form-select" id="type" name="type" aria-label="Default select example">
                        <option selected>Chọn loại phụ tùng...</option>
                        @foreach ($type as $key)
                        <option value="{{$key->id}}" {{ old('name') == $key->id ? 'selected' : '' }}>{{$key->name}}</option>
                        @endforeach


                    </select>
                    @error('customer')
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="name" class="form-label">Tên phụ tùng</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên phụ tùng..." value="{{old('employee_firstname')}}">
                    @error('employee_firstname')
                    <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="price" class="form-label">Giá phụ tùng</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Nhập giá phụ tùng..." value="{{old('employee_lastname')}}">
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
                    <a href="{{route('accessary.index')}}" value="cancel" class="btn btn-dark">Huỷ</a>
                </div>
            </form>

        </div>
    </div>

</body>
<!-- page content -->

@endsection

@section('js')
@endsection