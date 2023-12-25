<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Department extends Model
{
    use HasFactory;
    protected $table = 'DEPARTMENT';

    public function getAllDepartment() {
        $departments = DB::select('SELECT * FROM DEPARTMENT');

        return $departments;
    }

    public function getDepartmentById($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE ID = ?', [$id]);
    }
}
