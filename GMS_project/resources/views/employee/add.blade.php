@extends('layouts.app')
@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

    </div>
    <div class="x_content">
        <ul class="nav nav-tabs bar_tabs" role="tablist">
            <div class="container overflow-hidden">
                <div class="col">
                    <div class="p-3">
                        <h2 class="text-center">Thêm khách hàng</h2>
                    </div>
                </div>

            </div>
        </ul>
    </div>
    <div class="clearfix"></div>

    <br>

    <form class="row g-3">
        <div class="col-md-12">
            <label for="inputImage" class="form-label">Ảnh</label>
            <input type="file" class="form-control" id="inputImage">
        </div>

        <div class="col-md-6">
            <label for="inputSurname" class="form-label">Họ</label>
            <input type="text" class="form-control" id="inputSurname" placeholder="Nhập họ...">
        </div>

        <div class="col-md-6">
            <label for="inputLastname" class="form-label">Tên và tên đệm</label>
            <input type="text" class="form-control" id="inputLastname" placeholder="Nhập tên và tên đệm...">
        </div>

        <div class="col-md-3">
            <label for="inputEmail4" class="form-label">Bộ phận làm việc</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Chọn bộ phận làm việc...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="inputEmail" class="form-label">Vị trí làm việc</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Chọn vị trí làm việc...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Giới tính</label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radioGender" id="inlineRadio1" value="Nam">
                <label class="form-check-label" for="inlineRadio1">Nam</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radioGender" id="inlineRadio2" value="Nữ">
                <label class="form-check-label" for="inlineRadio2">Nữ</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radioGender" id="inlineRadio3" value="Khác" disabled>
                <label class="form-check-label" for="inlineRadio3">Khác</label>
            </div>
        </div>

        <div class="col-md-6">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="" class="form-control" id="inputEmail" placeholder="Nhập email...">
        </div>
        <div class="col-md-6">
            <label for="inputPhonenumber" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" id="inputPhonenumber" placeholder="Nhập số điện thoại...">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Nhập địa chỉ...">
        </div>
        <div class="col-12">

        </div>

        <div class="col-1">
            <button type="submit" class="btn btn-info">Lưu</button>
        </div>
        <div class="col-10">
            <button type="submit" class="btn btn-success">Lưu và thêm mới</button>
        </div>
        <div class="col-1">
            <button type="submit" class="btn btn-dark">Huỷ</button>
        </div>
    </form>

</div>

@endsection