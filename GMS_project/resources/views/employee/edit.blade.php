@extends('home')
@section('main-content')

<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="/css/layout.css">
    <span style="font-family: verdana, geneva, sans-serif;">
</head>

<body>
    <div class="container">


        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif


        <div class="main-top">
            <h1>Chi tiết nhân viên</h1>
            <i class="fas fa-user-cog"></i>
        </div>
        <div class="main-skills">


            <form action="" class="content row" method="POST">
                @csrf
                @csrf
                @if (session('msg'))
                <div class="alert alert-success text-center">{{session('msg')}}</div>
                @endif

                <div class="col-3 row infogroup-container">
                    <div class="col-md-8 mb-3">
                        <a href="{{route('employee.index')}}" class="btn-close" aria-label="Close"></a>
                    </div>

                    <div class="col-md-4 mb-3">
                        <button type="submit" class="btn btn-light"><i class="far fa-edit"></i></button>
                    </div>

                    <div class="col-md-12 mb-3">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT57K--5w2S4RLJ1Q1v3vETVxkHG-688WlitA&usqp=CAU" class="img-thumbnail" alt="...">
                    </div>
                    <div class="col-12 mb-3">
                        <p class="text-center">{{$employeeDetail->first_name}} {{$employeeDetail->last_name}}</p>
                    </div>



                    <div class="col-12 mb-3">
                        <label for="inputId" class="form-label">ID</label>
                        <input type="email" readonly class="form-control" id="inputId" name="employee_id" value="{{ old('employee_id') ?? $employeeDetail->employee_id }}">
                    </div>

                    <div class="col-12 mb-3">
                        <label for="inputDepartment" class="form-label">Bộ phận</label>
                        <select class="form-select" id="employee_department" name="employee_department" aria-label="Default select example">
                            <option selected value="{{$employeeDetail->department_id}}">{{$employeeDetail->department_name}}</option>
                            @foreach ($departmentList as $key)
                            <option value="{{$key->id}}">{{$key->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-12 mb-3">
                        <label for="inputPosition" class="form-label">Vị trí</label>
                        <select class="form-select" id="employee_position" name="employee_position" aria-label="Default select example">
                            <option selected value="{{$employeeDetail->position_id}}">{{$employeeDetail->position_name}}</option>

                        </select>
                    </div>

                    <div class="col-md-12 mb-3"><br></div>

                    <a type="button" onclick="return confirm('Bạn có chắc chắn muốn xoá dữ liệu nhân viên này không')" href="{{route('employee.delete',['id'=>$employeeDetail->employee_id])}}" class="btn btn-light"><i class="fas fa-user-times"></i></a>
                    <div class="col-md-12">

                    </div>


                </div>



                <div class="col row">

                    <div class="col-12">
                        <h3 class="col-12 mb-3 content-header content-header">Thông tin cá nhân</h3>

                        <div class="infogroup-container row">

                            <div class="col-md-6 mb-3">
                                <label for="inputFirstname" class="form-label">Họ</label>
                                <input type="text" class="form-control" id="inputFirstname" name="employee_firstname" value="{{ old('employee_firstname') ?? $employeeDetail->first_name }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputLastname" class="form-label">Tên và tên đệm</label>
                                <input type="text" class="form-control" id="inputLastname" name="employee_lastname" value="{{ old('employee_lastname') ?? $employeeDetail->last_name }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputAddress" class="form-label">Giới tính</label>
                                <select class="form-select" name="employee_gender" aria-label="Default select example">
                                    <option selected value="{{$employeeDetail->gender}}">{{$employeeDetail->gender}}</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="inputBirthdate" class="form-label">Ngày sinh</label>
                                <input type="date" class="form-control" id="inputBirthdate" name="employee_birthdate" value="{{ old('employee_birthdate') ?? $employeeDetail->birthdate }}">
                            </div>

                        </div>


                    </div>

                    <div class="col-12">

                        <h3 class="col-12 mb-3 content-header">Thông tin liên hệ</h3>

                        <div class="infogroup-container row">
                            <div class="col-md-12 mb-3">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="employee_email" value="{{ old('employee_email') ?? $employeeDetail->email }}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="inputPhonenumber" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" id="inputPhonenumber" name="employee_phonenumber" value="{{ old('employee_phonenumber') ?? $employeeDetail->phone_number }}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="inputAddress" class="form-label">Address</label>
                                <input type="text" class="form-control" id="inputAddress" name="employee_address" value="{{ old('employee_address') ?? $employeeDetail->address}}">
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
</body>
<!-- page content -->

@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#employee_department').on('change', function() {
            var departmentId = $(this).val();

            //console.log('event onchange');
            $.ajax({
                url: '/employee/get-positions/' + departmentId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#employee_position').empty();
                    $.each(data, function(key, value) {
                        $('#employee_position').append('<option value="' + value.id + '">' + value.position_name + '</option>');
                    });
                }
            });
        });
    });
</script>
@endsection