@extends('home')
@section('main-content')
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Customer Create</title>
</head>
<body>
  
    <div class="container mt-5">


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Sửa thông tin xe
                            <a href="{{ route('car.index') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('car.update',$cars->id) }}" method="POST">
                            @csrf 
                            @method('PUT')
                            <div class="mb-3">
                                <label>Tên</label>
                                <input type="text" name="model" value="{{$cars->model}}" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Hãng</label>
                                <input type="text" name="brand" value="{{$cars->brand}}" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Màu xe</label>
                                <input type="text" name="color" value="{{$cars->color}}" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Tình trạng xe</label>
                                <input type="text" name="status" value="{{$cars->status}}" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Số xe</label>
                                <input type="text" name="plateNum"value="{{$cars->plateNum}}" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="add_Car" class="btn btn-primary">Lưu</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection