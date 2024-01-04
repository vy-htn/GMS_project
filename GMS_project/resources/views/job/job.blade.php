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

    <title>Student CRUD</title>
</head>
<body>
  
    <div class="container mt-5">


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Job Details
                            <a href="{{ route('job.create') }}" class="btn btn-primary float-end">Thêm job</a>
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
                                    <th>Plate Number</th>
                                    <th>Description</th>
                                    <th>Vehicle Model</th>
                                    <th>Vehicle Type</th>
                                    <th>Status</th>
                                    <th>Pay</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $cu)
								<tr>
									<td>{{++$i}}</td>
									<td>{{$cu->plateNo}}</td>
									<td>{{$cu->description}}</td>
									<td>{{$cu->vehicle_model}}</td>
									<td>{{$cu->vehicle_type}}</td>
									<td> 
                                <select class="form-select" id="employee_department" name="employee_department" aria-label="Default select example">
                                        <option selected>{{$cu->status}}</option>
                                    </select></td>
									<td><select class="form-select" id="employee_department" name="employee_department" aria-label="Default select example">
                                        <option selected>{{$cu->pay}}</option>
                                    </select></td>

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
