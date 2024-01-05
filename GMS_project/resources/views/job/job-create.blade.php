@extends('home')
@section('main-content')

  
    <div class="container mt-5">


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Thêm công việc
                            <a href="{{ route('job.index') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('customer.store') }}" method="POST">
                            @csrf 
                            <div class="mb-3">
                                <label>Số xe</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Dịch vụ sửa chữa</label>
                                <select class="form-select" id="employee_department" name="employee_department" aria-label="Default select example">
                                        <option selected>Chọn dịch vụ ...</option>
                                    </select>
                            </div>
                            <div class="mb-3">
                                <label>Phụ tùng</label>
                                <select class="form-select" id="employee_department" name="employee_department" aria-label="Default select example">
                                        <option selected>Chọn phụ tùng...</option>
                                    </select>
                            </div>
                            <div class="mb-3">
                                <label>Giá: </label>
                                <label>VND</label>
                            </div>
                      
                            <div class="mb-3">
                                <button type="submit" name="add_Customer" class="btn btn-primary">Thêm</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection