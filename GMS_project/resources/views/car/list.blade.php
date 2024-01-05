@extends('home')
@section('main-content')


    <div class="container">
        <div class="main-top">
            <h1>Danh sách xe</h1>
            <i class="fas fa-user-cog"></i>
        </div>

        <div class="main-skills">

                <form action=" {{ route('car.index') }} " class="content" method="GET">
                    @csrf
                    @error('msg')
                    <div class="alert alert-danger text-center">{{$message}}</div>
                    @enderror
                    <div class="overflow-hidden mb-3 row">
                        <div class="col-2">
                        <!-- <select class="form-select form-select-sm col" name="department" aria-label=".form-select-sm example">
                            <option value="0"></option>
                            @if (!empty($departmentList))
                            @foreach ($departmentList as $key)
                            <option value="{{ $key->id }}" {{ request() -> department == $key->id ? 'selected':false}}>{{ $key->name }}</option>
                            @endforeach
                            @endif
                        </select> -->
                        </div>
                        <div class="col-5">
                            <input class="form-control col" name="keywords" type="search" placeholder="Tìm xe" aria-label="Search">
                        </div>
                        
                        <div class="col row">
                            <button class="btn  btn-outline-dark col-md-3" type=""><i class="fas fa-search"></i></button>
                        </div>

                        <div class="col">
                    <a href="{{route('car.getAdd')}}" class="btn btn-info btn-sm">+ Thêm xe</a>
                </div>

                    </div>

                    <!-- @if (session('msg'))
                                <div class="alert alert-success text-center">{{session('msg')}}</div>
                                @endif -->

                    <table class="tb mb-3 rounded-2">
                        <thead class="table_header ">
                            <tr>
                            <th scope="col" class="text-center">Mã biển xe</th>
                            <th scope="col">Tên xe</th>
                            <th scope="col" class="text-center">Hãng</th>
                            <th scope="col" class="text-center">Màu xe</th>
                            <th scope="col" class="text-center">Năm sản xuất</th>
                            <th scope="col" class="text-center">Chủ xe</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        @if (!empty($carList))
                        <tbody class="table-group-divider table_body">

                            @foreach ($carList as $key)
                            <tr>
                            <th scope="row" class="text-center">{{$key->plateCode}}</th>
                            <td>{{$key->model}}</td>
                            <td class="text-center">{{$key->brand}}</td>
                            <td class="text-center">{{$key->color}}</td>
                            <td class="text-center">{{$key->production_year}}</td>
                            <td class="text-center">{{$key->customer_name}}</td>
                            <td><a href="{{route('car.getDetail',['id'=>$key->id])}}"><i class="fas fa-edit" style="color: #96d35f;"></i></a></td>
                            <td><a onclick="return confirm('Bạn có chắc chắn muốn xoá dữ liệu xe này không')" href="{{route('car.Delete',['id'=>$key->id])}}" class="text-center"><i class="fas fa-user-minus" style="color: #ff2600;"></i></a></td>
                            </tr>
                            @endforeach

                        </tbody>
                        @else

                        <h4 class="text-center">Không có lịch hẹn nào để hiển thị</h4>

                        @endif


                    </table>



                    @if (!empty($carList ->links()))

                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                         
                            <li class="page-item {{ $carList ->previousPageUrl() ? '' : 'disabled' }}">
                               
                            </li>

                            <!-- Các trang -->
                            {{ $carList  ->onEachSide(1)->links('pagination::bootstrap-4') }}

                            <!-- Trang tiếp theo -->
                            <li class="page-item {{ $carList  ->nextPageUrl() ? '' : 'disabled' }}">
                               
                            </li>
                        </ul>
                    </nav>

                    @endif

                </form>


            </div>
    </div>

@endsection