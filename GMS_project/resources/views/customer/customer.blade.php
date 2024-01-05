@extends('home')
@section('main-content')

    <div class="container mt-5">


        <div class="row">
            <div class="col-md-12">
                <div class="card main-content">
                    <div class="card-header">
                        <h4>Customer Details
                            <a href="{{ route('customer.create') }}" class="btn btn-primary float-end">Thêm khách hàng</a>
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
                                    <td>
                                    <form action="{{ route('customer.destroy', $cu->id) }}" method="POST">
                                        <a href="{{ route('customer.edit', $cu->id) }}" class="btn btn-info" style="width: 60px;">Sửa</a>
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

@endsection