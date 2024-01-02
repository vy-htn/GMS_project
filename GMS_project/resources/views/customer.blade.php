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
                        <h4>Customer Details
                            <a href="{{ route('customer.create') }}" class="btn btn-primary float-end">Add Students</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Plate Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $cu)
								<tr>
									<td>{{++$i}}</td>
									<td>{{$cu->name}}</td>
									<td>{{$cu->email}}</td>
									<td>{{$cu->phone}}</td>
									<td>{{$cu->plateNo}}</td>

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
