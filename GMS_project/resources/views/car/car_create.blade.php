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

    <title>Car Create</title>
</head>
<body>
  
    <div class="container mt-5">


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Thêm xe
                            <a href="{{ route('car.index') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('car.store') }}" method="POST">
                            @csrf 
                            <div class="mb-3">
                                <label>Mẫu xe</label>
                                <input type="text" name="model" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Hãng xe</label>
                                <input type="text" name="brand" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Màu xe</label>
                                <input type="text" name="color" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Tình trạng xe</label>
                                <input type="text" name="status" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Số xe</label>
                                <input type="text" name="plateNum" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="add_Car" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection