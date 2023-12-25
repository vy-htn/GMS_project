<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'EMPLOYEE';

    public function getAllEmployees($filters = [], $keywords) {
        $employees =  DB::table('employee')
        ->join('department', 'department.id', '=', 'employee.department_id')
        ->join('position', 'position.id', '=', 'employee.position_id')
        ->select('employee.id as employee_id', 'first_name','last_name', 'gender', 'birthdate', 'address', 'phone_number', 'email', 'department.id as department_id', 'department.name as department_name', 'position.id as position_id', 'position_name' );
        // ->get();

        if (!empty($filters)) {
            $filters = $filters[0];
            $employees = $employees->where($filters[0], $filters[1], $filters[2]);
        }

        if (!empty($keywords)) {
            $employees = $employees->where(function($query) use ($keywords) {
                $query->orWhere('first_name', 'like', '%'.$keywords.'%');
                $query->orWhere('last_name', 'like', '%'.$keywords.'%');
                $query->orWhere('email', 'like', '%'.$keywords.'%');
                $query->orWhere('phone_number', 'like', '%'.$keywords.'%');
            });
        }

        // $sql = DB::getQueryLog();
        // dd($sql);
        
        return $employees->get();
    }

    public function getLastEmployeeId() {
        $lastEmployeeId =  DB::select('SELECT ID FROM '.$this->table.' ORDER BY ID DESC LIMIT 1');
        return $lastEmployeeId;
    }

    public function getLastEmployee() {
        $lastEmployee = DB::select('SELECT ID FROM '.$this->table.' ORDER BY ID DESC LIMIT 1');
        return $lastEmployee[0];
    }

    public function addEmployee($data){

        DB::table('EMPLOYEE') ->  insert([
            'ID'=> $data['id'],
            'FIRST_NAME' => $data['employee_firstname'],
            'LAST_NAME' => $data['employee_lastname'],
            'GENDER' => $data['gender'],
            'BIRTHDATE' => $data['employee_birthdate'],
            'DEPARTMENT_ID' => $data['department_id'],
            'POSITION_ID' => $data['position_id'],
            'EMAIL' => $data['employee_email'],
            'PHONE_NUMBER' => $data['employee_phonenumber'],
            'ADDRESS' => $data['employee_address'],
        ]);
    }

    public function getDetail($id) {
        $employees =  DB::table('employee')
        ->join('department', 'department.id', '=', 'employee.department_id')
        ->join('position', 'position.id', '=', 'employee.position_id')
        ->select('employee.id as employee_id', 'first_name','last_name', 'gender', 'birthdate', 'address', 'phone_number', 'email', 'department.id as department_id', 'department.name as department_name', 'position.id as position_id', 'position_name' )
        ->where('employee.id', '=', $id) 
        ->get();
        
        return $employees;
    }

    public function updateEmployee($data, $id) {

        $data = array_merge($data, [$id]); 

        return DB::update('UPDATE '.$this->table.' 
        SET FIRST_NAME = ?,
            LAST_NAME = ?,
            GENDER = ?,
            BIRTHDATE = ?,
            DEPARTMENT_ID = ?,
            POSITION_ID = ?,
            EMAIL = ?,
            PHONE_NUMBER = ?,
            ADDRESS = ?
        WHERE EMPLOYEE_ID = ?', $data);
    }

    public function deleteEmployee($id) {
        return DB::delete('DELETE FROM '.$this->table.' WHERE EMPLOYEE_ID = ?', [$id]);
    }
}
