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

        // $departmentList = $this->departments->getAllDepartment();

        if ($request -> department) {
            $deparmentId = $request->department;
            if ($deparmentId > 0) {
                $filters[] = ['employee.department_id', '=', $deparmentId];
            }
           
        }

        if ($request -> keywords) {
            $keywords = $request->keywords;

        }
        
        
        $suppliersList = $this->suppliers->getAllSupplier($filters, $keywords);

        return view("employee.list", compact('suppliersList'));
    }

}
