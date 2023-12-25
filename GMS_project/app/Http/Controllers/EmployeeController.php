<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\EmployeeRequest;

use Illuminate\Support\Collection;

use Illuminate\Support\Facades\DB;

use Illuminate\Pagination\Paginator;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;

use function PHPSTORM_META\type;

class EmployeeController extends Controller
{
    public $data = [];

    private $employees;
    private $departments;
    private $positions;

    public function __construct()
    {
        $this->employees = new Employee();
        $this->departments = new Department();
        $this->positions = new Position();
    }
    public function index(Request $request)
    {

        $filters = []; 
        $keywords = null;

        $departmentList = $this->departments->getAllDepartment();

        if ($request -> department) {
            $deparmentId = $request->department;
            if ($deparmentId > 0) {
                $filters[] = ['employee.department_id', '=', $deparmentId];
            }
           
        }

        if ($request -> keywords) {
            $keywords = $request->keywords;

        }
        
        

        $employeesList = $this->employees->getAllEmployees($filters, $keywords);

        return view("employee.list", compact('employeesList', 'departmentList'));
    }

    public function getAdd()
    {

        $departmentList = $this->departments->getAllDepartment();

        return view("employee/add", compact('departmentList'));
    }

    public function postAdd(EmployeeRequest $request)
    {

        $curYear = date('y');

        $lastEmployeeId =  $this->employees->getLastEmployeeId();

       

        if (!empty($lastEmployeeId)) {
            $lastEmployeeId =  $lastEmployeeId[0]->ID;

            $lastEmployeeNumber = $lastEmployeeId % 10000;

            $lastEmployeeYear = ($lastEmployeeId - $lastEmployeeNumber) / 10000;

            if ($curYear == $lastEmployeeYear) {
                $autoIncrementPart = str_pad($lastEmployeeNumber + 1, 4, '0', STR_PAD_LEFT);
            } else {
                $autoIncrementPart = str_pad(0, 4, '0', STR_PAD_LEFT);
            }
        } else {
            $autoIncrementPart = str_pad(0, 4, '0', STR_PAD_LEFT);
        }

        $autoId = $curYear . $autoIncrementPart;

        $dataInsert = [
            'id' => $autoId,
            'employee_firstname' => $request->employee_firstname,
            'employee_lastname' => $request->employee_lastname,
            'gender' => $request->employee_gender,
            'employee_birthdate' => $request->employee_birthdate,
            'department_id' => $request->employee_department,
            'position_id' => $request->employee_position,
            'employee_email' => $request->employee_email,
            'employee_phonenumber' => $request->employee_phonenumber,
            'employee_address' => $request->employee_address,
        ];

        $this->employees->addEmployee($dataInsert);

        return redirect()->route('employee.index')->with('msg', 'Thêm mới nhân viên thành công');
    }

    public function getEdit($id = 0)
    {
     
        if (!empty($id)) {
            
            $employeeDetail = $this->employees->getDetail($id);

            $departmentList = $this->departments->getAllDepartment();

            if (!empty($employeeDetail)) {
                
                $employeeDetail = $employeeDetail[0];

            } else {
                return redirect()->route('employee.index')->with('status, Nhân viên đã chọn không tồn tại');
            }
        } else {
            return redirect()->route('employee.index')->with('status', 'Liên kết không tồn tại');
        }

        return view('employee.edit', compact('employeeDetail', 'departmentList'));
    }

    public function postEdit($id, EmployeeRequest $request)
    {

        $dataUpdate = [
            $request->employee_firstname,
            $request->employee_lastname,
            $request->employee_gender,
            $request->employee_birthdate,
            $request->employee_department,
            $request->employee_position,
            $request->employee_email,
            $request->employee_phonenumber,
            $request->employee_address,
        ];

        $this->employees->updateEmployee($dataUpdate, $id);

        return redirect()->route('employee.index')->with('msg', 'Cập nhật thông tin nhân viên thành công');
    }

    public function getPositionsByDepartment($departmentId)
    {
        $positions = $this->positions->getPositionsByDepartment($departmentId);

        return response()->json($positions);
    }

    public function delete($id)
    {
     
        if (!empty($id)) {

            $employeeDetail = $this->employees->getDetail($id);

            if (!empty($employeeDetail)) {
                $deleteStatus = $this->employees->deleteEmployee($id);

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



        return redirect()->route('employee.index')->with('msg', $msg);
    }
}
