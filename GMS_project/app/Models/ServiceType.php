<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class ServiceType extends Model
{
    use HasFactory;

    protected $table = 'SERVICE_TYPE';

    public function getAllServiceTypes() {
        $serviceTypes = DB::select('SELECT * FROM '.$this->table.'');

        return $serviceTypes;
    }

    public function getServiceTypesById($id){
        return DB::select('SELECT * FROM '.$this->table.' WHERE TYPE_ID = ?', [$id]);
    }
}
