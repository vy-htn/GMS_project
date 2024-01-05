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

    <title>Car</title>
</head>
<body>
  
    <div class="container mt-5">


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Car List
                            <a href="{{ route('car.create') }}" class="btn btn-primary float-end">Thêm xe</a>
                        </h4>
                    </div>
                    <div class="card-body">
					@if (Session::has('thongbao'))
						<div class="alert alert-success">
							{{ Session::get('thongbao') }}
						</div>
					@endif
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Model</th>
                                    <th>Brand</th>
                                    <th>Color</th>
                                    <th>Status</th>
                                    <th>Customer Name</th>                                   
                                    <th>Customer Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cars as $car)
								<tr>
									<td>{{++$i}}</td>
									<td>{{$car->model}}</td>
									<td>{{$car->brand}}</td>
                                    <td>{{$car->color}}</td>
                                    <td>{{$car->status}}</td>
									<td>{{$car->nameCustomer}}</td>
                                    <td>{{$car->phoneCustomer}}</td>
                                    <td>
                                    <form action="{{ route('car.destroy', $car->id) }}" method="POST">
                                        <a href="{{ route('car.edit', $car->id) }}" class="btn btn-info" style="width: 60px;">Sửa</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </form>
                                    </td>
                                 @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
@endsection
