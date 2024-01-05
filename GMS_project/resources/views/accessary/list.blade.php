@extends('home')
@section('main-content')


    <div class="container">
        <div class="main-top">
            <h1>Danh sách phụ tùng</h1>
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
                        </div>
                        <div class="col-5">
                            <input class="form-control col" name="keywords" type="search" placeholder="Tìm xe" aria-label="Search">
                        </div>
                        
                        <div class="col row">
                            <button class="btn  btn-outline-dark col-md-3" type=""><i class="fas fa-search"></i></button>
                        </div>

                        <div class="col">
                    <a href="{{route('accessary.getAdd')}}" class="btn btn-info btn-sm">+ Thêm phụ tùng</a>
                </div>

                    </div>

                    <!-- @if (session('msg'))
                                <div class="alert alert-success text-center">{{session('msg')}}</div>
                                @endif -->

                    <table class="tb mb-3 rounded-2">
                        <thead class="table_header ">
                            <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col">Tên phụ tùng</th>
                            <th scope="col" class="text-center">Nhà cung cấp</th>
                            <th scope="col" class="text-center">Loại</th>
                            <th scope="col" class="text-center">Số lượng</th>
                            <th scope="col" class="text-center">Đơn giá</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        @if (!empty($accessariesList))
                        <tbody class="table-group-divider table_body">

                            @foreach ($accessariesList as $key)
                            <tr>
                            <th scope="row" class="text-center">{{$key->accessary_id}}</th>
                            <td>{{$key->accessary_name}}</td>
                            <td class="text-center">{{$key->supplier_name}}</td>
                            <td class="text-center">{{$key->type_name}}</td>
                            <td class="text-center">{{$key->quantity}}</td>
                            <td class="text-center">{{$key->price}}</td>
                            <!-- <td><a href="{{route('accessary.getDetail',['id'=>$key->accessary_id])}}"><i class="fas fa-edit" style="color: #96d35f;"></i></a></td> -->
                            <td><a onclick="return confirm('Bạn có chắc chắn muốn xoá dữ liệu phụ tùng này không')" href="{{route('accessary.delete',['id'=>$key->accessary_id])}}" class="text-center"><i class="fas fa-user-minus" style="color: #ff2600;"></i></a></td>
                            </tr>
                            @endforeach

                        </tbody>
                        @else

                        <h4 class="text-center">Không có lịch hẹn nào để hiển thị</h4>

                        @endif


                    </table>



                    @if (!empty($accessariesList ->links()))

                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                         
                            <li class="page-item {{ $accessariesList ->previousPageUrl() ? '' : 'disabled' }}">
                               
                            </li>

                            <!-- Các trang -->
                            {{ $accessariesList  ->onEachSide(1)->links('pagination::bootstrap-4') }}

                            <!-- Trang tiếp theo -->
                            <li class="page-item {{ $accessariesList  ->nextPageUrl() ? '' : 'disabled' }}">
                               
                            </li>
                        </ul>
                    </nav>

                    @endif

                </form>


            </div>
    </div>

@endsection