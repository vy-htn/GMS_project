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
                        <h4>Thêm khách hàng
                            <a href="{{ route('customer.index') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('customer.store') }}" method="POST">
                            @csrf 
                            <div class="mb-3">
                                <label>Tên</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Số xe</label>
                                <input type="text" name="plateNo" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="add_Customer" class="btn btn-primary">Thêm</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection