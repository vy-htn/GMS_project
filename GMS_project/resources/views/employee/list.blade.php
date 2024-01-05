@extends('home')
@section('main-content')


    <div class="container">
        <div class="main-top">
            <h1>Danh sách nhân viên</h1>
            <i class="fas fa-user-cog"></i>
        </div>

        <div class="main-skills">

                <form action=" {{ route('employee.index') }} " class="content" method="GET">
                    @csrf
                    @error('msg')
                    <div class="alert alert-danger text-center">{{$message}}</div>
                    @enderror
                    <div class="overflow-hidden mb-3 row">
                        <div class="col-2">
                        <select class="form-select form-select-sm col" name="department" aria-label=".form-select-sm example">
                            <option value="0">Tất cả bộ phận</option>
                            @if (!empty($departmentList))
                            @foreach ($departmentList as $key)
                            <option value="{{ $key->id }}" {{ request() -> department == $key->id ? 'selected':false}}>{{ $key->name }}</option>
                            @endforeach
                            @endif
                        </select>
                        </div>
                        <div class="col-5">
                            <input class="form-control col" name="keywords" type="search" placeholder="Tìm lịch hẹn" aria-label="Search">
                        </div>
                        
                        <div class="col row">
                            <button class="btn  btn-outline-dark col-md-3" type=""><i class="fas fa-search"></i></button>
                        </div>

                        <div class="col">
                    <a href="{{route('employee.getAdd')}}" class="btn btn-info btn-sm">+ Thêm nhân viên</a>
                </div>

                    </div>

                    <!-- @if (session('msg'))
                                <div class="alert alert-success text-center">{{session('msg')}}</div>
                                @endif -->

                    <table class="tb mb-3 rounded-2">
                        <thead class="table_header ">
                            <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col">Tên</th>
                            <th scope="col" class="text-center">Bộ phận</th>
                            <th scope="col" class="text-center">Vị trí</th>
                            <th scope="col" class="text-center">Số điện thoại</th>
                            <th scope="col" class="text-center">Email</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        @if (!empty($employeesList))
                        <tbody class="table-group-divider table_body">

                            @foreach ($employeesList as $key)
                            <tr>
                            <th scope="row" class="text-center">{{$key->employee_id}}</th>
                            <!-- <td>Image</td> -->
                            <td>{{$key->first_name}} {{$key->last_name}}</td>
                            <td class="text-center">{{$key->department_name}}</td>
                            <td class="text-center">{{$key->position_name}}</td>
                            <td class="text-center">{{$key->phone_number}}</td>
                            <td class="text-center">{{$key->email}}</td>
                            <td><a href="{{route('employee.getEdit',['id'=>$key->employee_id])}}"><i class="fas fa-edit" style="color: #96d35f;"></i></a></td>
                            <td><a onclick="return confirm('Bạn có chắc chắn muốn xoá dữ liệu nhân viên này không')" href="{{route('employee.delete',['id'=>$key->employee_id])}}" class="text-center"><i class="fas fa-user-minus" style="color: #ff2600;"></i></a></td>
                            </tr>
                            @endforeach

                        </tbody>
                        @else

                        <h4 class="text-center">Không có lịch hẹn nào để hiển thị</h4>

                        @endif


                    </table>



                    @if (!empty($employeesList ->links()))

                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <!-- Trang trước -->
                            <li class="page-item {{ $employeesList ->previousPageUrl() ? '' : 'disabled' }}">
                                <!-- <a class="page-link" href="{{ $employeesList  ->previousPageUrl() }}" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a> -->
                            </li>

                            <!-- Các trang -->
                            {{ $employeesList  ->onEachSide(1)->links('pagination::bootstrap-4') }}

                            <!-- Trang tiếp theo -->
                            <li class="page-item {{ $employeesList  ->nextPageUrl() ? '' : 'disabled' }}">
                                <!-- <a class="page-link" href="{{ $employeesList  ->nextPageUrl() }}" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a> -->
                            </li>
                        </ul>
                    </nav>

                    @endif

                </form>


            </div>
    </div>

@endsection