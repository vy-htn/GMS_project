<?php

namespace App\Http\Controllers;

use App\Models\Accessary;
use App\Models\AccessaryType;
use Illuminate\Http\Request;
use App\Models\Supplier;

class AccessaryController extends Controller
{
    public $data = [];

    private $accessary;
    private $types;

    private $suppliers;

    public function __construct()
    {
        $this->accessary = new Accessary;
        $this->types = new AccessaryType;
        $this->suppliers = new Supplier;
    }

    public function index(Request $request)
    {

        $filters = []; 
        $keywords = null;

        if ($request -> keywords) {
            $keywords = $request->keywords;

        }
        
        
        $accessariesList = $this->accessary->getAllAccessary($filters, $keywords);

        return view("accessary.list", compact('accessariesList'));
    }

    public function getAdd()
    {

        $type = $this->types->all();

        $supplier = $this->suppliers->all();

        return view("accessary/add", compact('type', 'supplier'));
    }

    public function postAdd(Request $request)
    {

        $dataInsert = [
            'supplier' => $request->supplier,
            'type' => $request->type,
            'name' => $request->name,
            'price' => $request->price,
        ];

        $this->accessary->add($dataInsert);

        return redirect()->route('accessary.index')->with('status', 'Thêm mới phụ tùng thành công');
    }

    // public function getDetail($id = 0)
    // {
     
    //     if (!empty($id)) {

    //         $supplierDetail = $this->suppliers->getDetail($id);

    //         if (!empty($supplierDetail)) {
                
    //             $supplierDetail = $supplierDetail[0];

    //         } else {
    //             return redirect()->route('supplier.index')->with('status, Nhân viên đã chọn không tồn tại');
    //         }
    //     } else {
    //         return redirect()->route('supplier.index')->with('status', 'Liên kết không tồn tại');
    //     }

    //     return view('supplier.edit', compact('supplierDetail'));
    // }

    // public function postDetail($id, Request $request)
    // {

    //     $dataUpdate = [
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'phone' => $request->phone,
    //         'address' => $request->address,
    //     ];

    //     $this->suppliers->updateSupplier($dataUpdate, $id);

    //     return redirect()->route('supplier.index')->with('msg', 'Cập nhật thông tin nhà cung cấp thành công');
    // }

    public function delete($id)
    {
     
        if (!empty($id)) {

            $employeeDetail = $this->accessary->getDetail($id);

            if (!empty($employeeDetail)) {
                $deleteStatus = $this->accessary->deleteAccessary($id);

                if ($deleteStatus) {
                    $msg = 'Xóa dữ liệu thành công';
                } else {
                    $msg = 'Không thể xoá dữ liệu, vui lòng thử lại sau';
                }
            } else {
                $msg = 'Phụ tùng đã chọn không tồn tại';
            }
        } else {
            $msg = 'Liên kết không tồn tại';
        }



        return redirect()->route('accessary.index')->with('status', $msg);
    }
}
