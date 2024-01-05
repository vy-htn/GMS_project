<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;


class SupplierController extends Controller
{
    public $data = [];

    private $suppliers;

    public function __construct()
    {
        $this->suppliers = new Supplier;
    }

    public function index(Request $request)
    {

        $filters = []; 
        $keywords = null;

        if ($request -> keywords) {
            $keywords = $request->keywords;

        }
        
        
        $suppliersList = $this->suppliers->getAllSupplier($filters, $keywords);

        return view("supplier.list", compact('suppliersList'));
    }

    public function getAdd()
    {

        return view("supplier/add");
    }

    public function postAdd(Request $request)
    {

        $dataInsert = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];

        $this->suppliers->addSupplier($dataInsert);

        return redirect()->route('supplier.index')->with('status', 'Thêm mới nhà cung cấp thành công');
    }

    public function getDetail($id = 0)
    {
     
        if (!empty($id)) {

            $supplierDetail = $this->suppliers->getDetail($id);

            if (!empty($supplierDetail)) {
                
                $supplierDetail = $supplierDetail[0];

            } else {
                return redirect()->route('supplier.index')->with('status, Nhà cung cấp đã chọn không tồn tại');
            }
        } else {
            return redirect()->route('supplier.index')->with('status', 'Liên kết không tồn tại');
        }

        return view('supplier.edit', compact('supplierDetail'));
    }

    public function postDetail($id, Request $request)
    {

        $dataUpdate = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];

        $this->suppliers->updateSupplier($dataUpdate, $id);

        return redirect()->route('supplier.index')->with('status', 'Cập nhật thông tin nhà cung cấp thành công');
    }

    public function delete($id)
    {
     
        if (!empty($id)) {

            $employeeDetail = $this->suppliers->getDetail($id);

            if (!empty($employeeDetail)) {
                $deleteStatus = $this->suppliers->deleteSupplier($id);

                if ($deleteStatus) {
                    $msg = 'Xóa dữ liệu thành công';
                } else {
                    $msg = 'Không thể xoá dữ liệu, vui lòng thử lại sau';
                }
            } else {
                $msg = 'Nhà cung cấp đã chọn không tồn tại';
            }
        } else {
            $msg = 'Liên kết không tồn tại';
        }

        return redirect()->route('supplier.index')->with('status', $msg);
    }

}
