<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ServiceType;


class CarController extends Controller
{
    public $data = [];

    private $cars;
    private $customers;

    public function __construct()
    {
        $this->cars = new Car();
        $this->customers = new Customer();

    }

    public function index(Request $request) {

        $filters = []; 
        $keywords = null; 
        
        if ($request -> status) {
            $statusId = $request->status;
            if ($statusId > 0) {
                $filters[] = ['booking.status_id', '=', $statusId];
            }
            
        }

        if ($request -> keywords) {
            $keywords = $request->keywords;
        }

        $carList = $this->cars->getAll($filters, $keywords);
       
        return view("car/list", compact('carList'));
    }

    public function getAdd()
    {

        $customerList = $this->customers->getAll();

        return view("car/add", compact('customerList'));
    }

    public function postAdd(Request $request ){
       
        $dataInsert = [
            'plateCode' => $request->plateCode,
            'brand' => $request->brand,
            'model' => $request->model,
            'color' => $request->color,
            'production_year' => $request->production_year,
            'status' => $request->status,
            'customer_id' => $request->customerId,
        ];

        $this->cars->add($dataInsert);
        return redirect()->route('car.index')->with('msg', 'Thêm xe thành công');
    }

    public function getDetail($id = 0)
    {

      
     
        if (!empty($id)) {
           
            $carDetail = $this->cars->getDetail($id);

            if (!empty($carDetail)) {
                
                $carDetail = $carDetail[0];

            } else {
                return redirect()->route('car.index')->with('status, Xe đã chọn không tồn tại');
            }
        } else {
            return redirect()->route('car.index')->with('status', 'Liên kết không tồn tại');
        }

        return view('car.detail', compact('carDetail'));
    }

    public function postDetail($id, Request $request)
    {

        $dataUpdate = [
            'brand' => $request->brand,
            'model' => $request->model,
            'color' => $request->color,
            'production_year' => $request->production_year,
            'status' => $request->status,
        ];

        $this->cars->updateCar($dataUpdate, $id);

        return redirect()->route('car.index')->with('msg', 'Cập nhật thông tin nhân viên thành công');
    }

    public function delete($id)
    {
     
        if (!empty($id)) {

            $employeeDetail = $this->cars->getDetail($id);

            if (!empty($employeeDetail)) {
                $deleteStatus = $this->cars->deleteCar($id);

                if ($deleteStatus) {
                    $msg = 'Xóa dữ liệu thành công';
                } else {
                    $msg = 'Không thể xoá dữ liệu, vui lòng thử lại sau';
                }
            } else {
                $msg = 'Nhân viên đã chọn không tồn tại';
            }
        } else {
            $msg = 'Liên kết không tồn tại';
        }

        return redirect()->route('car.index')->with('msg', $msg);
    }

}
