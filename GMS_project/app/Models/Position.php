<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Position extends Model
{
    use HasFactory;
    protected $table = 'POSITION';


    // public function getPositions($departmentID) {
    //     $positions = DB::select('SELECT * FROM POSITION WHERE ID = ?', [$departmentID]);

    //     return $positions;
    // }

    public function getPositionsByDepartment($departmentID) {
        $positions = DB::select('SELECT * FROM POSITION WHERE DEPARTMENT_ID = ?', [$departmentID]);

        return $positions;
    }
    
}
