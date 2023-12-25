@extends('layouts.app')
@section('content')

<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="/css/layout.css">
    <span style="font-family: verdana, geneva, sans-serif;">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12-lg">

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="dashboard-container">
                    <nav class = "side-menu">
                        <ul>
                        <li><a href="#" class="logo">
                                    <img src="/logo.png" alt="">
                                    <span class="nav-item">DashBoard</span>
                                </a></li>
                            <li><a href="">
                                    <i class="fas fa-tasks"></i>
                                    <span class="nav-item">Job card</span>
                                </a></li>
                            <li><a href="#">
                                    <i class="fas fa-home"></i>
                                    <span class="nav-item">Hóa đơn</span>
                                </a></li>
                            <li><a href="">
                                    <i class="fas fa-user"></i>
                                    <span class="nav-item">Khách hàng</span>
                                </a></li>
                            <li><a href=" {{ route('booking.index') }} ">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span class="nav-item">Lịch hẹn</span>
                                </a></li>
                            <li><a href="">
                                    <i class="fas fa-chart-bar"></i>
                                    <span class="nav-item">Thống kê</span>
                                </a></li>
                            <li><a href="">
                                    <i class="fas fa-cog"></i>
                                    <span class="nav-item">Phụ tùng</span>
                                </a></li>
                            <li><a href="">
                                    <i class="fas fa-car-alt"></i>
                                    <span class="nav-item">Xe</span>
                                </a></li>
                            <li><a href="#">
                                    <i class="fas fa-user-tie	"></i>
                                    <span class="nav-item">Nhà cung cấp</span>
                                </a></li>
                            <li><a href=" {{route('employee.index')}}">
                                    <i class="fas fa-id-badge"></i>
                                    <span class="nav-item">Nhân viên</span>
                                </a></li>
                                <li><a href=" {{route('order.index')}}">
                                    <i class="fas fa-id-badge"></i>
                                    <span class="nav-item">Đơn hàng</span>
                                </a></li>
                            <li><a href="" class="logout">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span class="nav-item">Log out</span>
                                </a></li>
                        </ul>
                    </nav>

                    <section class="main">
                        <div class="main-top">
                            <h1>Thêm đơn hàng</h1>
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <form class="main-skills row" id="addOrder" style="background: white;" style="height: 100%" method="POST">
                            @csrf
                            @if (session('msg'))
                                <div class="alert alert-success text-center">{{session('msg')}}</div>
                                @endif

                            <div class="col-md-12">
                                <div class="p-3">
                                    <button type="button" class="btn-close btn-lg" aria-label="Close"></button>
                                </div>
                            </div>

                            <div class="row col-md-6 mb-3">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">Nhà cung cấp</label>
                                <div class="col-sm-8">
                                    <select class="form-select" name="supplier" id="supplier" aria-label="Default select example">
                                        <option selected>Chọn nhà cung cấp</option>
                                        @foreach($supplierList as $supplier)
                                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="row col-md-6 mb-3">
                                <label for="colFormLabel" class="col-sm-4 col-form-label">Loại sản phẩm</label>
                                <div class="col-sm-8">
                                    <select class="form-select" name="accessaryType" id="accessaryType" aria-label="Default select example">
                                        <option selected>Chọn loại sản phẩm</option>
                                        @foreach($accessaryTypeList as $accessaryType)
                                        <option value="{{$accessaryType->id}}">{{$accessaryType->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="inputProduct" class="form-label">Sản phẩm</label>
                                <select class="form-select" name="accessary" id="accessary" aria-label="Default select example">
                                </select>
                            </div>

                            <div class="col-md-9">

                                <table class="table col-md-9" id="accessaryList" style="left: 0">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Thông tin sản phẩm</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Đơn giá</th>
                                        </tr>
                                    </thead>
                                    <tbody id="accessaryList-tbody">

                                    </tbody>
                                </table>

                            </div>

                            <div class="col-md-3" style="right: 0">

                                <div class="border border-2">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Chi phí đơn hàng</td>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row">Tổng giá</td>
                                                <td>$60</td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Phí vận chuyển</td>
                                                <td>$10</td>

                                            </tr>
                                            <tr>
                                                <td scope="row">Thuế</td>
                                                <td>$10</td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Tổng</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="d-grid gap-2 col-10 mx-auto">
                                        <button class="btn btn-info" type="submit">Xác nhận</button>
                                        <!-- <button class="btn btn-info" id="submitBtn" type="button">Xác nhận</button> -->
                                    </div>

                                    <br>
                                </div>


                            </div>






                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</body>



@endsection

@section('js')

<script>
    $(document).ready(function() {
        // Function to handle AJAX request and update the result input
        function updateAccessaryInput() {
            var supplierValue = $("#supplier").val();
            var accessaryTypeValue = $("#accessaryType").val();

            $.ajax({
                url: '/order/loadAccessary/',
                type: 'GET',
                data: {
                    supplier: supplierValue,
                    accessaryType: accessaryTypeValue
                },
                dataType: 'json',

                success: function(data) {
                    $('#accessary').empty();
                    $('#accessary').append('<option >Chọn sản phẩm</option>');
                    $.each(data, function(key, value) {
                        $('#accessary').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        }

        function updateAccessaryList() {
            var accessaryId = $("#accessary").val();

            $.ajax({
                url: '/order/updateAccessaryList/',
                type: 'GET',
                data: {
                    accessary: accessaryId
                },
                dataType: 'json',

                success: function(data) {

                    $.each(data, function(key, value) {
                        var id = value.id;
                        var name = value.name;
                        var price = value.price;
                        var quantity = 1;

                        $('#accessaryList').append('<tr><td scope="row"><p class="fw-normal" name="id" >' + id + '</p></td><td scope="row"><p class="fw-normal">' + name + '</p></td><td><input type="number" name="' + id + '" value="' + quantity + '"></td><td> <p name="price" >' + price + '</p></td></tr>');

                    });
                }
            });

        }


        $('#submitBtn').click(function() {
            var supplierValue = $("#supplier").val()
            var supplierId = supplierValue;
            var totalPrice = 0;
            var dataOrderDetail = [];
            var row = {};
            var data = [];

            var rows = document.querySelectorAll('#accessaryList tbody tr');

            rows.forEach(function(row) {
                var id = row.querySelector('p[name="id"]');
                id = id.innerText;
                var price = row.querySelector('p[name="price"]');
                price = price.innerText;

                var quantity = row.querySelector('input[type="number"]');
                quantity = quantity.value;

                totalPrice = totalPrice + price * quantity;

                dataOrderDetail[id] = quantity;
            });

            // $('#accessaryList-tbody tr').each(function() {

            //     // Lấy giá trị của mỗi input trong hàng
            //     $(this).find('input').each(function() {
            //         var accessaryId = $(this).attr('name');

            //         var quantity = $(this).val();
            //         console.log(price);

            //         totalPrice = totalPrice + price * quantity;
            //         row[accessaryId] = quantity;

            //     });


            // dataOrderDetail.push(row);

            // });



            // data.push(supplierValue);

            // data.push(totalPrice);

            data = [
                supplierValue,
                totalPrice,
                dataOrderDetail
            ]

            console.log(data);

            $.ajax({
                url: '/order/addOrder',
                type: 'GET',
                data: data,
                dataType: 'json',

                success: function(response) {
                    window.location.href = "{{ route('order.index') }}";
                },
                error: function(error) {
                    console.log(error);
                }
            });

        });


        // Attach change event handlers to the comboboxes
        $("#supplier, #accessaryType").change(function() {
            // Call the updateResultInput function when the comboboxes change
            updateAccessaryInput()
        });

        $("#accessary").change(function() {
            // Call the updateResultInput function when the comboboxes change
            updateAccessaryList()
        });

        // Initial update when the page loads
        updateAccessaryInput()
    });
</script>
@endsection