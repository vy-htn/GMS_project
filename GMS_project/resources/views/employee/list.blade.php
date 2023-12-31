@extends('layouts.app')
@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

    </div>
    <div class="x_content">
        <ul class="nav nav-tabs bar_tabs" role="tablist">
            <div class="container overflow-hidden">
                <div class="row gx-5">
                    <div class="col">
                        <div class="p-3">
                            <h2>Danh sách khách hàng</h2>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3">
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Tìm khách hàng" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Tìm</button>
                            </form>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3">
                            <button type="button" class="btn btn-info">+ Thêm khách hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        </ul>
    </div>
    <div class="clearfix"></div>


    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Tên</th>
                <th scope="col">Bộ phận</th>
                <th scope="col">Liên hệ</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>...</td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>...</td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>...</td>
            </tr>
        </tbody>
    </table>


</div>

@endsection