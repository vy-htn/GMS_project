@extends('home')
@section('main-content')


    <div class="container">
        <div class="main-top">
            <h1>Danh sách nhà cung cấp</h1>
            <i class="fas fa-user-cog"></i>
        </div>

        <div class="main-skills">

                <form action=" {{ route('supplier.index') }} " class="content" method="GET">
                    @csrf
                    @error('msg')
                    <div class="alert alert-danger text-center">{{$message}}</div>
                    @enderror
                    <div class="overflow-hidden mb-3 row">
                        <div class="col-5">
                            <input class="form-control col" name="keywords" type="search" placeholder="Tìm lịch hẹn" aria-label="Search">
                        </div>
                        
                        <div class="col row">
                            <button class="btn  btn-outline-dark col-md-3" type=""><i class="fas fa-search"></i></button>
                        </div>

                        <div class="col">
                    <a href="{{route('supplier.getAdd')}}" class="btn btn-info btn-sm">+ Thêm nhà cung cấp</a>
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
                            <th scope="col" class="text-center">Email</th>
                            <th scope="col" class="text-center">Số điện thoại</th>                    
                            <th scope="col"></th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        @if (!empty($suppliersList))
                        <tbody class="table-group-divider table_body">

                            @foreach ($suppliersList as $key)
                            <tr>
                            <th scope="row" class="text-center">{{$key->id}}</th>
                            <!-- <td>Image</td> -->
                            <td>{{$key->name}}</td>
                            <td class="text-center">{{$key->email}}</td>
                            <td class="text-center">{{$key->phone}}</td>
                          
                            <td><a href="{{route('supplier.getDetail',['id'=>$key->id])}}"><i class="fas fa-edit" style="color: #96d35f;"></i></a></td>
                            <td><a onclick="return confirm('Bạn có chắc chắn muốn xoá dữ liệu nhân viên này không')" href="{{route('supplier.delete',['id'=>$key->id])}}" class="text-center"><i class="fas fa-user-minus" style="color: #ff2600;"></i></a></td>
                            </tr>
                            @endforeach

                        </tbody>
                        @else

                        <h4 class="text-center">Không có nhà cung cấp nào để hiển thị</h4>

                        @endif


                    </table>



                    @if (!empty($suppliersList ->links()))

                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                        
                            <li class="page-item {{ $suppliersList ->previousPageUrl() ? '' : 'disabled' }}">
                               
                            </li>

                           
                            {{ $suppliersList  ->onEachSide(1)->links('pagination::bootstrap-4') }}

                            <li class="page-item {{ $suppliersList  ->nextPageUrl() ? '' : 'disabled' }}">
                                
                            </li>
                        </ul>
                    </nav>

                    @endif

                </form>


            </div>
    </div>

@endsection