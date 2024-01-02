<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AccessaryType extends Model
{
    use HasFactory;
    protected $table = 'ACCESSARY_TYPE';
    public function getAllAccessaryType() {
        $accessaryTypes = DB::select('SELECT * FROM '.$this->table.' ');
        
        return $accessaryTypes;
    }

}
