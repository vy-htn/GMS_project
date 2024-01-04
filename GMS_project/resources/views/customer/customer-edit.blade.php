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
                        <h4>Sửa khách hàng
                            <a href="{{ route('customer.index') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('customer.update',$customer->id) }}" method="POST">
                            @csrf 
                            @method('PUT')
                            <div class="mb-3">
                                <label>Tên</label>
                                <input type="text" name="name" value="{{$customer->name}}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" value="{{$customer->email}}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Phone</label>
                                <input type="text" name="phone" value="{{$customer->phone}}"class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Số xe</label>
                                <input type="text" name="plateNo"value="{{$customer->plateNo}}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="add_Customer" class="btn btn-primary">Lưu</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection