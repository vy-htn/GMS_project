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
    <div class="main-top">
        <h1>Thêm đơn hàng</h1>
        <i class="fas fa-user-cog"></i>
    </div>

    @if (session('msg'))
    <div class="alert alert-success text-center">{{session('msg')}}</div>
    @endif

    <form class="main-content" id="addOrder"  method="POST">
                        @csrf
                        <div class="row">
                        <div class="col-md-12">
                                <div class="p-3">
                                <a href="{{route('order.index')}}" class="btn-close" aria-label="Close"></a>                                
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

                                <table class="tb col-md-9" id="accessaryList" style="left: 0">
                                    <thead class="table_header">
                                        <tr>
                                            <th scope="col" class="text-center">ID</th>
                                            <th scope="col">Thông tin sản phẩm</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Đơn giá</th>
                                        </tr>
                                    </thead>
                                    <tbody id="accessaryList-tbody" class="table_body">

                                    </tbody>
                                </table>

                            </div>

                            <div class="col-md-3">

                                <div class="border border-2">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Tóm tắt đơn hàng</td>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row">Thuế</td>
                                                <td>$10</td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Tổng</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Tổng số lượng</td>
                                                <td id="totalQuantity"></td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Tổng chi phí</td>
                                                <td>$10</td>

                                            </tr>
                                            
                                        </tbody>
                                    </table>

                                    <div class="d-grid gap-2 col-10 mx-auto">
                                        <button class="btn btn-info" type="submit">Xác nhận</button>
                                    </div>

                                </div>


                            </div>

                        </div>

                        </form>


</body>



@endsection

@section('js')

<script>
    // var accessaryList = document.querySelectorAll("#accessaryList-tbody tr");

    // accessaryList.forEach(function(item) {

    //     var input = item.querySelector("input");

    //     console.log(input);

    //     // Add click event to each input
    //     input.addEventListener("change",function(){
    //         console.log('change')
    //     });
    // });

    // function CountQuantity() {
    //         var sum = 0;
    //         inputNumbers.forEach(function(input) {
    //             sum += parseFloat(input.value) || 0; 
    //         });

    //         document.getElementById("result").innerHTML = sum;
    //     }

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

                        $('#accessaryList').append('<tr><td class="text-center" scope="row"><p class="fw-normal" name="id" >' + id + '</p></td><td scope="row"><p class="fw-normal">' + name + '</p></td><td><input class="quantity" type="number" name="' + id + '" value="' + quantity + '"></td><td> <p name="price" >' + price + '</p></td></tr>');

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